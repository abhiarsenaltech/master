<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database;

class CardsController extends Controller
{
    public function index(){
        $cards=Card::all();
        return view('cards.index',compact('cards'));
    }
    public function show(Card $card){
        return view('cards.show',compact('card'));
    }
}
