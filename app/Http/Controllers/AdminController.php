<?php


namespace App\Http\Controllers;


use App\Models\Link;

class AdminController
{
    public function find($id){
        $link = Link::find($id);
        return view('update' , ['link' => $link]);
    }

    public function update($id){
        $links = Link::find($id);
        $links->link = \request()->get('link');
        $links->short_link = \request()->get('short_link');
        $links->clicks_link = \request()->get('clicks');
        $links->save();
        return redirect('/');
    }

    public function delete($id){
        $link = Link::find($id);
        $link->statistic()->delete();
        $link->delete();
        return redirect('/');

    }
}
