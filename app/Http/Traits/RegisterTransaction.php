<?php
namespace App\Http\Traits;

use App\Transaction;


trait RegisterTransaction
{

    public function saveTrx($regTrx)
    {

        //dd($regTrx);
        $transaction = new Transaction;

        $transaction->reader_name = $regTrx['reader_name'];
        $transaction->barcode = $regTrx['barcode'];
        $transaction->product_description = $regTrx['product_description'];
        $transaction->product_currency = $regTrx['product_currency'];
        $transaction->product_price = $regTrx['product_price'];
        $transaction->merchant_id = $regTrx['merchant_id'];
        $transaction->transaction_type = $regTrx['transaction_type'];
        $transaction->trx_result = $regTrx['trx_result'];
        $transaction->trx_result_extended = $regTrx['trx_result_extended'];
        $transaction->branch_name = $regTrx['branch_name'];
        $transaction->sector_name = $regTrx['sector_name'];
        $transaction->trx_user = $regTrx['trx_user'];
        $transaction->reader_ip = $regTrx['reader_ip'];
        $transaction->trx_ip = $regTrx['trx_ip'];
        $transaction->created_at = $regTrx['created_at'];
        $transaction->updated_at = $regTrx['updated_at'];
        
        $transaction->save();

       
    }
}
