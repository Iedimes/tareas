<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleAdminUser extends Model
{
    protected $fillable = [
        'admin_user_id',
        'role_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['rol_name','user_admin'];

    public function rol_name()
    {
        return $this->belongsTo('App\Models\Role','role_id','id');

    }

    public function user_admin()
     {
         return $this->hasOne('App\Models\AdminUser', 'id', 'admin_user_id');
     }




    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/role-admin-users/'.$this->getKey());
    }
}
