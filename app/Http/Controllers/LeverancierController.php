<?php

namespace App\Http\Controllers;

use App\Models\LeverancierModel;
use App\Models\MagazijnModel;
use Illuminate\Http\Request;

class LeverancierController 
{
    public function index(){
        $leveranciers = LeverancierModel::sp_getallleveranciers();

        return view('leveranciers.index', [
            'title' => 'Leverancier Overzicht',
            'leveranciers' => $leveranciers
        ]);
    }

    public function show($id){
        $leverancier = LeverancierModel::sp_getleverancierbyid($id);
        $producten = LeverancierModel::sp_getallproductenperleverancier($id);
        return view('leveranciers.producten_info', compact('leverancier', 'producten'));
        // return dd($leverancier, $producten);
    }

    public function create($lvnid,$prdid){
        $leverancier = LeverancierModel::sp_getleverancierbyid($lvnid);
        $product = MagazijnModel::sp_GetProductById($prdid);
        // return dd($leverancier, $product);
       return view('leveranciers.create', compact('leverancier', 'product'));
    }

    public function store(Request $request){
        $validated = $request->validate([]);

        return 1;
    }


}