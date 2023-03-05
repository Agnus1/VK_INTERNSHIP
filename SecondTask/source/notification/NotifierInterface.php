<?php

namespace VK\Tasks\Task2\Notification;

interface NotifierInterface
{
    /**
     * Оповестить всех подписчиков
     *
     * @return void
     */
    public function notifyAll(): void;

    /**
     * Оповестить конкретного подписчика
     *
     * @param $id
     * @return bool
     */
    public function notify($id): bool;

    /**
     * Оповестить конкретного подписчика
     *
     * @param $groupId
     * @return bool
     */
    public function notifyGroup($groupId): bool;

    /**
     * Добавить подписчика для оповещений
     *
     * @param $contacts
     * @param $groupId
     * @return int id подписчика
     */
    public function subscribe($contacts, $groupId): int;
}