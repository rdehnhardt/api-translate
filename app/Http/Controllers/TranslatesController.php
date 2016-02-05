<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\MessagesRequest;
use App\Models\Locale;
use App\Models\Message;
use App\Models\Translate;
use Request;

class TranslatesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Request::get('q')) {
            $records = Translate::where('key', 'LIKE', '%' . Request::get('q') . '%')->paginate();
        } else {
            $records = Translate::paginate();
        }

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

    /**
     * Show the application dashboard.
     *
     * @param $id
     * @param MessagesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, MessagesRequest $request)
    {
        try {
            if (count($request->get('messages'))) {
                foreach ($request->get('messages') as $locale => $text) {
                    if ($text) {
                        $message = Message::whereTranslateId($id)->whereLocaleId($locale)->first();

                        if (!$message) {
                            $message = new Message();
                            $message->locale_id = $locale;
                            $message->translate_id = $id;
                        }

                        $message->message = $text;
                        $message->save();
                    }
                }
            }

            $request->session()->flash('message', 'Translates was successful!');
            $request->session()->flash('alert', 'success');
        } catch (\Exception $e) {
            $request->session()->flash('message', 'Translates error!');
            $request->session()->flash('alert', 'danger');
        }

        return redirect('/translates');
    }
}
