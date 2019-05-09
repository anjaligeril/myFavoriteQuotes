<?php

namespace App\Http\Controllers;
use Auth;
use App\Quote;
use Illuminate\Http\Request;

class quotesController extends Controller
{

    public function insertQuotes(Request $request){

        session_start();

        $this->validate($request, [

            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $path='';
        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $data[] = $name;
                $path='/images/'.$name;
            }
        }
        $user_id=$_SESSION["user_id"];
        $show_name=$_POST['showName'];
        $season=$_POST['season'];
        $episode=$_POST['episode'];
        $current_quote=$_POST['quote'];
        $quote=new Quote();
        $quote->user_id=$user_id;
        $quote->show_name=$show_name;
        $quote->season=$season;
        $quote->episode=$episode;
        $quote->image=$path;
        $quote->quotes=$current_quote;
        $quote->save();
       $allQuotes=Quote::where('user_id',$_SESSION["user_id"])->get();
       return back()->with (['success'=>'Category added successfully','allQuotes'=>$allQuotes]);
    }

    public function showQuotes(){
        session_start();
        $user_id=Auth::User()->id;
        $_SESSION["user_id"]=$user_id;
        $allQuotes=Quote::where('user_id',$_SESSION["user_id"])->get();
        return view( 'home')->with ('allQuotes',$allQuotes);
    }

    public function deleteQuotes($id){
        Quote::destroy($id);
        return back()->with('success', 'Quotes deleted successfully');
    }

    public function updateQuotes(Request $request,$id){

        session_start();

        $this->validate($request, [

            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $path='';
        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $data[] = $name;
                $path='/images/'.$name;
            }
        }

        $user_id=$_SESSION["user_id"];
        $show_name=$_POST['showName'];
        $season=$_POST['season'];
        $episode=$_POST['episode'];
        $current_quote=$_POST['quote'];
        $quote=Quote::find($id);
        $quote->user_id=$user_id;
        $quote->show_name=$show_name;
        $quote->season=$season;
        $quote->episode=$episode;
        $quote->image=$path;
        $quote->quotes=$current_quote;
        $quote->save();
        return back()->with('success', 'Quotes updated successfully');
    }

    public function searchQuotes(){
        session_start();
        $detail=$_POST['detail'];
        $selectedQuotes=Quote::where('user_id',$_SESSION["user_id"])->where('show_name', 'like','%'.$detail.'%')->orwhere('season', 'like','%'.$detail.'%')->orwhere('episode', 'like','%'.$detail.'%')->orwhere('quotes', 'like','%'.$detail.'%')->get();
        return view('home')->with ('allQuotes',$selectedQuotes);
    }
}
