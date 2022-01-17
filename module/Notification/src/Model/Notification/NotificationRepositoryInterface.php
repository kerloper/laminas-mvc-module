<?php

namespace Notification\Model\Notification;

interface NotificationRepositoryInterface
{
    /**
     * Return a set of all blog Notifications that we can iterate over.
     *
     * Each entry should be a Notification instance.
     *
     * @return Notification[]
     */
    public function findAllNotifications();

    /**
     * Return a single blog Notification.
     *
     * @param int $id Identifier of the Notification to return.
     * @return Notification
     */
    public function findNotification($id);
}