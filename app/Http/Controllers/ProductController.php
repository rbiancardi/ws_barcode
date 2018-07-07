<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Http\Resources\Product as ProductResource;
use App\Http\Traits\ProductValidationTrait;
use App\Http\Traits\RegisterTransaction;
use App\Product;
use App\Rules\ExistMerchant;
use App\Sector;
use App\ws_ResponseCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller {
	use RegisterTransaction;
	use ProductValidationTrait;

	/* Estructura del Request Valido

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

		        }

	*/

	public function ReaderResponse(Request $request) {
	}

	public function index(Request $request) {
		$responseCodes = new ws_ResponseCode;
		$this->NullRequest($request);
		$this->ExistMerchant($request);
		$this->MerchantEnable($request);
		$checkIntegrity = $this->CheckAccessToken($request);

		if ($checkIntegrity == 'OK') {
			$product = Product::paginate(15);

			return ProductResource::collection($product);
		} else {
			return $this->CheckAccessToken($request);
		}
	}

	public function PostProductByEan(Request $request) {

		$responseCodes = new ws_ResponseCode;
		$this->NullRequest($request);
		$this->ExistMerchant($request);
		$this->MerchantEnable($request);

		$ex = $this->ExistProduct($request);
		$resp = $this->MerchantProduct($request);
		//dd($resp);

		$checkIntegrity = $this->CheckAccessToken($request);
		// dd($checkIntegrity);

		$now = Carbon::now();
		$timestamp = $now->toDateTimeString();

		if ($checkIntegrity == 'OK' && $ex == true && $resp == 'OK') {

			$barcode = $request->barcode;
			$merchant_id = $request->merchant_id;

			$response = Product::where('barcode', $barcode)
				->where('merchant_id', $merchant_id)
				->where('enable', '1')->paginate(15);

			//dd($response);

			$response->push(['Result' => $responseCodes->responseList('0', '000')]);
			$trx_data = $response->toArray();
			//dd($trx_data);

			$currency = Currency::where('id', $trx_data['data'][0]['currency_id'])
				->where('enable', '1')->get();
			$sector = Sector::where('id', $trx_data['data'][0]['branch_sector_id'])
				->where('enable', '1')->get();

			$regTrx = array(
				'reader_name' => $request->reader_name,
				'barcode' => $request->barcode,
				'product_description' => $trx_data['data'][0]['description'],
				'product_currency' => $currency[0]['iso_4712'],
				'product_price' => $trx_data['data'][0]['price'],
				'merchant_id' => $request->merchant_id,
				'transaction_type' => $request->trx_type,
				'trx_result' => $trx_data['data'][1]['Result']['Main Response: '],
				'trx_result_extended' => $trx_data['data'][1]['Result']['Response Extended:']['Response Code: '],
				'branch_name' => $request->branch,
				'sector_name' => $sector[0]['sector_name'],
				'trx_user' => $request->api_user,
				'reader_ip' => $request->reader_ip,
				'trx_ip' => \Request::ip(),
				'created_at' => $timestamp,
				'updated_at' => $timestamp,
			);

			// Aca registro la transaccion OK
			$this->saveTrx($regTrx);

			return $response;

		} else {

			$errorCode = $this->integrityFail($request);

			return $errorCode;
		}

	}

	public function merchantProducts(Request $request) {
		$this->NullRequest($request);
		$this->ExistMerchant($request);
		$this->MerchantEnable($request);

		$checkIntegrity = $this->CheckAccessToken($request);

		if ($checkIntegrity == 'OK') {
			$merchant_id = $request->merchant_id;
			$products = Product::where('merchant_id', $merchant_id)->paginate(15);

			return ProductResource::collection($products);
		} else {
			return $this->CheckAccessToken($request);
		}
	}

	public function ResponseCode(Request $request) {
		$responseCodes = new ws_ResponseCode;

		$response = $responseCodes->responseList('3', '301');

		return $response;
	}

	public function CheckIp(Request $request) {
		$ip = \Request::ip();
		dd($ip);
	}

} // Fin de la clase
