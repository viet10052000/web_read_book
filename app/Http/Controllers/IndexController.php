<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Comic;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function home(){
        $genres = Genre::all();
        $categories = Category::all();
        $comics = Comic::orderBy('id','DESC')->where('active',0)->take(5)->get();
        return view('pages.home',compact(['categories','comics','genres']));
    }
    public function category($slug){
        $genres = Genre::all();
        $categories = Category::all();
        $category_id = Category::where('slug',$slug)->first();
        $comics = Comic::orderBy('id','DESC')->where('active',0)->where('category_id',$category_id->id)->get();
        return view('pages.category',compact(['categories','comics','genres','category_id']));
    }
    public function genre($slug){
        $genres = Genre::all();
        $categories = Category::all();
        $genre = Genre::where('slug',$slug)->first();
        //dd($genre->id);
        $comics = DB::table('comics')
            ->join('comic_genre','comics.id','=','comic_genre.comic_id')
            ->where('genre_id',$genre->id)->orderBy('id','DESC')->get();
        //dd($comics);
        //$comics = Comic::orderBy('id','DESC')->genres->where('comic_id',1)->get();
        //$comics = Comic::orderBy('id','DESC')->where('active',0)->where('id',$comic_id->id)->get();
        return view('pages.genre',compact(['categories','genres','genre','comics']));
    }
    public function viewComic($slug){
        $genres = Genre::all();
        $categories = Category::all();
        $comic = Comic::where('slug',$slug)->first();

        //view
        $comic->view = $comic->view + 1;
        $comic->save();

        $chapters = Chapter::orderBy('id','ASC')->where('comic_id',$comic->id)->get();
        //dd($chapters);
        $chapter_first = Chapter::orderBy('id','ASC')->where('comic_id',$comic->id)->first();
        $sameCategory = Comic::where('category_id',$comic->category->id)->whereNotIn('id',[$comic->id])->get();
        return view('pages.comic',compact(['categories','comic','chapters','sameCategory','chapter_first','genres']));
    }
    public function allComic(){
        $genres = Genre::all();
        $categories = Category::all();
        $comics = Comic::all();
        return view('pages.allComic',compact(['genres','categories','comics']));
    }
    public function viewChapter($slug){
        $genres = Genre::all();
        $categories = Category::all();
        $comic = Chapter::where('slug',$slug)->first();
        $chapter = Chapter::orderBy('id','DESC')->where('slug',$slug)->where('comic_id',$comic->comic_id)->first();
        $chapters = Chapter::orderBy('id','ASC')->where('comic_id',$comic->comic_id)->get();

        return view('pages.chapter',compact(['categories','chapter','chapters','genres']));
    }
    public function search(Request $request){
        $genres = Genre::all();
        $categories = Category::all();
        $keyword = $request->keyword;
        $comics = Comic::where('name','LIKE','%'.$keyword.'%')->orWhere('author','LIKE','%'.$keyword.'%')->get();
        return view('pages.search',compact(['genres','categories','comics']));
    }
}
