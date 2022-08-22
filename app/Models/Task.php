<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'date_begin',
        'date_end',
        'obs',
        'state_id',
        'advance',

    ];


    protected $dates = [
        'date_begin',
        'date_end',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['state'];


    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tasks/'.$this->getKey());
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');

    }
}
