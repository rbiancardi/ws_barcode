<?php
namespace App\Http\Traits;

use App\Currency;
use App\Product;
use App\Rules\ExistMerchant;
use App\Rules\ValidMerchant;
use App\Sector;
use App\ws_ResponseCode;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

trait ProductValidationTrait {

	//use RegisterTransaction;

	public function NullRequest(Request $request) {
		$now = Carbon::now();
		$timestamp = $now->toDateTimeString();

		// $validator = Validator::make($request->all(), [
		$request->validate([

			'merchant_id' => 'required', //101
			'api_user' => 'required', //102
			'barcode' => 'required', //103
			'reader_name' => 'required', //104
			'branch' => 'required', //105
			'trx_type' => 'required', //106
			'secret_key' => 'required', //107
			'timestamp' => 'required', //108
			'reader_ip' => 'required', //109
			'access_token' => 'required', //110
		]);

		/* if ($validator->fails()) {
			               $trx_data = $validator->errors()->toArray();

			               //$key= $trx_data->keys('0');
			            $key = array_first($trx_data);

			     //   dd($trx_data);

			        $regTrx = array(
			                    'reader_name' => $request->reader_name,
			                    'barcode' => $request->barcode,
			                    'product_description' => 'VACIO',
			                    'product_currency' => 'VACIO',
			                    'product_price' => 'VACIO',
			                    'merchant_id' => $request->merchant_id,
			                    'transaction_type' => $request->trx_type,
			                    'trx_result' => $key[0]['Main Response: '],
			                    'trx_result_extended' => $key[0]['Response Extended:']['Response Code: '],
			                    'branch_name' => $request->branch,
			                    'sector_name' => 'VACIO',
			                    'trx_user' => $request->api_user,
			                    'reader_ip' => $request->reader_ip,
			                    'trx_ip' => \Request::ip(),
			                    'created_at' => $timestamp,
			                    'updated_at' => $timestamp
			                    );

			        $this->saveTrx($regTrx);

		*/
	}

	public function MerchantEnable(Request $request) {
		$request->validate([
			'merchant_id' => [new ValidMerchant],
		]);
	}

	public function ExistMerchant(Request $request) {
		$request->validate([
			'merchant_id' => [new ExistMerchant],
		]);
	}

	public function ExistProduct(Request $request) {
		$responseCodes = new ws_ResponseCode;
		$product = Product::where('barcode', $request->barcode)->get();

		if ($product->isEmpty()) {
			//dd($product);
			return $responseCodes->responseList('4', '400');
		} else {
			return true;
		}
	}

	public function MerchantProduct(Request $request) {
		$responseCodes = new ws_ResponseCode;
		$now = Carbon::now();
		$timestamp = $now->toDateTimeString();

		$product = Product::where('barcode', $request->barcode)
			->where('merchant_id', $request->merchant_id)
			->where('enable', '1')->get();

		if ($product->isEmpty()) {

			/*$regTrx = array(
					'reader_name' => $request->reader_name,
					'barcode' => $request->barcode,
					'product_description' => 'VACIO',
					'product_currency' => 'VACIO',
					'product_price' => 'VACIO',
					'merchant_id' => $request->merchant_id,
					'transaction_type' => $request->trx_type,
					'trx_result' => 'Transaction Result Code: 4 => Conexion Rechazada - Error en los datos del Producto',
					'trx_result_extended' => '403 - Producto no pertenece al comercio',
					'branch_name' => $request->branch,
					'sector_name' => 'VACIO',
					'trx_user' => $request->api_user,
					'reader_ip' => $request->reader_ip,
					'trx_ip' => \Request::ip(),
					'created_at' => $timestamp,
					'updated_at' => $timestamp,
				);

			*/

			return $responseCodes->responseList('4', '403');
		} else {
			return 'OK';
		}
	}

	public function CheckAccessToken(Request $request) {
		$responseCodes = new ws_ResponseCode;
		$request_secret_key = $request->secret_key;
		$request_merchant_id = $request->merchant_id;
		$request_access_token = $request->access_token;

		$db_secret_key = DB::table('merchants')
			->select('secret_key')
			->where([
				['merchant_id', '=', $request_merchant_id],
				['enable', '=', '1'],
			])->get();

		$secret_key = $db_secret_key['0']->secret_key;

		if (strcmp($request_secret_key, $secret_key) == 0) {
			$parameters = $request->all();
			$sha_param = $request->except(['access_token']);

			ksort($parameters);

			$access_token = sha1(implode('', $sha_param) . $secret_key);

			if (strcmp($access_token, $request_access_token) == 0) {
				return 'OK';
			} else {
				return $responseCodes->responseList('3', '301');
			}
		} else {
			return $responseCodes->responseList('3', '300');
		}
	}

