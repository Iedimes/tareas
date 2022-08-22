<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTask extends Model
{
    protected $fillable = [
        'name',
        'task_id',
        'state_id',
        'date_begin',
        'date_end',
        'obs',
        'user_id',
        'advance',
    
    ];
    
    
    protected $dates = [
        'date_begin',
        'date_end',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/detail-tasks/'.$this->getKey());
    }
}
