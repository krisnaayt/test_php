<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbProductItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            create table tb_product_items(
                item_id int,
                product_id int not null,
                item_title varchar(256) not null,
                item_price int not null default 0,
                item_image varchar(256),
                item_stock int not null default 0,
                created_at datetime not null,
                updated_at datetime,
                

                constraint pk_tb_product_items_item_id primary key (item_id),
                constraint fk_tb_product_items_product_id foreign key (product_id) references tb_products (product_id) on update cascade on delete cascade
                
            )
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_items');
    }
}
