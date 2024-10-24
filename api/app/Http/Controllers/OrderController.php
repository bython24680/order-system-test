<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @OA\Post(
     *  path="/api/orders",
     *  tags={"訂單"},
     *  summary="新增訂單",
     *  description="新增一筆訂單",
     *  @OA\RequestBody(
     *    required=true,
     *    @OA\JsonContent(
     *      type="object",
     *      required={"id","name","address","price","currency"},
     *      @OA\Property(property="id",type="string",description="訂單ID，固定格式「單一大寫英文」+ 7 碼數字，共八位數"),
     *      @OA\Property(property="name",type="string",description="客戶姓名，只接收全英文"),
     *      @OA\Property(
     *          property="address",
     *          type="array",
     *          description="客戶地址",
     *          @OA\Items(
     *              @OA\Property(property="city",type="string",description="城市名稱"),
     *              @OA\Property(property="district",type="string",description="鄉鎮名稱"),
     *              @OA\Property(property="street",type="string",description="街道名稱"),
     *        )
     *      ),
     *      @OA\Property(property="price",type="string",description="訂單金額，不可大於 2000"),
     *      @OA\Property(property="currency",type="string",description="幣別，為三碼大寫的英文，例如 TWD"),
     *      example={
     *        "id":"A0000001",
     *        "name":"Melody Holiday Inn",
     *        "address": {
     *          "city":"taipei-city",
     *          "district":"da-an-district",
     *          "street":"fuxing-south-road",   
     *        },
     *        "price":"2050",
     *        "currency":"TWD"
     *      }
     *    )
     *  ),
     *  @OA\Response(
     *    response=200,
     *    description="新增訂單成功",
     *    @OA\JsonContent(
     *      example={
     *        "status":"success",
     *        "message":"Create an order successfully.",
     *        "data":{}
     *      }
     *    )
     *  ),
     *  @OA\Response(
     *    response=400,
     *    description="新增訂單失敗，輸入資料有誤",
     *    @OA\JsonContent(
     *      example={
     *        "status":"error",
     *        "message":"Create an order failed. Price is over 2000",
     *        "data":{}
     *      }
     *    )
     *  ),
     * )
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createAction(Request $request): JsonResponse
    {
        // TODO

        return response()->json([]);
    }
}
