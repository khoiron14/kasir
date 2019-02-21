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
            CREATE TRIGGER item_stock_trigger
            AFTER INSERT ON `transaction_details`
            FOR EACH ROW
            BEGIN
                UPDATE `items` SET stock=stock - NEW.quantity WHERE id=NEW.item_id;
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
        DB::unprepared('DROP TRIGGER IF EXISTS item_stock_trigger');
    }
}
