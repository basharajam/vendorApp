<?php

namespace App\Imports;

use App\Constants\PostStatus;
use App\Constants\StockStatus;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Services\Post\IPostService;

class ProductImport implements ToCollection
{

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
        $rows  = collect();
        foreach($collection as $key=>$row){
            //categories , images , 'attributes'
          if($key==0)continue;
            $rows->push([
                "product_type"=>$row[1],
                "_sku"=>$row[2],
                "post_title"=>$row[3],
                "post_status"=>$row[4] ==1 ? \App\Constants\PostStatus::PUBLISHED : PostStatus::DRAFT,
                "post_content"=>$row[8],
                "__stock_status"=>$row[13]==1 ? StockStatus::AVAILABLE : \App\Constants\StockStatus::NOT_AVAILABLE,
                "_weight"=>$row[18],
                "_sale_price"=>$row[24],
                "_regular_price"=>$row[25],
                "post_parent"=>$row[32],
                "thickness"=>$row[44],
                "printing_single"=>$row[45],
                "size"=>$row[48],
                "supplier_name"=>$row[49],
                "cartoon_qty"=>$row[50],
                "cbm_single"=>$row[51],
                "days_to_delivery"=>$row[52],
                "_wc_min_qty_product"=>$row[53],
                "_wc_max_qty_product"=>$row[56],
                "material"=>$row[80],

            ]);
        }
        return $rows;

    }
}
