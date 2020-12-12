<?php

namespace App\Imports;

use App\Models\Province;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\City;
class CityImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
        foreach($collection as $key=>$row){
          if($key>1){
              $province_name = $row[3];
              if($province_name!=''){
                $province = Province::where('name',$province_name)->first();
              if(!$province){
                    $province =  Province::create([
                        "name"=>$province_name
                    ]);
              }
              $city = City::create([
                  'name'=>$row[1],
                  'province_id'=>$province->id
              ]);
              }

          }
        }
    }
}
