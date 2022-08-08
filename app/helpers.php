<?php

function convertToIDR($value)
{
    $result = "Rp " . number_format($value, 2, ',', '.');
    return $result;
}
