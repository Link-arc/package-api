<?php

use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('package', function ($collection) {
            $collection->index('transaction_id');
            $collection->string('customer_name');
            $collection->string('customer_code');
            $collection->decimal('transaction_amount', 10, 2);
            $collection->decimal('transaction_discount', 10, 2);
            $collection->string('transaction_additional_field');
            $collection->string('transaction_payment_type');
            $collection->string('transaction_state');
            $collection->string('transaction_code');
            $collection->integer('transaction_order');
            $collection->string('location_id');
            $collection->integer('organization_id');
            $collection->string('created_at');
            $collection->string('updated_at');
            $collection->string('transaction_payment_type_name');
            $collection->decimal('transaction_cash_amount', 10, 2);
            $collection->decimal('transaction_cash_change', 10, 2);
            $collection->mixed('customer_attribute');
            $collection->mixed('connote');
            $collection->string('connote_id');
            $collection->mixed('origin_data');
            $collection->mixed('destination_data');
            $collection->mixed('koli_data');
            $collection->mixed('custom_field');
            $collection->mixed('currentLocation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->drop('package');
    }
};
