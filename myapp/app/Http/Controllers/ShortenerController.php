<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ShortenerController extends Controller
{

    public function index()
    {
        return view('shortener');
    }

    public function save(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        $link = ShortLink::where('link',$request->link)->first();
        if($link) {
            return $link;
        }

        ShortLink::create([
            'link' => $request->link,
            'code' => str_random(6),
        ]);

        $link = ShortLink::latest()->first();

        return $link;
    }

    public function redirect($code)
    {
        $link = ShortLink::where('code',$code)->first()->link;
        return Redirect::intended($link);
    }

}
