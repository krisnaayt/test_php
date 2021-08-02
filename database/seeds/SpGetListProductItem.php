<?php

use Illuminate\Database\Seeder;

class SpGetListProductItem extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS get_list_product_item;");
        
        DB::unprepared("CREATE PROCEDURE get_list_product_item(
            product_id_ int,
            item_id_ int
        )
        begin
            select
            p.product_id,
            p.product_name,
            pi.item_id,
            pi.item_title,
            pi.item_price,
            pi.item_image,
            pi.item_stock,
            pi.created_at,
            pi.updated_at
            from tb_products p
            left join tb_product_items pi on p.product_id = pi.product_id
            where
            case when product_id_ is not null then p.product_id = product_id_ else true end
            and case when item_id_ is not null then pi.item_id = item_id_ else true end 
            order by pi.created_at desc
            ;
        end
        ");
    }
}
