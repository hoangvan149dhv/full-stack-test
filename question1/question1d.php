<?php
function compress($input) {
    $compressed = '';
    $currentChar = $input[0];
    $charCount = 0;

    for ($i = 0; $i <= strlen($input); $i++) {
        if (isset($input[$i]) && $input[$i] === $currentChar) {
            $charCount++;
        } else {
            $compressed .= $currentChar . $charCount;
            $currentChar = @$input[$i];
            // Reset count
            $charCount = 1;
        }
    }

    return $compressed;
}

$input = 'kkkktttrrrrrrrrrrpoiuy';

echo compress($input);
