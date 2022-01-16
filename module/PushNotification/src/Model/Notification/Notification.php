<?php

namespace PushNotification\Model;

class Notification
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $deviceId;

    /**
     * @var int
     */
    private $messageId;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $datetime;



    /**
     * @param int|null $id
     * @param int $deviceId
     * @param int $messageId
     * @param string $status
     * @param string $datetime
     */
    public function __construct($id=null, $deviceId,$messageId, $status ,$datetime)
    {
        $this->id = $id;
        $this->deviceId = $deviceId;
        $this->messageId = $messageId;
        $this->status = $status;
        $this->datetime = $datetime;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getDeviceId(): int
    {
        return $this->deviceId;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getDatetime(): string
    {
        return $this->datetime;
    }


}