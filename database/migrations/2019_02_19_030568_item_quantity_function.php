<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemQuantityFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE OR REPLACE FUNCTION item_quantity(transaction_detail_id INT) RETURNS CHAR(20)
            BEGIN
                DECLARE qty INT;
                SELECT `quantity` INTO qty FROM `transaction_details` WHERE id=transaction_detail_id;
                RETURN qty;
            END
        ');
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
