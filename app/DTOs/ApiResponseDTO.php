<?php

namespace App\DTOs;

class ApiResponseDTO
{
    public function __construct(public bool $success, public string $message, public mixed $data = null, public string $timestamp = '')
    {
        $this->timestamp = now()->toDateTimeLocalString();
    }

    public static function success(string $message, mixed $data= null):self
    {
        return new self(true, $message, $data);
    }

    public static function error(string $message): self
    {
        return new self(false, $message);
    }
}