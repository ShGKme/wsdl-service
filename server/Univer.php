<?php

require "DateArg.php";

/**
 * Class Univer
 * @soap
 */
class Univer {
    /**
     * @soap
     * @WebMethod
     * @desc Функция отвечает на вопрос, надо ли в заданную дату идти в университет
     * @param wrapper $date @className=DateArg
     * @return String
     */
    function ShouldIGoToUniver($date) {
        // Проверяем дату на корректность  
        if (!checkdate($date->month, $date->day, $date->year))
            return "The date is incorrect!".$date->year."-".$date->month."-".$date->day;

        // Проверяем, не воскресение ли это
        $DateTime = new DateTime($date->year."-".$date->month."-".$date->day); // YYYY-MM-DD
        $DayOfWeek = date("N", $DateTime);
        if ($DayOfWeek == 6)
            return "No, you don't have to =). It's a Sunday!";

        // Проверяем на разные праздники
        // Новогодние праздники
        if ($date->day <= 8 && $date->month == 1)
        return "No, you don't have to =). It's a Winter Holidays!";
        // 23 февраля
        if ($date->day == 23 && $date->month == 2)
            return "No, you don't have to =). It's a Defender of the Fatherland Day!";
        // 8 марта
        if ($date->day == 8 && $date->month == 3)
            return "No, you don't have to =). It's an International Women's Day!";
        // День рождения
        if ($date->day == 22 && $date->month == 4)
            return "No, you don't have to =). It's my BirthDay!";
        // 1 мая
        if ($date->day == 1 && $date->month == 5)
            return "No, you don't have to =). It's a Spring and Labour Day!";
        // 9 мая
        if ($date->day == 9 && $date->month == 5)
            return "No, you don't have to =). It's a Victory Day!";
        // 12 июня
        if ($date->day == 12 && $date->month == 6)
            return "No, you don't have to =). It's a Russia Day!";
        // 4 ноября
        if ($date->day == 4 && $date->month == 11)
            return "No, you don't have to =). It's a Day of National Unity!";
            
        // Лето
        if ($date->month == 7 || $date->month == 8)
            return "No, you don't have to =). It's a Summer Holidays!";

        // =(
        return "Yes, you should =(";
    }
}
