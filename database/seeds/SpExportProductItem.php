<?php

use Illuminate\Database\Seeder;

class SpExportProductItem extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS export_product_item;");
        
        DB::unprepared("CREATE PROCEDURE export_product_item(
            product_id_ int
        )
        begin
            select
            row_number() over (
                order by pi.created_at asc
            ) as row_num,
            pi.item_title,
            p.product_name,
            pi.item_price,
            pi.item_stock,
            pi.item_image,
            pi.created_at,
            pi.updated_at
            from tb_products p
            left join tb_product_items pi on p.product_id = pi.product_id
            where
            case when product_id_ is not null then p.product_id = product_id_ else true end
            group by 
            pi.item_id,
            pi.item_title,
            p.product_name,
            pi.item_price,
            pi.item_stock,
            pi.item_image,
            pi.created_at,
            pi.updated_at
            order by pi.created_at asc
            ;
        end
        ");
    }
}
