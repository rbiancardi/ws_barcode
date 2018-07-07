<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\ws_ResponseCode;
use App\Merchant;
use DB;


class ExistMerchant implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
/*
    {
        "merchant_id":"PRIMER_BIT",
        "api_user":"API_PRIMER_BIT",
        "barcode":"9131126435108",
        "reader_name":"PRIMER_BIT_READER_1",
        "branch":"ID_SUCURSAL_3",
        "trx_type":"CONSULTA",
        "secret_key":"4b0b3fe6efa6f730810ee6ba634f9948925b7ca2",
        "reader_ip": "192.168.1.10",
        "timestamp":"2018-04-03 10:34:27",
        "access_token":"5d8b4861982673bf744eaaf0b14171566de4dba1"

        // Registro de TRX
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


    }*/

    public function passes($attribute, $value)
    {
        if (DB::table('merchants')->where('merchant_id', $value)->exists()) {
            return true;
        } else {

            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $responseCodes = new ws_ResponseCode;
        return $responseCodes->responseList('2', '201');
    }
}
