<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class MagazijnModel
{
    public function sp_GetAllProducts()
    {
        return DB::table('Magazijn as m')
            ->join('Product as p', 'm.ProductId', '=', 'p.Id')
            ->orderBy('p.Barcode', 'asc')
            ->select('m.*', 'p.Naam', 'p.Barcode')
            ->get();
    }
}
