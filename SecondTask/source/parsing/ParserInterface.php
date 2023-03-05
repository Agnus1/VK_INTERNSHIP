<?php

namespace VK\Tasks\Task2\Parsing;

interface ParserInterface
{
    /**
     * метод устанавливает входные данные для прасинга
     * @return void
     */
    public function setData($data): void;

    /**
     * Метод производит парсинг и возвращает объект результата
     * @return mixed
     */
    public function parse(): ParseResult;
}