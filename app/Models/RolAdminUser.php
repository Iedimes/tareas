<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolAdminUser extends Model
{
    protected $fillable = [
        'user_id',
        'rol_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/rol-admin-users/'.$this->getKey());
    }
}
