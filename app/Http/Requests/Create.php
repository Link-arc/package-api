<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'transaction_id' => 'required|uuid',
            'customer_name' => 'required|string|max:255',
            'customer_code' => 'required|string|max:255',
            'transaction_amount' => 'required|numeric',
            'transaction_discount' => 'required|numeric',
            'transaction_additional_field' => 'nullable|string|max:255',
            'transaction_payment_type' => 'required|string|max:255',
            'transaction_state' => 'required|string|max:255',
            'transaction_code' => 'required|string|max:255',
            'transaction_order' => 'required|integer',
            'location_id' => 'required|string|max:255',
            'organization_id' => 'required|integer',
            'created_at' => 'required|date',
            'updated_at' => 'required|date',
            'transaction_payment_type_name' => 'required|string|max:255',
            'transaction_cash_amount' => 'required|numeric',
            'transaction_cash_change' => 'required|numeric',
            'customer_attribute.Nama_Sales' => 'required|string|max:255',
            'customer_attribute.TOP' => 'required|string|max:255',
            'customer_attribute.Jenis_Pelanggan' => 'required|string|max:255',

            'connote.connote_id' => 'required|uuid',
            'connote.connote_number' => 'required|integer',
            'connote.connote_service' => 'required|string|max:255',
            'connote.connote_service_price' => 'required|numeric',
            'connote.connote_amount' => 'required|numeric',
            'connote.connote_code' => 'required|string|max:255',
            'connote.connote_booking_code' => 'nullable|string|max:255',
            'connote.connote_order' => 'required|integer',
            'connote.connote_state' => 'required|string|max:255',
            'connote.connote_state_id' => 'required|integer',
            'connote.zone_code_from' => 'required|string|max:255',
            'connote.zone_code_to' => 'required|string|max:255',
            'connote.surcharge_amount' => 'nullable|numeric',
            'connote.transaction_id' => 'required|uuid',
            'connote.actual_weight' => 'required|numeric',
            'connote.volume_weight' => 'required|numeric',
            'connote.chargeable_weight' => 'required|numeric',
            'connote.created_at' => 'required|date',
            'connote.updated_at' => 'required|date',
            'connote.organization_id' => 'required|integer',
            'connote.location_id' => 'required|uuid',
            'connote.connote_total_package' => 'required|string|max:255',
            'connote.connote_surcharge_amount' => 'required|string|max:255',
            'connote.connote_sla_day' => 'required|string|max:255',
            'connote.location_name' => 'required|string|max:255',
            'connote.location_type' => 'required|string|max:255',
            'connote.source_tariff_db' => 'required|string|max:255',
            'connote.id_source_tariff' => 'required|string|max:255',
            'connote.pod' => 'nullable|string',
            'connote.history' => 'array',

            'connote_id' => 'required|uuid',
            
            'origin_data.customer_name' => 'required|string|max:255',
            'origin_data.customer_address' => 'required|string|max:255',
            'origin_data.customer_email' => 'nullable|email',
            'origin_data.customer_phone' => 'required|string|max:20',
            'origin_data.customer_address_detail' => 'nullable|string|max:255',
            'origin_data.customer_zip_code' => 'required|string|max:10',
            'origin_data.zone_code' => 'required|string|max:255',
            'origin_data.organization_id' => 'required|integer',
            'origin_data.location_id' => 'required|string|max:255',

            'destination_data.customer_name' => 'required|string|max:255',
            'destination_data.customer_address' => 'required|string|max:255',
            'destination_data.customer_email' => 'nullable|email',
            'destination_data.customer_phone' => 'required|string|max:20',
            'destination_data.customer_address_detail' => 'nullable|string|max:255',
            'destination_data.customer_zip_code' => 'required|string|max:10',
            'destination_data.zone_code' => 'required|string|max:255',
            'destination_data.organization_id' => 'required|numeric',
            'destination_data.location_id' => 'required|uuid',

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
            'koli_data.*.koli_code' => 'required|string|max:255',

            'custom_field.catatan_tambahan' => 'nullable|string',
            'currentLocation.name' => 'required|string|max:255',
            'currentLocation.code' => 'required|string|max:255',
            'currentLocation.type' => 'required|string|max:255',
        ];
    }
}
