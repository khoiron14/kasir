<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReduceStockItemProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            DROP PROCEDURE IF EXISTS reduce_stock;
            CREATE PROCEDURE reduce_stock(transaction_detail_id INT)
            BEGIN
                UPDATE items
                SET stock=stock - item_quantity(transaction_detail_id)
                WHERE id=item_id(transaction_detail_id);
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
