<?php

namespace App\Http\Controllers\Api;

use App;
use App\Http\Controllers\Controller;
use App\Models\Locale;
use App\Models\Message;
use App\Models\Translate;
use Illuminate\Http\Response;
use Request;

class TranslateController extends Controller
{
    /**
     * @var Locale
     */
    private $defaultLocale;

    /**
     * TranslateController constructor.
     */
    public function __construct()
    {
        $this->defaultLocale = $this->getLocale(str_slug(App::getLocale()));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locale = Request::get('locale') ? $this->getLocale(str_slug(Request::get('locale'))) : $this->defaultLocale;

        if (Request::get('key') && $locale instanceof Locale) {
            $translate = $this->getTranslate();
            $message = $this->getMessage($translate, $locale);

            if ($message) {
                return (new Response($message->message, 200))->header('Content-Type', 'text/html');
            }
        }

        return response('');
    }

    /**
     * @param $slug
     * @return Locale
     */
    private function getLocale($slug)
    {
        return Locale::whereSlug($slug)->first();
    }

    /**
     * @return Translate
     */
    private function getTranslate()
    {
        $translate = Translate::whereKey(Request::get('key'))->first();

        if (!$translate) {
            $translate = new Translate();
            $translate->key = Request::get('key');
            $translate->save();
        }

        return $translate;
    }

    /**
     * @param Translate $translate
     * @param Locale $locale
     * @return Message
     */
    private function getMessage(Translate $translate, Locale $locale)
    {
        $message = Message::whereTranslateId($translate->id)->whereLocaleId($locale->id)->first();

        if (!$message) {
            $record = Message::whereTranslateId($translate->id)->whereLocaleId($this->defaultLocale->id)->first();

            if (!$record) {
                $record = new Message();
                $record->locale_id = $this->defaultLocale->id;
                $record->translate_id = $translate->id;
                $record->message = Request::get('key');
                $record->save();
            }

            return $record;
        }

        return $message;
    }
}
