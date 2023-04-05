<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }
    public function acceptArticle(Article $article){
        $article->setAccepted(true);
        return redirect()->back()->with('message','Congratulation your article has been accepted');
    }
    public function rejectArticle(Article $article){
        $article->setAccepted(false);
        return redirect()->back()->with('message','Article reject, become Revisor');
    }
    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message','Congratulations, you have become a reviewer');
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor',["email"=>$user->email]);
        return redirect('/')->with('message','Congratulations, you have become a reviewer');
    }

    public function undo(){
         $article= Article::where('is_accepted', '!=', NULL)->orderBy('created_at', 'DESC')->first();
         $article->setAccepted(NULL);
         return redirect()->back()->with('undoLast', 'you have undo the last change');
    }
}
