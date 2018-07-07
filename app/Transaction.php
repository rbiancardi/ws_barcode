<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";

    protected $fillable = [
        'id', 'reader_name', 'barcode', 'product_description',
        'product_currency', 'product_price', 'merchant_id', 'transaction_type',
        'trx_result', 'trx_result_extended', 'branch_name', 'sector_name', 'trx_user', 'reader_ip', 'trx_ip',
        'created_at', 'updated_at'];

    public function merchants()
    {
        return $this->belongsTo('App\Merchant', 'merchant_id', 'merchant_id');
    }

    public function trx_types()
    {
        return $this->belongsTo('App\TrxType', 'type_name', 'transaction_type');
    }
}
