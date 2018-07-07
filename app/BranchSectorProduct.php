<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchSectorProduct extends Model {

	protected $table = "branch_sector_product";

	protected $fillable = ['sector_id', 'branch_sector_id',
		'created_at', 'updated_at'];

}
