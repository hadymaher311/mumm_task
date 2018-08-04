<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
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
        $articles = Article::orderBy('id', 'desc')->paginate(10);
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'string|required|min:3',
            'body' => 'string|required|min:15',
            'category' => 'required|exists:categories,id'
        ]);
        $article = new Article;
        $article->subject = $request->subject;
        $article->body = $request->body;
        $article->category_id = $request->category;
        $article->published_at = ($request->publish === 1) ? Carbon::now() : null;
        $article->save();
        return redirect('admin/article')->with(['status' => 'Added Successfully!!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $comments = $article->comments;
        return view('admin.article.show', compact('article', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.article.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'subject' => 'string|required|min:3',
            'body' => 'string|required|min:15',
            'category' => 'required|exists:categories,id'
        ]);
        $article->subject = $request->subject;
        $article->body = $request->body;
        $article->category_id = $request->category;
        if (!$article->published_at) {
            $article->published_at = ($request->publish == 1) ? Carbon::now() : null;
        }
        $article->save();
        return redirect('admin/article')->with(['status' => 'Updated Successfully!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return back()->with(['status' => 'Deleted Successfully']);
    }
}
