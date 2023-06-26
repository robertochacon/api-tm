<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * @OA\Get (
     *     path="/api/books",
     *      operationId="all_books",
     *     tags={"Books"},
     *     security={{ "apiAuth": {} }},
     *     summary="All books",
     *     description="All books",
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="author", type="string", example="author"),
     *              @OA\Property(property="category", type="string", example="category"),
     *              @OA\Property(property="title", type="string", example="title"),
     *              @OA\Property(property="description", type="string", example="description"),
     *              @OA\Property(property="image", type="string", example="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFETSM4Qtu1n35k9yu_5CEuY7cWoWPXsDmBg&usqp=CAU"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Cliente] #id"),
     *          )
     *      )
     * )
     */
    public function index()
    {
        $books = Books::with(['author','category'])->get();
        return response()->json(["data"=>$books],200);
    }

    /**
     * @OA\Post (
     *     path="/api/books/search",
     *      operationId="all_books_search",
     *     tags={"Books"},
     *     summary="Search books",
     *     description="Search books",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"search"},
     *              @OA\Property(property="title", type="string", example="La victoria"),
     *              @OA\Property(property="category_id", type="number", example="2"),
     *              @OA\Property(property="from", type="string", example=""),
     *              @OA\Property(property="to", type="string", example=""),
     *         ),
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent()
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Cliente] #id"),
     *          )
     *      )
     * )
     */
    public function search(Request $request)
    {

        $title = $request->title;
        $category_id = $request->category_id;
        $qfrom = $request->from;
        $qto = $request->to;

        $books = Books::with(['author','category']);

        if ($title != null) {
            $books = $books->where('title', 'like', '%'. $title .'%')->get();
        }

        if ($category_id != null) {
            $books = $books->where('category_id', $category_id);
        }

        if ($qfrom != null && $qto != null ) {
            $books = $books->whereBetween('created_at', [$qfrom, $qto]);
        }

        return response()->json(["data"=>$books],200);
    }


    /**
     * @OA\Get (
     *     path="/api/books/{id}",
     *     operationId="watch_books",
     *     tags={"Books"},
     *     security={{ "apiAuth": {} }},
     *     summary="See a books",
     *     description="See a books",
     *    @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="author", type="string", example="author"),
     *              @OA\Property(property="category", type="string", example="category"),
     *              @OA\Property(property="title", type="string", example="title"),
     *              @OA\Property(property="description", type="string", example="description"),
     *              @OA\Property(property="image", type="string", example="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFETSM4Qtu1n35k9yu_5CEuY7cWoWPXsDmBg&usqp=CAU"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Cliente] #id"),
     *          )
     *      )
     * )
     */
    public function watch($id){
        try{
            $book = Books::find($id);
            return response()->json(["data"=>$book],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/books",
     *      operationId="store_books",
     *      tags={"Books"},
     *     security={{ "apiAuth": {} }},
     *      summary="Store a books",
     *      description="Store a books",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"title"},
     *              @OA\Property(property="author_id", type="number", example="1"),
     *              @OA\Property(property="category_id", type="number", example="1"),
     *              @OA\Property(property="title", type="string", example="title"),
     *              @OA\Property(property="description", type="string", example="description"),
     *              @OA\Property(property="image", type="string", example="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFETSM4Qtu1n35k9yu_5CEuY7cWoWPXsDmBg&usqp=CAU"),
     *         ),
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */
    public function register(Request $request)
    {
        $books = new Books(request()->all());
        $books->save();
        return response()->json(["data"=>$books],200);
    }

    /**
     * @OA\Put(
     *      path="/api/books/{id}",
     *      operationId="update_books",
     *      tags={"Books"},
     *     security={{ "apiAuth": {} }},
     *      summary="Update a books",
     *      description="Update a books",
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"name"},
     *              @OA\Property(property="author_id", type="number", example="1"),
     *              @OA\Property(property="category_id", type="number", example="1"),
     *              @OA\Property(property="title", type="string", example="title"),
     *              @OA\Property(property="description", type="string", example="description"),
     *              @OA\Property(property="image", type="string", example="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFETSM4Qtu1n35k9yu_5CEuY7cWoWPXsDmBg&usqp=CAU"),
     *         ),
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */
    public function update(Request $request, $id){
        try{
            $book = Books::find($id);
            $book->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/books/{id}",
     *      operationId="delete_books",
     *      tags={"Books"},
     *     security={{ "apiAuth": {} }},
     *      summary="Delete a books",
     *      description="Delete a books",
     *    @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *       )
     *  )
     */
    public function delete($id){
        try{
            Books::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

}
