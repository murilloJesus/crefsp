<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use App\Formulario;
use App\Pagina;
use App\Item;
use App\Mail\Ticket;
use App\Mail\FormularioEmail;

class FormularioController extends Controller
{
    public function index()
    {
        return Formulario::orderBy('id', 'DESC')->get();
    }

    public function byPage()
    {
        return Formulario::where('pagina_id', '!=', null)->orderBy('id', 'DESC')->get();
    }

    public function store(Request $request)
    {
        $formulario = $request->all();
        // dd($formulario);
        $json = (array) json_decode($formulario['json']);

        if(isset($formulario['pdf']) and $formulario['pdf'] != 'undefined' ){
            $pdf = $this->storeArquivo($request, 'pdf');
            $json['pdf'] = $pdf;     
        }
        unset($formulario['pdf']);       

        if(isset($formulario['jpeg']) and $formulario['jpeg'] != 'undefined' ){
            $jpeg = $this->storeArquivo($request, 'jpeg');
            $json['jpeg'] = $jpeg;        
        }
        unset($formulario['jpeg']);       

        if(isset($formulario['audio']) and $formulario['audio'] != 'undefined' ){
            $audio = $this->storeArquivo($request, 'audio');
            $json['audio'] = $audio; 
        }
        unset($formulario['audio']);       

        if(isset($formulario['video']) and $formulario['video'] != 'undefined' ){
            $video = $this->storeArquivo($request, 'video');
            $json['video'] = $video; 
        }
        unset($formulario['video']);       

        $formulario['json'] = json_encode($json);

        $formulario = new Formulario($formulario);
        $pagina = Pagina::find($formulario->pagina_id);
        $email_receiver = $pagina->email_receiver ? $pagina->email_receiver : 'cref4sp@crefsp.gov.br';

        if ($formulario->save()) {
            $array = (array) json_decode($request->get('json'));
            
            unset($array['pdf']);
            unset($array['jpeg']);
            unset($array['audio']);
            unset($array['video']);
            
            $email = $array['email'];
            if (!isset($pdf)) {
                $pdf = '';
            }
            if (!isset($jpeg)) {
                $jpeg = '';
            }
            if (!isset($audio)) {
                $audio = '';
            }
            if (!isset($video)) {
                $video = '';
            }
            $success = $this->sendEmail($email, $array, $email_receiver, $pdf, $jpeg, $audio, $video);
            // dd($success);
            if ($success) {

                $response = ['status' => '200'];
            } else {
                $formulario->delete();
                $response = ['status' => '500'];
            }

           return $response;
       }
       return ['status' => '500'];
    }

    public function ticket(Request $request)
    {
        $formulario = new Formulario($request->all());
        // return $formulario;
        // $array = (array) json_decode($request->get('json'));
        // return $array['tipo_inscricao'];
        
        if ($formulario->save()) {
            
            $array = (array) json_decode($request->get('json'));
            $email = $array['email'];
            $nomeInscrito = $array['nome'];
            $cep = $array['cep'];
            $cidade = $array['cidade'];
            $bairro = $array['bairro'];
            $endereco = $array['endereço'];
            $numero = $array['número'];
            $complemento = $array['complemento'];
            $telefone = $array['telefone'];
            $celular = $array['celular'];
            $estado = $array['estado'];

            if (isset($array['Registro'])) {
                $registro = $array['Registro'];
            }
            
            if (!isset($registro)) {
                $registro = '';
            }

            $ticket = $formulario->id.'/'.$formulario->item_id;
            $agenda = Item::where('id', '=', $formulario->item_id)->get()->first();
            $evento = Item::where('id', '=', $agenda->item_id)->get()->first();
            
            $success = $this->sendTicket($email, $ticket, $evento->name, $evento->data, $evento->local, $array['tipo_inscricao'],
                                            $nomeInscrito, $cep, $cidade,
                                            $bairro, $endereco, $numero,
                                            $complemento, $telefone, $celular, $estado, $registro);

            if ($success) {
                $response = [ 'status' => '200'];
            } else {
                $formulario->delete();
                $response = [ 'status' => '500'];
            }
            
           return $response;
       }
       return ['status' => '500'];
    }

    public function show($id)
    {
        return Formulario::where('id', '=', $id)->get()->first();
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $formulario = Formulario::where('id', $id)->get()->first();
        
        if ($formulario) {   
            $update = $request->all();

            if ($formulario->update($update)) {
                return json_encode(['status' => '200']);
            }
            return json_encode(['status' => '500']);
        }
        return json_encode(['status' => '404']);
    }

    public function destroy($id)
    {
        $formulario = Formulario::where('id', $id)->get()->first();

        if ($formulario) {
            $formulario->delete();
            return ['status' => '200'];
        }
        return ['status' => '404'];
    }

    public function agenda($id)
    {
        return Formulario::where('item_id', $id)->orderBy('id', 'DESC')->get();
    }   

    private function sendEmail($email, $formulario, $copy_to = 'cref4sp@crefsp.gov.br', $pdf, $jpeg, $audio, $video){
        
        try {
            Mail::to($email)->cc($copy_to)->send(new FormularioEmail($email, $formulario, $pdf, $jpeg, $audio, $video));
        } catch (\Exception $ex) {
            return false;
        }
        return true;
    }

    private function sendTicket(
        $email, $ticket, $nome, $data, $local, $tipo, 
        $nomeInscrito, $cep, $cidade,
        $bairro, $endereco, $numero,
        $complemento, $telefone, $celular, $estado, $registro
        ){
        try {
            Mail::to($email)->cc(['eventos@crefsp.gov.br'])->send(new Ticket($ticket, $email, $nome, $data, $local, $tipo,
                                                                            $nomeInscrito, $cep, $cidade,
                                                                            $bairro, $endereco, $numero,
                                                                            $complemento, $telefone, $celular, $estado, $registro
        ));
        } catch (\Exception $ex) {
            return false;
        }
        return true;
    }

    private function storeArquivo(Request $request, $nome_do_campo)
    {
        // $this->validaArquivo($request);

        $tipo = $request->file($nome_do_campo)->extension();
        $tamanho = $request->file($nome_do_campo)->getSize();
        $name = md5($request->file($nome_do_campo));
        $source = $name. '.'. $tipo;
        $originalName = $request->file($nome_do_campo)->getClientOriginalName();

        $request->file($nome_do_campo)->storeAs(
            'denuncias', $source
        );

       return $source;
    }
}
