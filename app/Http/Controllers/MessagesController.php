<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Locale;
use App\Models\Translate;

class MessagesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $translates = Translate::all();
        $locales = Locale::all();
        $cols = 12 / $locales->count();

        return view('messages.index', compact('translates', 'locales', 'cols'));
    }
}
