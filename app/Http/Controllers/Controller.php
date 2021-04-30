<?php

namespace App\Http\Controllers;

use App\Item;
use App\Log;
use App\Associado;
use App\Formulario;
use App\Pagina;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(){

      $noticias = Item::where('type', 'noticia')->orderBy('data', 'DESC')->take(6)->get();
      $logs = Log::orderBy('created_at', 'DESC')->take(6)->get();
      $formularios = Formulario::where('created_at', '>', session('last_loggin'))->where('pagina_id', '!=', null)->distinct()->get(['id', 'pagina_id']);
      $inscricoes = Formulario::where('created_at', '>', session('last_loggin'))->where('item_id', '!=', null)->distinct()->get(['item_id', 'id']);

      $array = array();
      $i = 0;
      foreach ($formularios as $formulario) {
          $id = $formulario->pagina_id;

          $pagina = Pagina::find($id);

          $pagina->id = $formulario->id;

           $array[$i] = $pagina;

           $i++;
      }

      $formularios = $array;

      return view('paginas.home')
            ->with('permissoes', session('permissoes'))
            ->with('usuario', session('nome'))
            ->with('noticias', $noticias)
            ->with('formularios',$formularios)
            ->with('inscricoes',$inscricoes)
            ->with('logs', $logs);
    }

    public function uploadXml(Request $request)
    {
        $upload = $request->file('xml');
        // dd($upload);
        $xml = XmlParser::load($upload);
        dd($xml);
        $associados = $xml->parse([
          ['uses' => 'REGISTRO[nomeAssociado,registroAssociado,cpfAssociado,dataNascimentoAssociado]'],
        ]);
        
        // dd($associados);
        foreach ($associados[0] as $associado) {
          Associado::create($associado);
          // return $associado;
        } 
        return ['status' => '200'];  
    }

    public function hasAssociado($registro, $cpf){
      $registro = str_replace('*', '/', $registro);
      $cpf = str_replace('*', '/', $cpf);
      $associado = Associado::where(['registroAssociado' => $registro, 'cpfAssociado' => $cpf])->get();

      if(count($associado)){
         return ['status' => '200'];  
      }else{
        return ['status' => '500'];  
      }

    }

    public function logs(){
      $logs = Log::orderBy('created_at', 'DESC')->get();
      return $logs;
    }

    public function dumpanddie(Request $request)
    {
      dd($request->all());
    }

    public function debitar($item_id, $tipo){
      $agenda = Item::find($item_id);

      $arr_agenda = $agenda->attributesToArray();

      if($tipo == 'Registrado'){

        $arr_agenda['ticket_credenciado']--;
        if($arr_agenda['ticket_credenciado'] < 0 ) return ['status' => '500']; 

      }elseif($tipo == 'Estudante'){

        $arr_agenda['ticket_estudante']--;
        if($arr_agenda['ticket_estudante'] < 0 ) return ['status' => '500']; 

      }elseif($tipo == 'Sociedade'){

        $arr_agenda['ticket_publico']--;
        if($arr_agenda['ticket_publico'] < 0 ) return ['status' => '500']; 

      }

      // dd($arr_agenda);

      if($agenda->update($arr_agenda)){
         return ['status' => '200'];  
      }else{
        return ['status' => '500'];  
      }

    }

}