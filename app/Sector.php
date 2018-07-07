<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    
    protected $table = "branch_sector";

    protected $fillable = ['sector_name', 'sector_description', 'branch_name',
        'enable', 'created_at', 'updated_at'];

    
        
}
