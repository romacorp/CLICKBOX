<?php

if (!function_exists('format_rating')) {
    function format_rating(int $rating): string
    {
        return str_repeat('★', $rating) . str_repeat('☆', 5 - $rating);
    }
}

if (!function_exists('format_date')) {
    function format_date(string $date): string
    {
        return date('d/m/Y H:i', strtotime($date));
    }
}