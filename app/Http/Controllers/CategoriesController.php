<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return response()->json(["data"=>$categories],200);
    }

    public function watch($id){
        try{
            $category = Categories::find($id);
            return response()->json(["data"=>$category],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    public function register(Request $request)
    {
        $categories = new Categories(request()->all());
        $categories->save();
        return response()->json(["data"=>$categories],200);
    }

    public function update(Request $request, $id){
        try{
            $category = Categories::find($id);
            $category->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    public function delete($id){
        try{
            Categories::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

}
