<?php

namespace VK\Tasks\Task2\Service;

/**
 * Интерфейс для получения фида
 */
interface FeedServiceContract
{
    public function fetchData() : FetchResult;
}