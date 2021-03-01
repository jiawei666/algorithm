<?php

/**
 * 大顶堆算法
 * 大顶堆：所有非叶子节点都小于或等于其子节点（即：i > 2i && i > 2i + 1；i为节点数，从1开始。）
 * 建堆原则：从最后一个非叶子节点开始调整，将其子孙节点都构建成局部大顶堆，调整到根节点结束
 * 堆排序原则：从建好的堆中取出第一个值，将剩余的值重新建堆，直到数据取完
 *
 * Class maxHeap
 */

class maxHeap
{

    private $arr;

    public function __construct(array $arr)
    {
        $this->arr = $arr;
    }

    /**
     * 建堆
     * @return array
     */
    function build()
    {
        $posit = count($this->arr);
        $posit = intval($posit / 2) - 1; // 从最后一个非叶子节点开始建堆
        while ($posit >= 0) {
            $this->change($posit);
            $posit--;
        }

        return $this->arr;
    }

    /**
     * 建堆函数
     *
     * @param $posit
     */
    function change($posit)
    {
        $changePosits = [];
        if (isset($this->arr[2 * $posit + 1]) && ($this->arr[2 * $posit + 1] > $this->arr[$posit])) {
            $temp = $this->arr[$posit];
            $this->arr[$posit] = $this->arr[2 * $posit + 1];
            $this->arr[2 * $posit + 1] = $temp;
            $changePosits[] = 2 * $posit + 1;
        }

        if (isset($this->arr[2 * $posit + 2]) && ($this->arr[2 * $posit + 2] > $this->arr[$posit])) {
            $temp = $this->arr[$posit];
            $this->arr[$posit] = $this->arr[2 * $posit + 2];
            $this->arr[2 * $posit + 2] = $temp;
            $changePosits[] = 2 * $posit + 2;
        }

        foreach ($changePosits as $changePosit) {
            $this->change($changePosit);
        }
    }

    /**
     *
     * 堆排序
     * @return array
     */
    function sort()
    {
        $sortArr = [];
        while (count($this->arr) > 0) {
            $this->build();
            $sortArr[] = array_shift($this->arr);
        }
        return $sortArr;

    }
}

//$theArr = [10,8,19,2,1,6,20, 3];
$theArr = [50,20,61,99,12,43,86,23,68,53,53,76,3,8,19,6, 1];

$c = new maxHeap($theArr);
var_dump($c->sort());

