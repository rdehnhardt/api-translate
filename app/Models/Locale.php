<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Locale extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug', 'name', 'label', 'flag'];

    /**
     * @param string $value
     * @return string
     */
    public function setNameAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value);
        $this->attributes['name'] = $value;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    /**
     * @param Translate $translate
     * @return string
     */
    public function message(Translate $translate)
    {
        $message = $this->messages()->whereTranslateId($translate->id)->first();

        if ($message) {
            return $message->message;
        }

        return '';
    }
}
