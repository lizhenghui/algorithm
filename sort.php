<?php

$arr = array(5,8,2,0,3,1,7,4,6);
/**
 * 二分查找
 */
function binarySearch($arr,$key)
{
	$low = 0;
	$high = count($arr) - 1;
	while($low <= $high)
	{
		$mid = intval(($low+$high)/2);
		if($arr[$mid] == $key){
			return $mid;
		}else if($arr[$mid] > $key){
			$high = $mid - 1;
		}else{
			$low = $mid + 1;
		}
	}
	return false;
}

/**
 * 冒泡排序
 */
function bubbleSort($arr)
{
	$len = count($arr);
	for($i=1;$i<$len;$i++)
	{
		for($j=0;$j<$len-$i;$j++)
		{
			if($arr[$j] > $arr[$j+1])
			{
				$temp = $arr[$j+1];
				$arr[$j+1] = $arr[$j];
				$arr[$j] = $temp;
			}
		}

	}
	return $arr;
}

/**
 * 插入排序
 */
function insertSort(&$arr)
{
	$len = count($arr);
	for($out=1;$out<$len;$out++)
	{
		$temp = $arr[$out];
		$in = $out;
		while($in >0 && $temp < $arr[$in-1])
		{
			$arr[$in] = $arr[$in -1];
			$in--;
		}
		$arr[$in] = $temp;
	}
}

/**
 * 选择排序
 */
function selectSort(&$arr)
{
	$len = count($arr);
	for($i=0;$i<$len-1;$i++)
	{
		$min = $i;
		for($j=$i+1;$j<$len;$j++)
		{
			if($arr[$j] < $arr[$min])
			{
				$min = $j;
			}
		}
		if($min != $i)
		{
			$temp = $arr[$i];
			$arr[$i] = $arr[$min];
			$arr[$min] = $temp;
		}
	}
}

/**
 * 快速排序
 */

function quickSort($arr)
{
	$len = count($arr);
	if($len > 1)
	{
		$mid = $arr[0];
		$left_arr = $right_arr = array();
		for($i=1;$i<$len;$i++)
		{
			if($arr[$i] <= $mid)
			{
				$left_arr[] = $arr[$i];
			}
			else
			{
				$right_arr[] = $arr[$i];
			}
		}

		$left_arr = quickSort($left_arr);
		$right_arr = quickSort($right_arr);
		$arr = array_merge($left_arr,array($mid),$right_arr);
	}
	return $arr;
}


/**
 * 有序最左查找
 */
function find($arr, $key)
{
    $low = 0;
    $high = count($arr) - 1;
    while ($low + 1 != $high) {
        $mid = intval(($high + $low) / 2);
        if($arr[$mid] >= $key){
           $high = $mid;
        } else {
           $low = $mid;
        }
    }
    if($arr[$high] == $key)
    {
        return $arr[$low] == $arr[$high] ? $low : $high;
    }
    return -1;
}

function findLeft($arr, $key)
{
    $low = 0;
    $high = count($arr) - 1;
    while ($low + 1 != $high) {
        $mid = intval(($high + $low) / 2);
        if($arr[$mid] == $key){
            //向左遍历找到最左的元素
            while($arr[$mid-1] == $arr[$mid])
            {
                $mid--;
            }
            return $mid;
        } else if($arr[$mid] > $key){
           $high = $mid + 1;
        } else {
           $low = $mid - 1;
        }
    }
    return -1;
}
?>