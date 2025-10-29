<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\MagazijnModel;
use App\Models\AllergeenModel;
use PhpParser\Node\Stmt\Continue_;

class MagazijnController 
{

    public function index()
    {
        $producten = MagazijnModel::sp_GetAllProducts();

        return view('magazijn.index', [
            'title' => 'Magazijn Overzicht',
            'producten' => $producten
        ]);
    }


    public function showLeveringInfo($id)
    {

        $product =  MagazijnModel::sp_GetProductById($id);
        $magazijnData = MagazijnModel::sp_GetMagazijnData($id);
        $leveringen = MagazijnModel::sp_GetAllLeveringen($id);

        $cmpct = compact('product', 'leveringen');

        if (!$magazijnData || $magazijnData->AantalAanwezig == 0) {
            $verwachteDatum = $leveringen[0]->DatumEerstVolgendeLevering ?? 'onbekend';
            $message = "Er is van dit product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is: $verwachteDatum";

            $cmpct['message'] = $message;
        }

        return view('magazijn.levering_info', $cmpct);
    }

    public function showAllergenenInfo($id)
    {

        $product = MagazijnModel::sp_GetProductById($id);


        $allergenen = MagazijnModel::sp_GetAllgergeenByProductId($id);

        if (empty($allergenen)) {
            $message = 'In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken.';
            return view('magazijn.allergenen_info', compact('product', 'message'));
        }

        return view('magazijn.allergenen_info', compact('product', 'allergenen'));
    }
}
