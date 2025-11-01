<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LeverancierModel extends Model
{
    public static function sp_getallleveranciers(){
        return DB::select('CALL SP_GetAllLeveranciers');
    }
}