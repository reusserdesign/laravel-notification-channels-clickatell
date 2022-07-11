<?php

namespace NotificationChannels\Clickatell;

class ClickatellMessage
{
    /** @var string */
    public $content;

    /**
     * @var string[]
     */
    public $phone;

    /**
     * @param  mixed  $phone
     * @param  string  $content
     *
     * @return static
     */
    public static function create($phone = [], $content = '')
    {
        if (is_string($phone)) {
            $phone = [$phone];
        }

        return new static($phone, $content);
    }

    /**
     * @param  string[]  $phone
     * @param  string  $content
     */
    public function __construct(array $phone = [], string $content = '')
    {
        $this->phone = $phone;
        $this->content = $content;

        return $this;
    }

    /**
     * @param  string  $content
     *
     * @return  $this
     */
    public function setMessage(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->content;
    }

    /**
     * @param  string  $phone
     *
     * @return  $this
     */
    public function setPhone(array $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return array
     */
    public function getPhone(): array
    {
        return $this->phone;
    }
}
