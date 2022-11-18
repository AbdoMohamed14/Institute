<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        

        return view('dashboard.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        return view('dashboard.articles.create', compact('categories'));
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
            'title'       => 'required|string|min:5|max:50',
            'title_ar'    => 'required|string|min:5|max:50',
            'content'     => 'required|string',
            'content_ar'  => 'required|string',
            'category'    => 'required|integer',
            'image'       => '|required|image',
            
        ]);

        $newPhotoName = time() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('article_photos'), $newPhotoName);

        Article::create([

            'title'       => $request->title,
            'title_ar'    => $request->title_ar,
            'content'     => $request->content,
            'content_ar'  => $request->content_ar,
            'category_id'    => $request->category,
            'image'       => $newPhotoName,
            'auther_id'   => Auth::user()->id
        ]);

        return redirect(route('dashboard.articles.index'))->with('message', 'Article Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('dashboard.articles.show');

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

        return view('dashboard.articles.edit', compact('article', 'categories'));
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
            'title'       => 'required|string|min:5|max:50',
            'title_ar'    => 'required|string|min:5|max:50',
            'content'     => 'required|string',
            'content_ar'  => 'required|string',
            'category'    => 'required|integer',
            'image'       => 'nullable|image',
            
        ]);

        if($request->image)
        {
            $article = Article::find($id);

            File::delete('article_photos/'.$article->image);

            $newPhotoName = time() . '-' . $request->title . '.' . $request->image->extension();

            $request->image->move(public_path('article_photos'), $newPhotoName);

            Article::where('id',$id)->update([

                'title'       => $request->title,
                'title_ar'    => $request->title_ar,
                'content'     => $request->content,
                'content_ar'  => $request->content_ar,
                'category_id' => $request->category,
                'image'       => $newPhotoName,
                'auther_id'   => Auth::user()->id,

            ]);
        }else
        {
            Article::where('id',$id)->update([

                'title'       => $request->title,
                'title_ar'    => $request->title_ar,
                'content'     => $request->content,
                'content_ar'  => $request->content_ar,
                'category_id' => $request->category,
                'auther_id'   => Auth::user()->id,

            ]);
        }

        return redirect(route('dashboard.articles.index'))->with('message', 'Article Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

        File::delete('article_photos/'.$article->image);

        Article::destroy($article->id);

        return redirect()->back()->with('message', 'Article Deleted successfully');
    }
}
