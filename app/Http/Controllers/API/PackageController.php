<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Repositories\Eloquent\PackageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PackageController extends Controller
{
    protected $model;
    public function __construct()
    {
        $this->model = new PackageRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return $this->model->index($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), $this->validation($request));

            if ($validator->fails()) {
                if ($validator->fails()) {
                    return response()->json([
                        'message' => 'The given data was invalid.',
                        'errors' => $validator->errors()
                    ], 422);
                }
            }

            return $this->model->store($request);
        }
        catch(\Exception $e){
			return response()->json([
				'errors' => $e->getMessage() ? $e->getMessage() : 'Process data failed, try again',
			], $e->getCode() == 0 ? 500 : $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->model->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */


    public function update(Request $request, $id)
    {
        try {
            if ($request->isMethod('put')) {
                $validator = Validator::make($request->all(), $this->validation($request));
            }  elseif ($request->isMethod('patch')) {
                $validator = Validator::make($request->all(), $this->validationPatch($request));
            }

            if ($validator->fails()) {
                if ($validator->fails()) {
                    return response()->json([
                        'message' => 'The given data was invalid.',
                        'errors' => $validator->errors()
                    ], 422);
                }
            }
            return $this->model->update($request, $id);
        }
        catch(\Exception $e){
            return response()->json([
                'errors' => $e->getMessage() ? $e->getMessage() : 'Process data failed, try again',
            ], $e->getCode() == 0 ? 500 : $e->getCode());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return $this->model->delete($id);
    }

    private function validationPatch(Request $request) {
        return [
            'transaction_amount'=> 'required|numeric',
            'transaction_state' => 'required|string|max:255'
        ];
    }

    private function validation(Request $request) {
        return [
            'transaction_id' => 'required|uuid',
            'customer_name' => 'required|string|max:100',
            'customer_code' => 'required|string|max:7',
            'transaction_amount' => 'required|numeric',
            'transaction_discount' => 'required|numeric',
            'transaction_additional_field' => 'nullable|string|max:255',
            'transaction_payment_type' => 'required|numeric',
            'transaction_state' => 'required|string|max:10',
            'transaction_code' => 'required|string|max:16',
            'transaction_order' => 'required|integer',
            'location_id' => 'required|string|max:24',
            'organization_id' => 'required|integer',
            'created_at' => 'required|date',
            'updated_at' => 'required|date',
            'transaction_payment_type_name' => 'required|string|max:10',
            'transaction_cash_amount' => 'required|numeric',
            'transaction_cash_change' => 'required|numeric',
            'customer_attribute.Nama_Sales' => 'required|string|max:100',
            'customer_attribute.TOP' => 'required|string|max:20',
            'customer_attribute.Jenis_Pelanggan' => 'required|string|max:10',

            'connote.connote_id' => 'required|uuid',
            'connote.connote_number' => 'required|integer',
            'connote.connote_service' => 'required|string|max:10',
            'connote.connote_service_price' => 'required|numeric',
            'connote.connote_amount' => 'required|numeric',
            'connote.connote_code' => 'required|string|max:17',
            'connote.connote_booking_code' => 'nullable|string|max:20',
            'connote.connote_order' => 'required|integer',
            'connote.connote_state' => 'required|string|max:10',
            'connote.connote_state_id' => 'required|integer',
            'connote.zone_code_from' => 'required|string|max:10',
            'connote.zone_code_to' => 'required|string|max:10',
            'connote.surcharge_amount' => 'nullable|numeric',
            'connote.transaction_id' => 'required|uuid',
            'connote.actual_weight' => 'required|numeric',
            'connote.volume_weight' => 'required|numeric',
            'connote.chargeable_weight' => 'required|numeric',
            'connote.created_at' => 'required|date',
            'connote.updated_at' => 'required|date',
            'connote.organization_id' => 'required|integer',
            'connote.location_id' => 'required|string|max:24',
            'connote.connote_total_package' => 'required|numeric',
            'connote.connote_surcharge_amount' => 'required|numeric',
            'connote.connote_sla_day' => 'required|numeric',
            'connote.location_name' => 'required|string|max:50',
            'connote.location_type' => 'required|string|max:10',
            'connote.source_tariff_db' => 'required|string|max:25',
            'connote.id_source_tariff' => 'required|string|max:10',
            'connote.pod' => 'nullable|string',
            'connote.history' => 'array',

            'connote_id' => 'required|uuid',

            'origin_data.customer_name' => 'required|string|max:100',
            'origin_data.customer_address' => 'required|string|max:255',
            'origin_data.customer_email' => 'nullable|email',
            'origin_data.customer_phone' => 'required|string|max:20',
            'origin_data.customer_address_detail' => 'nullable|string|max:255',
            'origin_data.customer_zip_code' => 'required|string|max:10',
            'origin_data.zone_code' => 'required|string|max:20',
            'origin_data.organization_id' => 'required|integer',
            'origin_data.location_id' => 'required|string|max:24',

            'destination_data.customer_name' => 'required|string|max:100',
            'destination_data.customer_address' => 'required|string|max:255',
            'destination_data.customer_email' => 'nullable|email',
            'destination_data.customer_phone' => 'required|string|max:20',
            'destination_data.customer_address_detail' => 'nullable|string|max:255',
            'destination_data.customer_zip_code' => 'required|string|max:10',
            'destination_data.zone_code' => 'required|string|max:20',
            'destination_data.organization_id' => 'required|numeric',
            'destination_data.location_id' => 'required|string|max:24',

            'koli_data' => 'required|array',
            'koli_data.*.koli_length' => 'required|numeric',
            'koli_data.*.awb_url' => 'required|url',
            'koli_data.*.created_at' => 'required|date',
            'koli_data.*.koli_chargeable_weight' => 'required|numeric',
            'koli_data.*.koli_width' => 'required|numeric',
            'koli_data.*.koli_surcharge' => 'array',
            'koli_data.*.koli_height' => 'required|numeric',
            'koli_data.*.updated_at' => 'required|date',
            'koli_data.*.koli_description' => 'required|string|max:255',
            'koli_data.*.koli_formula_id' => 'nullable',
            'koli_data.*.connote_id' => 'required|uuid',
            'koli_data.*.koli_volume' => 'required|numeric',
            'koli_data.*.koli_weight' => 'required|numeric',
            'koli_data.*.koli_id' => 'required|uuid',
            'koli_data.*.koli_custom_field.awb_sicepat' => 'nullable',
            'koli_data.*.koli_custom_field.harga_barang' => 'nullable',
            'koli_data.*.koli_code' => 'required|string|max:25',

            'custom_field.catatan_tambahan' => 'nullable|string',
            'currentLocation.name' => 'required|string|max:50',
            'currentLocation.code' => 'required|string|max:10',
            'currentLocation.type' => 'required|string|max:10',
        ];
    }
}
