<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SortService;

class SortController extends Controller
{
    private $sortService;

    public function __construct(SortService $sortService)
    {
        $this->sortService = $sortService;
    }

    /**
     * @OA\Get(
     *     path="/api/Sort",
     *     tags={"Sort"},
     *     @OA\Response(response="200", description="Display a listing of projects.")
     * )
     */
    public function index()
    {
        $Sort = $this->sortService->get();
        return $Sort;
    }

    /**
    * @OA\Post(
    *      path="/api/Sort",
    *      operationId="Sort",
    *      tags={"Sort"},
    *      summary="新增排序",
    *      description="新增排序",
    *      @OA\Parameter(
    *          name="sort",
    *          description="Sort",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="sort2",
    *          description="Sort2",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Response(
    *          response=201,
    *          description="資源成功建立"
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="請求格式錯誤"
    *       )
    * )
    * Create a Sort
    */
    public function setsort(Request $request)
    {
        $Sort = $this->sortService->set($request->input());
        return $Sort;
    }

    /**
    * @OA\Put(
    *      path="/api/Sort/{id}",
    *      operationId="Sort2",
    *      tags={"Sort"},
    *      summary="修改排序",
    *      description="新增修改排序排序",
    *      @OA\Parameter(parameter="id",in="path",name="id",required=true,description="input your id",
    *           @OA\Schema(type="integer")
    *      ),
    *      @OA\Parameter(
    *          name="sort",
    *          description="Sort",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="sort2",
    *          description="Sort2",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="資源成功"
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="請求格式錯誤"
    *       )
    * )
    * Update a Sort
    */
    public function updatesort($id , Request $request)
    {
        $Sort = $this->sortService->update($id, $request->input());
        return $Sort;
    }

    /**
    * @OA\Delete(
    *      path="/api/Sort/{id}",
    *      operationId="Sort3",
    *      tags={"Sort"},
    *      summary="刪除排序",
    *      description="刪除排序",
    *      @OA\Parameter(parameter="id",in="path",name="id",required=true,description="input your id",
    *           @OA\Schema(type="integer")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="資源成功"
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="請求格式錯誤"
    *       )
    * )
    * delete a Sort
    */

    public function deletesort($id)
    {
        $Sort = $this->sortService->delete($id);
        return $Sort;
    }
}
