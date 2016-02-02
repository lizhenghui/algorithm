#　百度面试题目汇总

1. 给定一列有序数组，元素有多个重复值，如[1,1,2,3,3,8,8]，求查找元素的最左位置，如存在返回在数组中的下标，不存在返回-1。

>思路一
咋看这是一个二分查找的问题，但是又有所不同，因为二分查找的结果可能查找到重复元素的一个随机的位置，而不是最左位置。
最简单的想法就是用二分查找，找到元素后在向左遍历，直到找到不相同的元素位置。

代码示例：
```
<?php
// 二分查找最左元素 
function binSearchLeft($arr, $key)
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
算法复杂度：O(n/2)
```
>思路二
二分查找的思路就是每次将查找区间缩小一半，直到最后找到结果，那么将这个思路延伸一下解决本题问题：将区间无线聚合缩小，直到最后相邻的两个元素，那么在对这两个元素进行简单判断就可以了。

代码示例：
```
<?php
// 聚合查找区间查找最左元素
function findLeft($arr, $key)
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
算法复杂度：小于等于O(n/2)，算法上更优
?>
```