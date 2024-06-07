<?php



/*
 * Complete the 'findNumber' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY arr
 *  2. INTEGER k
 */

$arr = array(array(1, 2, 3),
            array(4, 5, 6),
            array(9, 8, 9));

// echo count($arr);
// exit;
// var_dump($arr);
// exit;

function count_recursive($array) {
    $count = 0;
    foreach ($array as $element) {
        if (is_array($element)) {
            $count += count_recursive($element);
            // echo (count_recursive($element));
        } else {
            $count++;
        }
    }
    return $count;
}

// echo count_recursive($arr);

function diagonalDifference($arr) {
    // Write your code here
    $r = 0;
    $l = 0;
    $contador = 0;
    foreach($arr as $w){

        $contador++;
        // for($i, ){}
        switch ($contador){
        case 1:
            $r = $r + $w[0];
            $l = $l + $w[2];
            break; 
        case 2: 
            $r = $r + $w[1];
            $l = $l + $w[1];
            break; 
        case 3: 
            $r = $r + $w[2];
            $l = $l + $w[0];
            break; 
        }
        
    } 
    return abs($r - $l);  
}

// $fptr = fopen(getenv("OUTPUT_PATH"), "w");

// $arr_count = intval(trim(fgets(STDIN)));



// for ($i = 0; $i < $arr_count; $i++) {
//     $arr_item = intval(trim(fgets(STDIN)));
//     $arr[] = $arr_item;
// }

$result = diagonalDifference($arr);
echo $result;
// fwrite($fptr, $result . "\n");

// fclose($fptr);