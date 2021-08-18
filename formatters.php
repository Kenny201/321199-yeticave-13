<?php

use JetBrains\PhpStorm\ArrayShape;


#[ArrayShape(['hours' => 'string', 'minutes' => 'string',])]
function formatTime($completed_at): array
{

    $now_date = date_create('now');
    $next_date = date_create($completed_at);
    if ($now_date > $next_date) {
        $hours = '00';
        $minutes = '00';
    } else {
        $diff = date_diff($now_date, $next_date);
        $hours = $diff->format('%a') ? $diff->format('%H') : $diff->format('%a') * 24 + $diff->format('%H');
        $minutes = $diff->format('%I');
    }
    return ['hours' => str_pad($hours, 2, '0', STR_PAD_LEFT), 'minutes' => str_pad($minutes, 2, '0', STR_PAD_LEFT)];
}



function formatSumm(float $number)
{
    $round_numb = ceil($number);
    if ($round_numb < 1000) {
        return $round_numb . ' ₽';
    } else {
        return number_format($round_numb, 0, '', ' ') . ' ₽';
    }
}

