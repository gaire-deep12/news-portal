<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        $articles = Article::get()->sortByDesc('id');
        return view('article.index', [
            'articles' => $articles

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get()->sortByDesc('id');
        return view('article.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $request->validate([
            'title' => 'required',
            'slug' => 'nullable|unique:categories,slug',
            'content' => 'nullable',
            'image' => 'nullable|file',
            'status' => 'required',
            'categoryid' => 'required',
        ]);


        if ($request->slug == NULL || $request->slug == "") {
            $slug = Str::slug($request->title);
        } else {
            $slug = $request->slug;
        }
        $filename = "";
        if ($request->image) {
            $filename = time() . '-' . $slug . '.' . $request->image->extension();
            $request->image->storeAs('public/images/', $filename);
            $filename = time() . '-' . $slug . '.' . $request->image->extension();
        }



        Article::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'image' => $filename,
            'status' => $request->status,
            'category_id' => $request->categoryid
        ]);

        return redirect()->route('article.index')->with('success', "Article Created Successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::get()->sortByDesc('id');
        return view('article.edit', [
            'article' => $article,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {

        $request->validate([
            'title' => 'required',
            'slug' => 'nullable|unique:categories,slug',
            'content' => 'required',
            'image' => 'nullable|file',
            'status' => 'required',
            'categoryid' => 'required',
        ]);


        if ($request->slug == NULL || $request->slug == "") {
            $slug = Str::slug($request->title);
        } else {
            $slug = $request->slug;
        }
        $filename = "";
        if ($request->image) {
            $filename = time() . '-' . $slug . '.' . $request->image->extension();
            $request->image->storeAs('public/images/', $filename);
            $filename = time() . '-' . $slug . '.' . $request->image->extension();
        }



        /*  Article::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'image' => $filename,
            'status' => $request->status,
            'category_id' => $request->categoryid
        ]); */

        $article->title = $request->title;
        $article->slug = $slug;
        $article->content = $request->content;
        if ($request->image) {
            $article->image = $filename;
        }
        $article->status = $request->status;
        $article->category_id = $request->categoryid;
        $article->save();


        return redirect()->route('article.index')->with('success', "Article Edited Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {

        if ($article->image) {
            if (Storage::exists(path: 'public\storage\image' . $article->image)) {
                Storage::delete(path: 'public\storage\image' . $article->image);
            }
        }
        $article->delete();
        return redirect()->route('article.index')->with('success', "Article Deleted Successfully!");
    }
}
