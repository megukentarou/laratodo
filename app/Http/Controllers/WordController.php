<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use Illuminate\Support\Facades\DB;

class WordController extends Controller
{
    public function index()
    {
        $values = Word::all();

        $words = DB::table('words')
        ->select('id', 'text', 'impression', 'action')
        ->get();

        // dd($words);
     
        return view('words.index', compact('values'));
    }
}
