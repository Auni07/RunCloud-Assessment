<?php

namespace RunCloud\Interfaces;

interface PlanInterface
{
    public function getName(): string;
    public function getMaxServers(): int;
}