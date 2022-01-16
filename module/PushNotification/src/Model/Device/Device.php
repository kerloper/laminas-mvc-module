<?php

namespace PushNotification\Model\Device;

class Device
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $os;

    /**
     * @var string
     */
    private $version;

    /**
     * @var string
     */
    private $token;



    /**
     * @param string $token
     * @param string $version
     * @param string $os
     * @param int $userId
     * @param int|null $id
     */
    public function __construct($id=null, $userId,$os, $version ,$token)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->os = $os;
        $this->version = $version;
        $this->token = $token;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getOs(): string
    {
        return $this->os;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

}