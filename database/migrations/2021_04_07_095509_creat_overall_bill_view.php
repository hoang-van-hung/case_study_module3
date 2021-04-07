<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatOverallBillView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW overall_bills AS
        SELECT bills.id,bills.date_pay,
                bill_details.quantity,
                customers.name as customer_name,customers.address,customers.phone,customers.email,
                statuses.name as status_name,
                products.name as product_name,products.price,
                categories.name as categories_name
        FROM bills
	        LEFT JOIN bill_details ON bills.id= bill_details.bill_id
	        LEFT JOIN customers  ON customers.id=bills.customer_id
	        LEFT JOIN statuses  ON statuses.id=bills.status_id
	        LEFT JOIN products ON products.id=bill_details.product_id
	        LEFT JOIN categories ON categories.id = products.category_id;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
