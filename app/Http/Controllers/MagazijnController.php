<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MagazijnController extends Controller
{

    public function index()
    {
        $producten = DB::table('magazijn as m')
            ->join('product as p', 'm.ProductId', '=', 'p.Id')
            ->select(
                'm.Id as MagazijnId',
                'p.Id as ProductId',
                'p.Naam',
                'p.Barcode',
                'm.Verpakkingseenheid',
                'm.AantalAanwezig'
            )
            ->orderBy('p.Barcode', 'asc')
            ->get();

        return view('magazijn.index', [
            'title' => 'Magazijn Overzicht',
            'producten' => $producten
        ]);
    }


    public function showLeveringInfo($id)
    {

        $product = DB::table('product')
            ->select('Naam', 'Barcode')
            ->where('Id', $id)
            ->first();

        $magazijnData = DB::table('magazijn')
            ->where('ProductId', $id)
            ->first();

        $leveringen = DB::table('productperleverancier as ppl')
            ->join('leverancier as l', 'ppl.LeverancierId', '=', 'l.Id')
            ->where('ppl.ProductId', $id)
            ->select(
                'l.Naam as LeverancierNaam',
                'l.Contactpersoon',
                'l.Leveranciernummer',
                'l.Mobiel',
                'ppl.DatumLevering',
                'ppl.Aantal',
                'ppl.DatumEerstVolgendeLevering'
            )
            ->orderBy('ppl.DatumLevering', 'asc')
            ->get();

        if (!$magazijnData || $magazijnData->AantalAanwezig == 0) {
            $verwachteDatum = $leveringen->first()?->DatumEerstVolgendeLevering ?? 'onbekend';
            $message = "Er is van dit product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is: $verwachteDatum";

            return view('magazijn.levering_info', compact('product', 'message'));
        }

        return view('magazijn.levering_info', compact('product', 'leveringen'));
    }

    public function showAllergenenInfo($id)
    {

        $product = DB::table('product')
            ->select('Naam', 'Barcode')
            ->where('Id', $id)
            ->first();


        $allergenen = DB::table('productperallergeen as pa')
            ->join('allergeen as a', 'pa.AllergeenId', '=', 'a.Id')
            ->where('pa.ProductId', $id)
            ->select('a.Naam as AllergeenNaam', 'a.Omschrijving')
            ->get();

        if ($allergenen->isEmpty()) {
            $message = 'In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken.';
            return view('magazijn.allergenen_info', compact('product', 'message'));
        }

        return view('magazijn.allergenen_info', compact('product', 'allergenen'));
    }
}
