<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FibonacciControllerTest extends TestCase
{
    /**
     * リクエストの値をもとにフィボナッチ数列の値が正しく算出できているかのテスト
     *
     * @test
     *
     * @return void
     */
    public function calculate()
    {
        // 算出したい番号とそれに対する正しい値
        $number = '10.99';
        $trueResult = '3.5422484817926E+20';
        $response = $this->get('/api/fib?n='.$number);

	$result = ['result' => $trueResult];
        $response->assertStatus(200);
	var_dump($result);
        $response->assertExactJson($result, true);
    }
}
