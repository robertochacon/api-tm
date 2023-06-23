<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Authors::all();
        return response()->json(["data"=>$authors],200);
    }

    public function watch($id){
        try{
            $author = Authors::find($id);
            return response()->json(["data"=>$author],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    public function register(Request $request)
    {
        $authors = new Authors(request()->all());
        $authors->save();
        return response()->json(["data"=>$authors],200);
    }

    public function update(Request $request, $id){
        try{
            $author = Authors::find($id);
            $author->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    public function delete($id){
        try{
            Authors::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

}
