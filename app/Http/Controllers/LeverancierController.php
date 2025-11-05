<?php

namespace App\Http\Controllers;

use App\Models\LeverancierModel;
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
        return dd($leverancier, $producten);
    }

    public function create(){
       return view('leveranciers.create');
    }

    public function store(Request $request){
        $validated = $request->validate([]);

        return 1;
    }


}