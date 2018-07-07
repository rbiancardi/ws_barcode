<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchOffice extends Model {
	protected $table = "branchOffices";

	protected $fillable = [
		'branch_id', 'branch_name', 'merchant_id', 'branch_country', 'branch_location',
		'enable', 'created_at', 'updated_at'];

	public function readers() {
		return $this->hasMany('App\Reader', 'branch_id', 'branch_id');
	}

	public function branch_sectors() {
		return $this->hasMany('App\BranchSector', 'branch_name', 'brnach_id');
	}

	public function merchants() {
		return $this->belongsTo('App\Merchant', 'merchant_id', 'merchant_id');
	}

}
