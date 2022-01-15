<?php

namespace PushNotification\Model;

class PushNotification
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $key;

    /**
     * @param string $url
     * @param string $key
     * @param int|null $id
     */
    public function __construct($url, $key, $id = null)
    {
        $this->url = $url;
        $this->key = $key;
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }
}