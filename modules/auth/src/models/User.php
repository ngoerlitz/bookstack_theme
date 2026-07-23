<?php

namespace Vatger\Auth\Models;

use BookStack\Users\Models\User as BaseUser;

class User extends BaseUser
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->makeHidden([
            'read_welcome'
        ]);
    }
}
