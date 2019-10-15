<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all();
        return view('pages.index', compact('apartments'));
    }

    public function getAppartmens()
    {
        $get = new Apartment();
        $get->getApartments();

        return view('pages.get');
    }

    public function charData(Request $request)
    {
        $id = (integer)$request->input('room');
        $get = new Apartment();
        return $get->getRooms($id);
    }
}


