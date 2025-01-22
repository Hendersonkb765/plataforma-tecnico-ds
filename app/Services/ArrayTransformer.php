<?php

namespace App\Services;

class ArrayTransformer{

    public static function toAssociative($array){

        $array =$array[key($array)];
        $keyArray = $array[0];
        unset($keyArray[0],$keyArray[1]);
        array_shift($array);
        $dataItem = ['dateTime'=>'','email'=>'','questions'=>[]];
        $data = [];
        foreach($array as $item){

            $dataItem['dateTime'] = $item[0];
            array_shift($item);
            $dataItem['email'] = $item[0];
            array_shift($item);
            $combineArrays = array_combine($keyArray,$item);

            $dataItem['questions']= $combineArrays;
            array_push($data,$dataItem);
        }

        return $data;
  
       
    }
}

?>