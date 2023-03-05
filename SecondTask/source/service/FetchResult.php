<?php

namespace VK\Tasks\Task2\Service;

/**
 * Класс-обёртка над результатом получения
 */
abstract class FetchResult
{
    abstract public function getData(): string;
}