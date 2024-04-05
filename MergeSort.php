<?php
// Function to merge two sorted subarrays
function merge(&$arr, $left, $middle, $right) {
    $leftArrayLength = $middle - $left + 1;
    $rightArrayLength = $right - $middle;

    // Create temporary arrays
    $leftArray = array_slice($arr, $left, $leftArrayLength);
    $rightArray = array_slice($arr, $middle + 1, $rightArrayLength);

    // Merge the temporary arrays back into the main array
    $i = 0;
    $j = 0;
    $k = $left;
    while ($i < $leftArrayLength && $j < $rightArrayLength) {
        if ($leftArray[$i] <= $rightArray[$j]) {
            $arr[$k] = $leftArray[$i];
            $i++;
        } else {
            $arr[$k] = $rightArray[$j];
            $j++;
        }
        $k++;
    }

    // Copy any remaining elements of the left array
    while ($i < $leftArrayLength) {
        $arr[$k] = $leftArray[$i];
        $i++;
        $k++;
    }

    // Copy any remaining elements of the right array
    while ($j < $rightArrayLength) {
        $arr[$k] = $rightArray[$j];
        $j++;
        $k++;
    }
}

// Function to perform merge sort
function mergeSort(&$arr, $left, $right) {
    if ($left < $right) {
        // Find the middle point
        $middle = $left + (int)(($right - $left) / 2);

        // Sort the first and second halves
        mergeSort($arr, $left, $middle);
        mergeSort($arr, $middle + 1, $right);

        // Merge the sorted halves
        merge($arr, $left, $middle, $right);
    }
}

// Function to print an array
function printArray($arr) {
    foreach ($arr as $value) {
        echo $value . " ";
    }
    echo "\n";
}

// Driver code
$arr = [38, 27, 43, 10, 12, 11, 13, 5, 6, 7];
echo "Given array is: ";
printArray($arr);

mergeSort($arr, 0, count($arr) - 1);

echo "Sorted array is:";
printArray($arr);
?>
