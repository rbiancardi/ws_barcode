<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	protected $table = "products";
	/*protected $primaryKey ="barcode";
		    $incrementing =false;
	*/

	protected $fillable = [
		'id', 'barcode', 'description', 'price', 'currency_id', 'merchant_id', 'branch_id',
		'enable', 'created_at', 'updated_at', 'sector_id'];

	public function merchants() {
		return $this->belongsTo('App\Merchant', 'merchant_id', 'merchant_id');
	}

	public function currencies() {
		return $this->belongsTo('App\Currency', 'iso_4712', 'currency_id');
	}

	public function branch_sectors() {
		return $this->belongsToMany('App\BranchSector');
	}

}
