<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id', 'updated_at', 'created_at'];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 10;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Models\Messages');
    }
}
