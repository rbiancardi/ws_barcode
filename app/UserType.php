<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model {

	protected $table = "user_types";

	protected $fillable = ['name', 'description',
		'enable', 'created_at', 'updated_at'];

	public function users() {
		return $this->hasMany('App\User', 'user_type_id', 'name');
	}

}
