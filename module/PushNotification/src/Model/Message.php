<?php

namespace PushNotification\Model;

class Message
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $pic;

    /**
     * @param int|null $id
     * @param string $title
     * @param string $text
     * @param string $pic
     */
    public function __construct($id = null, string $title, string $text, string $pic)
    {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->pic = $pic;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getPic(): string
    {
        return $this->pic;
    }

}