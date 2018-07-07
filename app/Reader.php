<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model {
	protected $fillable = [
		'reader_name', 'merchant_id', 'branch_id', 'sector_name', 'reader_ip', 'enable'];

	public function branchOffices() {
		return $this->belongsTo('App\BranchOffice', 'branch_id', 'branch_id');
	}

	public function merchants() {
		return $this->belongsTo('App\Merchant', 'merchant_id', 'merchant_id');
	}

	public function branchSectors() {
		return $this->belongsTo('App\BranchSector', 'sector_name', 'sector_name');
	}

}
