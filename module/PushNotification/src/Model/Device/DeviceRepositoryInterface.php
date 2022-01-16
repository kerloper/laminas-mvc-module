<?php

namespace PushNotification\Model\Device;

interface DeviceRepositoryInterface
{
    /**
     * Return a set of all blog devices that we can iterate over.
     *
     * Each entry should be a Device instance.
     *
     * @return Device[]
     */
    public function findAllDevices();

    /**
     * Return a single blog device.
     *
     * @param int $id Identifier of the device to return.
     * @return Device
     */
    public function findDevice($id);
}