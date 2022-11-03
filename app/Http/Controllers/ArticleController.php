<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles= Article::all();
        $users= User::all();
        return view('pages.back.articles',compact('articles','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'text'=>'required',
            'user_id'=>'required'            
        ]);

        $store= new Article();

        $store->title=$request->title;
        $store->text=$request->text;
        $store->user_id=$request->user_id;

        $store->save();
        return redirect()->back()->with('succes',"L'article a bien été cré !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article= Article::find($id);
        return view('pages.back.showArticle',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::find($id);
        $users= User::all();
        return view('pages.back.editArticle',compact('article','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'text'=>'required',
            'user_id'=>'required'            
        ]);

        $update= Article::find($id);

        $update->title=$request->title;
        $update->text=$request->text;
        $update->user_id=$request->user_id;

        $update->save();
        return redirect('/articleCRUD/'.$update->id)->with('succes',"L'article a bien été modifié !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete= Article::find($id);
        $delete->delete();
        return redirect(route('articlesCRUD'))->with('succes','Article correctement supprimé');
    }
}
