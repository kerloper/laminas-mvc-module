<?php
namespace Notification\Model\Notification;

interface NotificationCommandInterface
{
    /**
     * Persist a new Notification in the system.
     *
     * @param Notification $Notification The Notification to insert; may or may not have an identifier.
     * @return Notification The inserted Notification, with identifier.
     */
    public function insertNotification(Notification $Notification);

    /**
     * Update an existing Notification in the system.
     *
     * @param Notification $Notification The Notification to update; must have an identifier.
     * @return Notification The updated Notification.
     */
    public function updateNotification(Notification $Notification);

    /**
     * Delete a Notification from the system.
     *
     * @param Notification $Notification The Notification to delete.
     * @return bool
     */
    public function deleteNotification(Notification $Notification);
}