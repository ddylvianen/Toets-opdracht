<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LeverancierModel extends Model
{
    public static function sp_getallleveranciers(){
        return DB::select('CALL SP_GetAllLeveranciers');
    }

    public static function sp_getallproductenperleverancier($id){
        return DB::select('CALL SP_GetAllProductenperleverancier(:id)', ['id'=>$id]);
    }

    public static function sp_createlevering($data){

    }
    
    public static function sp_getleverancierbyid($id){
        return DB::selectOne('CALL SP_GetLeverancierById(:id)', ['id'=>$id]);
    }
}