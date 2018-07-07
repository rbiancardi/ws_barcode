<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchSector extends Model {

	protected $table = "branch_sector";

	protected $fillable = [
		'sector_name', 'sector_description', 'branch_name', 'enable',
		'created_at', 'updated_at'];

	public function readers() {
		return $this->hasMany('App\Readers', 'sector_name', 'sector_name');
	}

	public function branchOffices() {
		return $this->belongsTo('App\BranchOffice', 'branch_id', 'branch_name_name');
	}

	public function products() {

		return $this->belongsToMany('App\Product.php');
	}

}
