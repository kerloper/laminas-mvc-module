<?php
namespace Notification\Model\Device;

interface DeviceCommandInterface
{
    /**
     * Persist a new device in the system.
     *
     * @param Device $device The device to insert; may or may not have an identifier.
     * @return Device The inserted device, with identifier.
     */
    public function insertDevice(Device $device);

    /**
     * Update an existing device in the system.
     *
     * @param Device $device The device to update; must have an identifier.
     * @return Device The updated device.
     */
    public function updateDevice(Device $device);

    /**
     * Delete a device from the system.
     *
     * @param Device $device The device to delete.
     * @return bool
     */
    public function deleteDevice(Device $device);
}