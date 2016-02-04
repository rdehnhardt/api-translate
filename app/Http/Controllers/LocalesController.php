<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\LocalesRequest;
use App\Models\Locale;
use Illuminate\Http\Request;

class LocalesController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Locale::paginate();

        return view('locales.index', compact('records'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locales.create');
    }

    /**
     * @param LocalesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocalesRequest $request)
    {
        $record = new Locale();
        $record->label = $request->get('label');
        $record->name = $request->get('name');
        $record->flag = $request->get('flag');

        if ($record->save()) {
            $request->session()->flash('message', 'Locale was successful!');
            $request->session()->flash('alert', 'success');
        } else {
            $request->session()->flash('message', 'Locale was successful!');
            $request->session()->flash('alert', 'danger');
        }

        return redirect('/locales');
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Locale::find($id);

        return view('locales.show', compact('record'));
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Locale::find($id);

        return view('locales.edit', compact('record'));
    }

    /**
     * @param LocalesRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocalesRequest $request, $id)
    {
        $record = Locale::find($id);
        $record->label = $request->get('label');
        $record->name = $request->get('name');
        $record->flag = $request->get('flag');

        if ($record->save()) {
            $request->session()->flash('message', 'Locale was successful!');
            $request->session()->flash('alert', 'success');
        } else {
            $request->session()->flash('message', 'Locale was successful!');
            $request->session()->flash('alert', 'danger');
        }

        return redirect('/locales');
    }

    /**
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $record = Locale::find($id);

        if ($record->delete()) {
            $request->session()->flash('message', 'Locale was successful!');
            $request->session()->flash('alert', 'success');
        } else {
            $request->session()->flash('message', 'Locale was successful!');
            $request->session()->flash('alert', 'danger');
        }

        return redirect('/locales');
    }
}
