<?php

namespace VK\Tasks\Task1;

require_once 'TimeType.php';
require_once 'TimeToWordConvertingInterface.php';

final class TimeToWordConverter implements TimeToWordConvertingInterface
{
    private const HOURS_LIST = [
        'Один час',
        'Два часа',
        'Три часа',
        'Четыре часа',
        'Пять часов',
        'Шесть часов',
        'Семь часов',
        'Восемь часов',
        'Девять часов',
        'Десять часов',
        'Одиннадцать часов',
        'Двенадцать часов'
    ];

    private const HOURS_WITH_MINUTES_LIST = [
        'часа',
        'двух',
        'трёх',
        'четырёх',
        'пяти',
        'шести',
        'семи',
        'восьми',
        'девяти',
        'десяти',
        'одиннадцати',
        'двенадцати'
    ];

    private const HOURS_WITH_HALF_QUATERS_LIST = [
        'певрого',
        'второго',
        'третьего',
        'четвертого',
        'пятого',
        'шестого',
        'седьмого',
        'восьмого',
        'девятого',
        'десятого',
        'одиннадцатого',
        'двенадцатого'
    ];

    private const MINUTES_LIST = [
        'Одна минута',
        'Две минуты',
        'Три минуты',
        'Четыре минуты',
        'Пять минут',
        'Шесть минут',
        'Семь минут',
        'Восемь минут',
        'Девять минут',
        'Десять минут',
        'Одиннадцать минут',
        'Двенадцать минут',
        'Тринадцать минут',
        'Четырнадцать минут',
        'Пятнадцать минут',
        'Шестнадцать минут',
        'Семнадцать минут',
        'Восемнадцать минут',
        'Девятнадцать минут',
        'Двадцать минут',
        'Двадцать одна минута',
        'Двадцать две минуты',
        'Двадцать три минуты',
        'Двадцать четыре минуты',
        'Двадцать пять минут',
        'Двадцать шесть минут',
        'Двадцать семь минут',
        'Двадцать восемь минут',
        'Двадцать девять минут',
    ];

    /**
     * @param int $minutes
     * @return string
     */
    private function convertMinutes(int $minutes) : string
    {
        return self::MINUTES_LIST[$minutes > 30 ? 59 - $minutes : ($minutes - 1)];
    }

    /**
     *
     * @param int $hours
     * @param bool $withMin
     * @return string
     */
    private function convertHoursBeforeAfter(int $hours, bool $isAfter = true) : string
    {
        return self::HOURS_WITH_MINUTES_LIST[$isAfter ? $hours - 1 : $hours];
    }

    /**
     * @param int $hours
     * @return string
     */
    private function convertHours(int $hours): string
    {
        return self::HOURS_LIST[$hours - 1];
    }

    /**
     * @param int $hours
     * @return string
     */
    private function covnertHoursQuaters(int $hours): string
    {
        return self::HOURS_WITH_HALF_QUATERS_LIST[$hours];
    }

    private function getConvertTemplateType($minutes): int
    {
        if ($minutes === 0) return TimeType::EXACT_HOURS;
        if ($minutes === 15) return TimeType::HOURS_WITH_QUATERS;
        if ($minutes === 30) return TimeType::HOURS_WITH_HALF;
        if ($minutes < 30) return TimeType::HOURS_WITH_MINUTES_AFTER;

        return TimeType::HOURS_WITH_MINUTES_BEFORE;
    }

    private function getTimeNumberFormat(int $hours, int $minutes)
    {
        if ($minutes < 10) {
            return sprintf("%s:0%s", $hours, $minutes);
        }

        return sprintf("%s:%s", $hours, $minutes);
    }

    /**
     * function for data convertation
     * returns converted string in human-readable format
     *
     * @param int $hours
     * @param int $minutes
     * @return string
     */
    public function convert(int $hours, int $minutes = 0): string
    {
        $templateType = $this->getConvertTemplateType($minutes);
        $result = $this->getTimeNumberFormat($hours, $minutes);

        switch ($templateType) {
            case TimeType::EXACT_HOURS:
                $result .= sprintf(" - %s", $this->convertHours($hours));
                break;

            case TimeType::HOURS_WITH_MINUTES_AFTER:
                $result .= sprintf(" - %s после %s", $this->convertMinutes($minutes), $this->convertHoursBeforeAfter($hours));
                break;

            case TimeType::HOURS_WITH_MINUTES_BEFORE:
                $result .= sprintf(" - %s до %s", $this->convertMinutes($minutes), $this->convertHoursBeforeAfter($hours, false));
                break;

            case TimeType::HOURS_WITH_QUATERS:
                $result .= sprintf(" - Четверть %s", $this->covnertHoursQuaters($hours));
                break;

            case TimeType::HOURS_WITH_HALF:
                $result .= sprintf(" - Половина %s", $this->covnertHoursQuaters($hours));
                break;
        }

        return $result;
    }
}

$timeConverter = new TimeToWordConverter();
foreach (range(1, 11) as $hours) {
    foreach (range(0, 59) as $minutes) {
        echo $timeConverter->convert($hours, $minutes) .PHP_EOL;
    }
}
