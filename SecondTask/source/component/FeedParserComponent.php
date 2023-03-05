<?php

namespace VK\Tasks\Task2\Component;

use VK\Tasks\Task2\Data\DataAccessObject;
use VK\Tasks\Task2\Loader\FileLoaderInterface;
use VK\Tasks\Task2\Log\LoggerInterface;
use VK\Tasks\Task2\Parsing\ParserInterface;
use VK\Tasks\Task2\Notification\NotifierInterface;
use VK\Tasks\Task2\Service\FeedFetchResult;
use VK\Tasks\Task2\Parsing\FeedParseResult;

class FeedParserComponent
{
    /**
     * Тут подразумевается использование DI или service locator
     *
     * @param LoggerInterface $logger
     * @param ParserInterface $parser
     * @param DataAccessObject $dataAccessObject
     * @params NotifierInterface $notifier
     */
    public function __construct(
        LoggerInterface $logger,
        ParserInterface $parser,
        DataAccessObject $dataAccessObject,
        NotifierInterface $notifier,
        FileLoaderInterface $loader
    ) {
        $this->logger = $logger;
        $this->parser = $parser;
        $this->DAO = $dataAccessObject;
        $this->notifier = $notifier;
        $this->loader = $loader;
    }

    public function fetchFeed() : FeedFetchResult
    {
    }

    public function parseFeed() : FeedParseResult
    {

    }

    public function saveFeed()
    {
        //......
        $this->notifier->notifyAll();
    }

    /**
     * TODO: придумать что-то вроде очереди для скачивания изображений, скачивание будет происходить в другом потоке
     */
    public function loadImages()
    {

    }

}