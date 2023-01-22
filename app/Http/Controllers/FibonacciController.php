<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\FibonacciCalculate;
use Illuminate\Http\JsonResponse;

final class FibonacciController extends Controller
{
    function __construct()
    {
    }

    /**
     * リクエストの値からフィボナッチ数列の値を算出
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function calculate(Request $request): JsonResponse
    {
        $number = $request->n;

        // リクエストの値が正の整数であるかチェックする
        $isFloat = str_contains($number, '.');
        $isInt = settype($number, "int");
        $isPositiveNumber = $number > 0;

        if(!$isFloat && $isInt && $isPositiveNumber) {
            $fibonacciCalculate = new FibonacciCalculate();
            $result = $fibonacciCalculate->calculate($request->n);
            // 値の算出に成功した場合、HTTPステータスを200にした状態で結果を返す
            return response()->json(['result' => $result], 200);
        } else {
            // リクエストの値が正の整数以外の場合はHTTPステータスを400にした状態で結果を返す。
            return response()->json('Bad Request', 400);
        }
    }
}
