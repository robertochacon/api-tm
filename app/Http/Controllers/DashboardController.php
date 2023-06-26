<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Authors;
use App\Models\Books;
use App\Models\User;

class DashboardController extends Controller
{
        /**
     * @OA\Get (
     *     path="/api/dashboard",
     *      operationId="all_dashboard",
     *     tags={"Dashboard"},
     *     security={{ "apiAuth": {} }},
     *     summary="Dashboard",
     *     description="Dashboard",
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
    public function index(){
        $data['categories'] = count(Categories::all());
        $data['authors'] = count(Authors::all());
        $data['books'] = count(Books::all());
        $data['Users'] = count(User::all());
        return response()->json(["data"=>$data],200);
    }
}
