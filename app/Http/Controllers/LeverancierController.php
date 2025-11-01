<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\LeverancierModel;
use PhpParser\Node\Stmt\Continue_;

class LeverancierController 
{
    public function index(){
        $leveranciers = LeverancierModel::sp_getallleveranciers();

        return view('leveranciers.index', [
            'title' => 'Leverancier Overzicht',
            'leveranciers' => $leveranciers
        ]);
    }

    public function productenperleverancier(){
        return 'hi';
    }
}