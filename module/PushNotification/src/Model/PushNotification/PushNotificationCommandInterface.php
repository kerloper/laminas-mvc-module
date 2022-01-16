<?php
namespace PushNotification\Model\PushNotification;

interface PushNotificationCommandInterface
{
    /**
     * Persist a new pushNotification in the system.
     *
     * @param PushNotification $pushNotification The pushNotification to insert; may or may not have an identifier.
     * @return PushNotification The inserted pushNotification, with identifier.
     */
    public function insertPushNotification(PushNotification $pushNotification);

    /**
     * Update an existing pushNotification in the system.
     *
     * @param PushNotification $pushNotification The pushNotification to update; must have an identifier.
     * @return PushNotification The updated pushNotification.
     */
    public function updatePushNotification(PushNotification $pushNotification);

    /**
     * Delete a pushNotification from the system.
     *
     * @param PushNotification $pushNotification The pushNotification to delete.
     * @return bool
     */
    public function deletePushNotification(PushNotification $pushNotification);
}