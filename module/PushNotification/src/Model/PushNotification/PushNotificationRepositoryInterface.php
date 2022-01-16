<?php

namespace PushNotification\Model\PushNotification;

interface PushNotificationRepositoryInterface
{
    /**
     * Return a set of all blog pushNotifications that we can iterate over.
     *
     * Each entry should be a PushNotification instance.
     *
     * @return PushNotification[]
     */
    public function findAllPushNotifications();

    /**
     * Return a single blog pushNotification.
     *
     * @param int $id Identifier of the pushNotification to return.
     * @return PushNotification
     */
    public function findPushNotification($id);
}