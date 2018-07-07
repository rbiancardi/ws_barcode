<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model {
	protected $table = "merchants";

	protected $fillable = [
		'merchant_id', 'merchant_name', 'secret_key', 'merchant_address', 'merchant_phone', 'merchant_admin',
		'merchant_contact', 'merchant_mail', 'merchant_description', 'enable', 'created_at', 'updated_at'];

	public function users() {

		//many to many
		return $this->belongsToMany('App\User');
	}

	public function branchOffices() {
		return $this->hasMany('App\BranchOffice', 'merchant_id', 'merchant_id');
	}

	public function products() {
		return $this->hasMany('App\Products', 'merchant_id', 'merchant_id');
	}

	public function transactions() {
		return $this->hasMany('App\Transaction', 'merchant_id', 'merchant_id');
	}

	public function readers() {
		return $this->hasMany('App\Reader', 'merchant_id', 'merchant_id');
	}

}
