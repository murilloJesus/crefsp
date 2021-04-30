<?php

namespace App\Http\Controllers;

use App\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        return Template::all();
    }

    public function store(Request $request)
    {
        $template = $this->setToInsert($request);

        if ($template->save()) {
            return json_encode(['status' => '200']);
        }
        return json_encode(['status' => '500']);
    }

    public function show($template)
    {
        return Template::where('id', $template)->get();
    }

    public function update(Request $request, $template)
    {
        $result = Template::find($template);
        if (!is_null($result)) {   
            $aux = $this->setToInsert($request);
            $aux->save();

            return json_encode(['status' => '200']);
        } else {
            return json_encode(['status' => '404']);
        }
        
        return json_encode(['status' => '500']);
    }

    public function delete($template)
    {
        $result = Template::find($template);
        if (!is_null($result)) {
            $result->delete();
            return json_encode(['status' => '200']);
        } else {
            return json_encode(['status' => '404']);
        }
        return json_encode(['status' => '500']);
    }

    private function setToInsert(Request $request)
    {
        return new Template([
            'pagina_id' => $request->get('pagina_id'),
            'name' => $request->get('name'),
            'html' => $request->get('html'),
        ]);
    }
}
