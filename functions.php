<?php
//https://www.php.net/manual/ru/book.datetime.php
//https://www.php.net/manual/ru/datetime.format.php

function monthCalendar($m)
{

    $thisYear = date("Y");
    $day = 1;
    $date = strtotime("$day/$m/$thisYear");
    $nameMonth = date("F", $date);
    $dayWeek = date("N", $date);
    $numberDaysMonth = date("t", $date);


    return $calendar = [$nameMonth, $dayWeek, $numberDaysMonth];



}


?>