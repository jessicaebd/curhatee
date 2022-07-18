<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        
        $data = [
            'articles' => $articles,
        ];
        
        return view('article.index', $data);
    }

    public function create()
    {
        return view('admin.article.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $article = new Article();
        $article->id = Str::uuid();
        $article->author = $request->author;
        $article->title = $request->title;
        $article->content = $request->content;

        if ($request->hasFile('image')) {
            $request->validate(
                ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240'],
            );

            $destination_path = 'public/images/articles';
            $image = $request->file('image');
            $imageExt = $image->getClientOriginalExtension();
            $image_name = substr($article->id, 0, 8) . "-" . time() . "." . $imageExt;
            $path = $request->file('image')->storeAs($destination_path, $image_name);

            $article->image = $image_name;
        } else {
            $article->image = 'article.jpg';
        }

        $article->created_at = Carbon::now('Asia/Bangkok');
        $article->updated_at = Carbon::now('Asia/Bangkok');

        $article->save();
        return redirect()->route('manage_article')->withSuccess('New article added!');
    }

    public function show($id)
    {
        $article = Article::find($id);
        
        $data = [
            'article' => $article,
        ];
        
        return view('article.show', $data);
    }

    public function edit($id)
    {
        return view('admin.article.edit', ['article' => Article::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'author' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $article = Article::findOrFail($id);
        $article->author = $request->author;
        $article->title = $request->title;
        $article->content = $request->content;

        if ($request->image !== NULL) {
            $request->validate([
                'image' => 'required|file|image|mimes:jpg,jpeg,png|max:10240'
            ]);

            $destination_path = 'public/images/articles';
            $image = $request->file('image');
            $imageExt = $image->getClientOriginalExtension();
            $image_name = substr($article->id, 0, 8) . "-" . time() . "." . $imageExt;
            $path = $request->file('image')->storeAs($destination_path, $image_name);

            $article->image = $image_name;
        }

        $article->updated_at = Carbon::now('Asia/Bangkok');

        $article->save();
        return redirect()->route('manage_article')->withSuccess('Article succesfully updated!');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('manage_article')->withSuccess('Article successfully deleted!');
    }
}
