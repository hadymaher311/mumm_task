<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function home()
    {
    	$categories = Category::orderBy('id', 'desc')->paginate(9);
    	return view('welcome', compact('categories'));
    }

    public function articles($category = null)
    {
    	if ($category) {
	    	$articles = Article::where('category_id', $category)
	    			->where('published_at', '!=', null)
	    			->orderBy('id', 'desc')
	               	->paginate(10);
    	} else {
    		$articles = Article::where('published_at', '!=', null)
	    			->orderBy('id', 'desc')
	               	->paginate(10);
    	}
        return view('article.articles', compact('articles'));
    }

    public function show(Article $article)
    {
        $comments = $article->comments;
    	return view('article.show', compact('article', 'comments'));
    }

    public function comment(Request $request, Article $article)
    {
        $this->validate($request, [
            'body' => 'string|required'
        ]);

        $comment = new Comment;
        $comment->body = $request->body;
        $comment->user_id = Auth::id();
        $comment->article_id = $article->id;
        $comment->save();

        return back();
    }
}
