<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemStockTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            DROP TRIGGER IF EXISTS item_stock_trigger;
            CREATE TRIGGER item_stock_trigger
            AFTER INSERT ON transaction_details
            FOR EACH ROW
            BEGIN
                CALL reduce_stock(NEW.id);
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
