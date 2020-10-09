<?php

namespace App\Http\Controllers;

use App\Jobs\UserHandling;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class LinkController extends Controller
{
    public function generate_link()
    {
        $link = Link::where('link', request('link'))->first();
        if ($link === null) {
            $link = new Link();
            $link->user_id = Auth::user()->getAuthIdentifier();
            $link->link = \request('link');
            $link->short_link = URL::to(uniqid('', true));
            $link->save();
        }
        return redirect('/');
    }

    public function link()
    {
        return view('link');
    }


    public function redirect($short_link)
    {
        $link = Link::where('short_link', URL::to($short_link))->first();
        if ($link === null) {
            return redirect('home');
        }
        $link->clicks_link++;
        $link->save();
        $user = [
            'link_id' => $link->id,
            'user_ip' => \request()->ip(),
            'user_agent' => \request()->server('HTTP_USER_AGENT')
        ];
        dispatch(new UserHandling($user))->onQueue('default');
        return redirect($link->link);
    }

    public function show()
    {
        return view('show_links', ['links' => Link::all()]);
    }
}
