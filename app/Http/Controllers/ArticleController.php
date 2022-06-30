<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        //
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
            'image' => 'required|file|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $article = new Article();
        $article->id = Str::uuid();
        $article->author = $request->author;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->image = $request->image;

        $imageExt = $request->image->getClientOriginalExtension();
        $imageName = substr($article->id, 0, 8) . "-" . time() . $imageExt;
        $request->image->storeAs('public/article', $imageName);

        $article->image = $imageName;
        $article->save();

        return redirect()->route('manage_article')->withSuccess('New office added');
    }

    public function show($id)
    {
        //
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

            $imageExt = $request->image->getClientOriginalExtension();
            $imageName = substr($article->id, 0, 8) . "-" . time() . $imageExt;
            $request->image->storeAs('public/article', $imageName);

            $article->image = $imageName;
        }

        $article->save();
        return redirect()->route('manage_article')->withSuccess('Article updated');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('manage_article')->withSuccess('Article successfully deleted');
    }
}
