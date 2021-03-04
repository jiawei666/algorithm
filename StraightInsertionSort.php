<?php
/**
 * 直接插入排序
 * 排序顺序 5231 2531 2351 2315 2135 1235
 *
 */
class StraightInsertionSort
{
    public static function sort(array $arr)
    {
        if (empty($arr)) {
            return [];
        }
        $count = count($arr);
        for ($i=1; $i<$count; $i++) {
            for ($j=$i-1; $j>=0; $j--) {
                if ($arr[$j + 1] < $arr[$j]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }

        }
        return $arr;

    }
}

$testArr = [9,4,2,5,6,2,4,3,1,8,7,5];
$testArr = StraightInsertionSort::sort($testArr);
var_dump($testArr);
