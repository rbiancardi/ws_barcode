<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    protected $fillable = [
        'id', 'role_name', 'role_type', 'role_description', 'enable', 'created_at', 'updated_at'];

    public function permissions()
    {
        return $this->hasMany('App\Permission', 'role_id', 'role_name');
    }

    public function users()
    {
        return $this->hasMany('App\User', 'role_name', 'role_name');
    }
}
