<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * @OA\Get (
     *     path="/api/authors",
     *      operationId="all_authors",
     *     tags={"Authors"},
     *     security={{ "apiAuth": {} }},
     *     summary="All authors",
     *     description="All authors",
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="name", type="string", example="Example"),
     *              @OA\Property(property="image", type="string", example="https://upload.wikimedia.org/wikipedia/commons/b/bf/Mario_Vargas_Llosa_%28crop_2%29.jpg"),
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
        $authors = Authors::all();
        return response()->json(["data"=>$authors],200);
    }

    /**
     * @OA\Get (
     *     path="/api/authors/{id}",
     *     operationId="watch_authors",
     *     tags={"Authors"},
     *     security={{ "apiAuth": {} }},
     *     summary="See a authors",
     *     description="See a authors",
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
     *              @OA\Property(property="name", type="string", example="Example"),
     *              @OA\Property(property="image", type="string", example="https://upload.wikimedia.org/wikipedia/commons/b/bf/Mario_Vargas_Llosa_%28crop_2%29.jpg"),
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
            $author = Authors::find($id);
            return response()->json(["data"=>$author],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/authors",
     *      operationId="store_authors",
     *      tags={"Authors"},
     *     security={{ "apiAuth": {} }},
     *      summary="Store a authors",
     *      description="Store a authors",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"name"},
     *            @OA\Property(property="name", type="string", format="string", example="Name"),
     *            @OA\Property(property="image", type="string", example="https://upload.wikimedia.org/wikipedia/commons/b/bf/Mario_Vargas_Llosa_%28crop_2%29.jpg"),
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
        $authors = new Authors(request()->all());
        $authors->save();
        return response()->json(["data"=>$authors],200);
    }

    /**
     * @OA\Put(
     *      path="/api/authors/{id}",
     *      operationId="update_authors",
     *      tags={"Authors"},
     *     security={{ "apiAuth": {} }},
     *      summary="Update a authors",
     *      description="Update a authors",
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
     *            @OA\Property(property="name", type="string", format="string", example="Name"),
     *            @OA\Property(property="image", type="string", example="https://upload.wikimedia.org/wikipedia/commons/b/bf/Mario_Vargas_Llosa_%28crop_2%29.jpg"),
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
            $author = Authors::find($id);
            $author->update($request->all());
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/authors/{id}",
     *      operationId="delete_authors",
     *      tags={"Authors"},
     *     security={{ "apiAuth": {} }},
     *      summary="Delete a authors",
     *      description="Delete a authors",
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
            Authors::destroy($id);
            return response()->json(["data"=>"ok"],200);
        }catch (Exception $e) {
            return response()->json(["data"=>"fail"],200);
        }
    }

}
