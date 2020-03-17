<?php
    $arr = array(5 => 1, 12 => 2);
    foreach($arr as $key => $value) { echo ($key . '=>' . $value .",");  }
    $arr[] = 56;
    $arr["x"] = 42;
    unset($arr[5]);
    unset($arr);
    $a = array(1 => 'one', 2 => 'two', 3 => 'three');
    foreach($a as $key => $value) { echo ($key . '=>' . $value .",");  }
    unset($a[2]);
    $b = array_values($a);
?>