	public function integrityFail(Request $request) {
		$responseCodes = new ws_ResponseCode;
		$now = Carbon::now();
		$timestamp = $now->toDateTimeString();

		$barcode = $request->barcode;
		$merchant_id = $request->merchant_id;
		$productBelongs = $this->MerchantProduct($request);

		$response = Product::where('barcode', $barcode)
			->where('merchant_id', $merchant_id)
			->where('enable', '1')->paginate(15);

		$trx_data = $response->toArray();
		// dd($trx_data);

		$productExist = $this->ExistProduct($request);
		//dd($productExist);

		if (is_array($productExist)) {
			$check_barcode = false;
		} else {
			$check_barcode = true; //array_has($productExist, 'barcode');;
		}

		$access_token = $this->CheckAccessToken($request);

		//dd($check_barcode);

		if ($barcode == '') {
			$regTrx = array(
				'reader_name' => $request->reader_name,
				'barcode' => 'VACIO',
				'product_description' => 'VACIO',
				'product_currency' => 'VACIO',
				'product_price' => 'VACIO',
				'merchant_id' => $request->merchant_id,
				'transaction_type' => $request->trx_type,
				'trx_result' => 'Transaction Result Code: 1 => Conexion Rechazada - Error en la estructura del Requerimiento',
				'trx_result_extended' => '103 => El Campo barcode es obligatorio para este requerimiento',
				'branch_name' => $request->branch,
				'sector_name' => 'VACIO',
				'trx_user' => $request->api_user,
				'reader_ip' => $request->reader_ip,
				'trx_ip' => \Request::ip(),
				'created_at' => $timestamp,
				'updated_at' => $timestamp,
			);

			$this->saveTrx($regTrx);
			return $responseCodes->responseList('1', '103');

		} elseif ($check_barcode == false) {

			//No se encontro el Barcode

			$regTrx = array(
				'reader_name' => $request->reader_name,
				'barcode' => $request->barcode,
				'product_description' => 'VACIO',
				'product_currency' => 'VACIO',
				'product_price' => 'VACIO',
				'merchant_id' => $request->merchant_id,
				'transaction_type' => $request->trx_type,
				'trx_result' => $productExist['Main Response: '],
				'trx_result_extended' => $productExist['Response Extended:']['Response Code: '],
				'branch_name' => $request->branch,
				'sector_name' => 'VACIO',
				'trx_user' => $request->api_user,
				'reader_ip' => $request->reader_ip,
				'trx_ip' => \Request::ip(),
				'created_at' => $timestamp,
				'updated_at' => $timestamp,
			);

			$this->saveTrx($regTrx);
			return $productExist;

		} elseif ($access_token != 'OK' && $productBelongs == 'OK') {

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
				'trx_result' => $access_token['Main Response: '],
				'trx_result_extended' => $access_token['Response Extended:']['Response Code: '],
				'branch_name' => $request->branch,
				'sector_name' => $sector[0]['sector_name'],
				'trx_user' => $request->api_user,
				'reader_ip' => $request->reader_ip,
				'trx_ip' => \Request::ip(),
				'created_at' => $timestamp,
				'updated_at' => $timestamp,
			);

			$this->saveTrx($regTrx);
			return $access_token;

		} else {

			$regTrx = array(
				'reader_name' => $request->reader_name,
				'barcode' => $request->barcode,
				'product_description' => 'VACIO',
				'product_currency' => 'VACIO',
				'product_price' => 'VACIO',
				'merchant_id' => $request->merchant_id,
				'transaction_type' => $request->trx_type,
				'trx_result' => 'Transaction Result Code: 4 => Conexion Rechazada - Error en los datos del Producto',
				'trx_result_extended' => '403 => Producto no pertenece al comercio',
				'branch_name' => $request->branch,
				'sector_name' => 'VACIO',
				'trx_user' => $request->api_user,
				'reader_ip' => $request->reader_ip,
				'trx_ip' => \Request::ip(),
				'created_at' => $timestamp,
				'updated_at' => $timestamp,
			);

			$this->saveTrx($regTrx);
			return $responseCodes->responseList('4', '403');

		}

	}
} //Fin de la clase
