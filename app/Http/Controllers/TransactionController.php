<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Reader;
use App\BranchOffice;
use App\Transaction;
use DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $dt = $now->toDateTimeString();
        $daterange = request()->daterange;

        if (!is_null($daterange)) {
            $db_range = explode('A', $daterange);
            $trx_data = $this->trx_range($db_range);

            return view('transactions.transactions', ['dt'=>$dt,
                                                   'trx_data'=>$trx_data,
                                                 ]);
        } else {
            return view('transactions.transactions', ['dt'=>$dt]);
        }
    }

        public function regiterTransaction($regTrx){


         
          
        }




    public function trx_range($db_range)
    {
        $merchant_id = Auth::user()->merchant_id;
        $from = trim($db_range[0]);
        $to = trim($db_range[1]);

        $trx = Transaction::where('merchant_id', $merchant_id)
                          ->whereBetween('created_at', [$from, $to])
                          ->orderBy('id', 'desc')->get();

        return $trx;
    }


    public function trx_barcode($db_range)
    {
        $merchant_id = Auth::user()->merchant_id;
        $from = trim($db_range[0]);
        $to = trim($db_range[1]);

        $trx = Transaction::where('merchant_id', $merchant_id)
                          ->whereBetween('created_at', [$from, $to])
                          ->orderBy('id', 'desc')->get();

        return $trx;
    }


    public function barcode(BarcodeSearchRequest $request)
    {
        $merchant_id = Auth::user()->merchant_id;
        //7466600385290 ==>  2017-11-12 16:17:02
        $daterange = request()->daterange;
        $barcode = request()->barcode;
        $db_range = explode('A', $daterange);
        $from = trim($db_range[0]);
        $to = trim($db_range[1]);


        $trx_data = Transaction::where('merchant_id', $merchant_id)
                            ->where('barcode', $barcode)
                            ->whereBetween('created_at', [$from, $to])
                            ->orderBy('id', 'desc')->get();

        return view('transactions.trx_barcode', [ 'trx_data'=>$trx_data ]);
    }

    public function reader(ReaderSearchRequest $request)
    {
        $merchant_id = Auth::user()->merchant_id;
        //7466600385290 ==>  2017-11-12 16:17:02
        $daterange = request()->daterange;
        $reader = request()->reader;
        $branch = request()->branch;
        $db_range = explode('A', $daterange);
        $from = trim($db_range[0]);
        $to = trim($db_range[1]);

        $branch_name = BranchOffice::where('merchant_id', $merchant_id)
                                    ->orderBy('branch_name', 'asc')->get();
        $branch_cbo = $branch_name->pluck('branch_name');

        $readers = Reader::where('merchant_id', $merchant_id)
                                ->orderBy('reader_name', 'asc')->get();
        $reader_cbo = $readers->pluck('reader_name');


        if (strcmp($reader, "todos") == 0 &&  strcmp($branch, "todos") == 0) {
            $trx_data = Transaction::where('merchant_id', $merchant_id)
                                    ->whereBetween('created_at', [$from, $to])
                                    ->orderBy('id', 'desc')->get();
        //  dd($trx_data);
        } elseif (strcmp($reader, "todos") == 0) {
            $trx_data = Transaction::where('merchant_id', $merchant_id)
                                  ->where('branch_id', $branch)
                                  ->whereBetween('created_at', [$from, $to])
                                  ->orderBy('id', 'desc')->get();
        } elseif (strcmp($branch, "todos") == 0) {
            $trx_data = Transaction::where('merchant_id', $merchant_id)
                                  ->where('reader_name', $reader)
                                  ->whereBetween('created_at', [$from, $to])
                                  ->orderBy('id', 'desc')->get();
        } else {
            $trx_data = Transaction::where('merchant_id', $merchant_id)
                                  ->where('reader_name', $reader)
                                  ->where('branch_id', $branch)
                                  ->whereBetween('created_at', [$from, $to])
                                  ->orderBy('id', 'desc')->get();
        }

        //    return $trx_data;
        return view('transactions.trx_reader', [ 'trx_data'=>$trx_data,
                                                      'branch_cbo'=>$branch_cbo,
                                                      'reader_cbo'=>$reader_cbo]);
    }
}
