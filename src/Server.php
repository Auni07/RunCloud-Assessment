<?php

namespace RunCloud;

class Server
{
    public string $name;
    public string $ipAddress;

    public function __toString(): string
    {
        return "{$this->name} [{$this->ipAddress}]";
    }
}