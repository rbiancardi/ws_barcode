<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxType extends Model {

	protected $table = "trx_type";

	protected $fillable = [
		'type_name', 'type_description', 'enable', 'created_at', 'updated_at'];

	public function transtactions() {
		return $this->hasMany('App\Transaction', 'transaction_type', 'type_name');
	}

}
