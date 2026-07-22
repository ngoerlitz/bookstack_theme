<?php

namespace Vatger\Auth\Types;

class UserResponse
{
    public string $cid;
    public string $name_first;
    public string $name_last;
    public string $email;

    public function __construct(array $body)
    {
        $user = $body['data'];

        $this->cid = $user["cid"];
        $this->name_first = $user["personal"]["name_first"];
        $this->name_last = $user["personal"]["name_last"];
        $this->email = $user["personal"]["email"];
    }
}
