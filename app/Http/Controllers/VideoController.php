<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        return Video::where('referencia_id', null)->get();
    }

    public function videoByItem($id)
    {
        return Video::where('item_id', $id)->get();
    }


    public function store(Request $request)
    {
        $insert = $request->all();
        $video = new Video($insert);

        if ($video->save()) {
            $response = [
                'status' => '200',
                'data' => $video
            ];

            return $response;
        }
        return ['status' => '500'];
    }

    public function show($id)
    {
        return Video::where('id', $id)->get()->first();
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $video = $this->show($id);

        if ($video) {
            $update = $this->$request->all();

            if ($video->update($update)) {
                return ['status' => '200'];
            }
            return ['status' => '500'];
        }
        return ['status' => '404'];
    }

    public function destroy($id)
    {
        $video = $this->show($id);

        if ($video) {
            $video->delete();
            return ['status' => '200'];
        }
        return ['status' => '404'];
    }
}
