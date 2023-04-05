<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Mail\ContactSeller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function homepage(){
        $offers = Article::where('is_accepted', 1)->orderBy('updated_at', 'DESC')->take(20)->get();
        $count = Article::where('is_accepted', 1)->count();
        $articles = Article::where('is_accepted', 1)->orderBy('created_at', 'DESC')->take(6)->get();
        return view('welcome', compact('articles', 'count', 'offers'));
    } 
   

    public function index(){
        $count = Article::where('is_accepted', 1)->count();
        $articles = Article::where('is_accepted', 1)->orderBy('created_at', 'DESC')->paginate(6);
        // $article= Article::where('is_accepted', '!=', NULL)->orderBy('created_at', 'DESC')->first();
        return view('article.index', compact('articles', 'count'));
    }

    public function create(){
        return view('article.create');
    }

    public function show(Article $article){
        return view('article.show', compact('article'));
    }

    public function showOffer(Article $offer)
    {
        $article = $offer;
        return view('article.showOffer', compact('offer', 'article'));
    }

    public function edit(Article $article){
        return view('article.edit', compact('article'));
    }



    public function categoryShow(Category $category){
        $articles = $category->articles->all();
        return view('category.show', compact('category','articles'));
    }

    public function searchArticles(Request $request){
        $count = Article::where('is_accepted', 1)->count();
        $articles = Article::search($request->searched)->where('is_accepted', true)->paginate(10);
        return view('article.index', compact('articles', 'count'));
    }

    public function profile(){
        // return view('profile');

        $articles = Article::where('user_id', Auth::id())->orderBy('created_at', 'DESC');

        return view('profile', compact('articles'));
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();

    }
    
    public function contactSeller(Article $article){
        return view ('article.contactSeller', compact('article'));
    }

    public function contactSellerSubmit(Request $request){  
        $articleName=$request->articleName;
        $sellerEmail= $request-> sellerEmail;
        $description= $request-> description;
        $user= Auth::user();

        Mail::to($sellerEmail)->send(new ContactSeller($articleName, $sellerEmail, $description, $user));
        // dd($request->articleName);

        return redirect()->back()->with('message','Your email has been sent');

    }

    public function destroy(){
        Auth::user()->delete();
        return redirect(route('homepage'))->with('userDeleted', 'Ti sei cancellato dal sistema, speriamo di rivederti presto!');
    }
}
