<?php

namespace VK\Tasks\Task1;

interface TimeToWordConvertingInterface
{
    public function convert(int $hours, int $minutes): string;
}