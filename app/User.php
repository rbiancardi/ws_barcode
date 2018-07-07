<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $table = "user";

	protected $fillable = ['user_name', 'email', 'password',
		'name', 'last_name', 'user_type_id', 'role_name', 'enable',
		'remember_token', 'created_at', 'updated_at',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function merchants() {
		return $this->belongsToMany('App\Merchant');
	}

	public function user_types() {
		return $this->belongsTo('App\UserType', 'name', 'user_type_id');
	}

	public function roles() {
		return $this->belongsTo('App\Role', 'role_name', 'role_name');
	}
}
