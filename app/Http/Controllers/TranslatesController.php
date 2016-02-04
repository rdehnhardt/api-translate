<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Locale;
use App\Models\Translate;

class TranslatesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Translate::paginate();

        return view('translates.index', compact('records'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Translate::find($id);
        $locales = Locale::all();

        return view('translates.edit', compact('record', 'locales'));
    }
}
