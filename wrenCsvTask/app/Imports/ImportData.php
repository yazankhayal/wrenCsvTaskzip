<?php

namespace App\Imports;

use App\ProductData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportData implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $code = $row[0];
        $name = $row[1];
        $description = $row[2];
        $stock = $row[3];
        $costs = $row[4];
        $dis = $row[5];
        if($name != null && $code != null  &&
            $description != null && $stock != null &&
            $costs != null && $dis != null){
            if($costs > 5 && $stock > 10){

                //Check the costs type
                $decimal = explode("$",$costs)[0];
                if($decimal != "$"){
                    if($costs < 1000){
                        if($dis == "yes"){

                            //same code
                            $same_code = ProductData::where("strProductCode",$code)->first();
                            if($same_code == null){

                                $save = new ProductData();
                                $save->strProductName = $name;
                                $save->strProductDesc = $description;
                                $save->strProductCode = $code;
                                $save->dtmAdded =  date('Y-m-d H:i:s');
                                $save->dtmDiscontinued =  date('Y-m-d H:i:s');
                                $save->save();

                            }

                        }
                    }
                }

            }

        }
    }

}
