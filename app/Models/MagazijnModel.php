<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MagazijnModel extends Model
{
    public static function sp_GetAllProducts()
    {
        return DB::select('CALL sp_GetAllProducts()');
    }

    // public static function sp_GetLeveringInfo($product_id)
    // {
    //     return DB::select('CALL sp_GetLeveringInfo(?)', [$product_id]);
    // }

    public static function sp_GetProductById($id)
    {
        return DB::selectOne('CALL sp_GetProductById(?)',[$id]);
    }

    public static function sp_GetAllLeveringen($product_id)
    {
        return DB::select('CALL sp_GetAllLeveringen(?)',[$product_id]);
    }

    public static function sp_GetMagazijnData($product_id)
    {
        return DB::selectOne('CALL sp_GetMagazijndata(?)', [$product_id]);
    }

    public static function sp_GetAllgergeenByProductId($product_id)
    {
        return DB::select('CALL sp_GetAllgergeenByProductId(:id)',[
            'id' => $product_id
        ]);
    }
}

