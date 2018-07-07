<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Product extends Resource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		// return parent::toArray($request);

		return [
			'id' => $this->id,
			'barcode' => $this->barcode,
			'description' => $this->description,
			'currency_id' => $this->currency_id,
			'price' => $this->price,
			'merchant_id' => $this->merchant_id,
			'branch' => $this->branch_id,
			'branch_sector_id' => $this->branch_sector_id,
			'created_at' => $this->created_at,

		];

	}
}
