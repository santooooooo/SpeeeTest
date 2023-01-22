<?php
namespace App\Service;

final class FibonacciCalculate
{
    /**
     * フィボナッチ数列から特定の番号にある値を取り出す際に使用する配列の作成
     *
     * @param int[] $fibonacciArray
     */
    public function __construct(public array $fibonacciArray = [1, 1])
    {
    }

    /**
     * フィボナッチ数列から指定された番号の値を算出
     *
     * @param  int $number
     * @return int|string $result
     */
    public function calculate(int $number): int | string
    {
        // 1,2番目の場合、1を返す
        if($number === 1 | $number === 2) {
            return 1;
        } else {
            for($i=2;$i<$number;$i++) {
                // 指定された番号から二つ前までの番号の値を合計した数値を配列の末尾に追加
                $lastValue = array_sum($this->fibonacciArray);
                array_push($this->fibonacciArray, $lastValue);
                // 算出に不要な要素を削除
                array_shift($this->fibonacciArray);
            }

            // 配列から最後の要素を取り出す
            $result = end($this->fibonacciArray);

            return $result;
        }
    }
}
?>
