<?php

namespace App\Helpers;

class Helper
{
    public static function generateStarList($stars)
    {
        $str = '';
        $count = 0;
        $decPart = $stars - floor($stars);
        $intPart = floor($stars);

        for ($i = 1; $i <= $intPart; ++$i, ++$count) {
            $str .= '<i class="bi bi-star-fill icon"></i>';
        }

        if ($decPart >= 0.25 && $decPart <= 0.5) {
            $str .= '<i class="bi bi-star-half icon"></i>';
            ++$count;
        } elseif ($decPart > 0.5) {
            $str .= '<i class="bi bi-star-fill icon"></i>';
            ++$count;
        }

        return $str;
    }

    public static function checkMinMaxPrice($minPrice, $maxPrice)
    {
        $minPrice = floatval($minPrice);
        $maxPrice = floatval($maxPrice);
        $formattedMin = number_format($minPrice, 0, ',', '.') . 'đ';
        $formattedMax = number_format($maxPrice, 0, ',', '.') . 'đ';

        if ($minPrice === $maxPrice) {
            return "Giá vé: " . $formattedMin;
        }

        return "Giá vé: Từ " . $formattedMin . " đến " . $formattedMax;
    }

    private static function formatPrice($price)
    {
        return number_format($price, 0, ',', '.');
    }

    public static function totalTime($date1, $date2, $time1, $time2)
    {
        // Chuyển dd-mm-yyyy => yyyy-mm-dd
        $date1 = implode('-', array_reverse(explode('-', $date1)));
        $date2 = implode('-', array_reverse(explode('-', $date2)));

        $dateTime1 = new \DateTime("$date1 $time1");
        $dateTime2 = new \DateTime("$date2 $time2");

        $interval = $dateTime1->diff($dateTime2);

        $hours = $interval->h + ($interval->days * 24);
        $minutes = $interval->i;

        if ($minutes == 0) {
            return "$hours giờ";
        }

        if ($minutes < 10) {
            $minutes = '0' . $minutes;
        }

        return "$hours giờ $minutes phút";
    }

    public static function totalPrice($price, $quantity)
    {
        $total = $price * $quantity;
        return number_format($total, 0, ',', '.'); // Định dạng số tiền
    }

}
