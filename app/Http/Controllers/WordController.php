<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreWord;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //クエリビルダ
        $words = DB::table('words')
        ->select('id', 'text', 'impression', 'action')
        ->orderBy('created_at', 'desc')
        ->paginate(5);;

        return view('words.index', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('words.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWord $request)
    {
        $word = new Word;

        $word->text = $request->input('text');
        $word->impression = $request->input('impression');
        $word->action = $request->input('action');

        $word->save();

        \Session::flash('flash_message', '保存しました');
        return redirect('words/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $word = Word::find($id);
        
        return view('words.show', compact('word'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $word = Word::find($id);
        
        return view('words.edit', compact('word'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $word = Word::find($id);

        $word->text = $request->input('text');
        $word->impression = $request->input('impression');
        $word->action = $request->input('action');

        $word->save();

        \Session::flash('flash_message', '更新しました');
        return redirect('words/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $word = Word::find($id);
        $word->delete();

        \Session::flash('flash_message', '削除しました');
        return redirect('words/index');
    }
}
