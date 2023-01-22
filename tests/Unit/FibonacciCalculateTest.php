<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Service\FibonacciCalculate;

class FibonacciCalculateTest extends TestCase
{
    /**
     * フィボナッチ数列の特定の番号の値が正しく算出できているかのテスト
     *
     * @test
     *
     * @return void
     */
    public function calculate()
    {
        // 算出したい番号とそれに対する正しい値
        $number = 99;
        $trueResult = "2.1892299583456E+20";

	// フィボナッチ数列の特定の番号の値を算出
        $fibonacciCalculate = new FibonacciCalculate();
        $result = $fibonacciCalculate->calculate($number);

	// 算出した値と正しいデータを比較
        $this->assertSame($result, $trueResult);
    }
}
