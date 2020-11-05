<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use Illuminate\Support\Facades\DB;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        $search = $request->input('search');

        // 検索フォーム用
        $query = DB::table('words');

        if($search !== null) {
            //全角スペースを半角に置換する
            $search_split = mb_convert_kana($search,'s');
            //空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split,-1,PREG_SPLIT_NO_EMPTY);
            //単語をループで回す
            foreach($search_split2 as $value)
            {
            $query->where('action','like','%'.$value.'%');
            }
        };

        $query->select('id', 'text', 'impression', 'action');
        $query->orderBy('created_at', 'desc');
        $words = $query->paginate(5);

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
    public function store(Request $request)
    {
        $word = new Word;

        $word->text = $request->input('text');
        $word->impression = $request->input('impression');
        $word->action = $request->input('action');

        $word->save();

        \Session::flash('flash_message', '保存しました。');
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
        //
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
        //
        $word = Word::find($id);
        $word->delete();

        \Session::flash('flash_message', '削除しました');
        return redirect('words/index');
    }
}
