<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books = Books::with(['author','category'])->get();
        return response()->json(["data"=>$books],200);
    }

    public function watch($id){
        try{
            $book = Books::find($id);
            return response()->json(["data"=>$book],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    public function register(Request $request)
    {
        $books = new Books(request()->all());
        $books->save();
        return response()->json(["data"=>$books],200);
    }

    public function update(Request $request, $id){
        try{
            $book = Books::find($id);
            $book->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    public function delete($id){
        try{
            Books::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

}
