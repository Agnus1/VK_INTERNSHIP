<?php

/**
 * @author Igor Kim <igorkim200218@gmail.com>
 */

namespace VK\Tasks\Task1;

/**
 * @TimeType
 * enum-класс для хранения id шаблонов времени
 */
final class TimeType
{
    public const EXACT_HOURS = 1;
    public const HOURS_WITH_MINUTES_BEFORE = 2;
    public const HOURS_WITH_MINUTES_AFTER = 3;
    public const HOURS_WITH_QUATERS = 4;
    public const HOURS_WITH_HALF = 5;
}