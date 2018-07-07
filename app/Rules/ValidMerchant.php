<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\ws_ResponseCode;
use App\Merchant;
use DB;

class ValidMerchant implements Rule
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
    public function passes($attribute, $value)
    {
        $merchant = DB::table('merchants')->where([
                        ['merchant_id', '=', $value],
                        ['enable', '=', '1'],
                    ])->get();
       
        if (count($merchant) > 0) {
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
        return $responseCodes->responseList('2', '202');
    }
}
