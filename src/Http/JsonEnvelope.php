<?php

namespace Hzmwdz\TinyCore\Http;

use JsonSerializable;

class JsonEnvelope implements JsonSerializable
{
    /**
     * @var bool
     */
    protected $success = true;

    /**
     * @var string|null
     */
    protected $message = null;

    /**
     * @var mixed
     */
    protected $data = null;

    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @var array
     */
    protected $meta = [];

    /**
     * @param bool success
     * @param string|null message
     * @param mixed data
     */
    public function __construct($success = true, $message = null, $data = null)
    {
        $this->success = $success;
        $this->message = $message;
        $this->data = $data;
    }

    /**
     * @param bool $success
     * @return $this
     */
    public function setSuccess($success)
    {
        $this->success = $success;
        return $this;
    }

    /**
     * @param string|null $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @param mixed $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param array $errors
     * @return $this
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;
        return $this;
    }

    /**
     * @param array $meta
     * @return $this
     */
    public function setMeta(array $meta)
    {
        $this->meta = $meta;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $content = [
            'success' => $this->success,
            'message' => $this->message,
            'data' => $this->data,
        ];

        if (!empty($this->errors)) {
            $content['errors'] = $this->errors;
        }

        if (!empty($this->meta)) {
            $content['meta'] = $this->meta;
        }

        return $content;
    }

    /**
     * @return array
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
