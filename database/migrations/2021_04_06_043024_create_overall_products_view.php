<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOverallProductsView extends Migration
{

    public function up()
    {

    }

    public function down()
    {
        Schema::dropIfExists('overall_products_view');
    }
}
