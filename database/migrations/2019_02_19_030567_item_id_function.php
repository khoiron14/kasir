<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemIdFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE OR REPLACE FUNCTION item_id(transaction_detail_id INT) RETURNS CHAR(20)
            BEGIN
                DECLARE id INT;
                SELECT `item_id` INTO id FROM `transaction_details` WHERE id=transaction_detail_id;
                RETURN id;
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
