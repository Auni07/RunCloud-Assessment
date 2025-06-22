<?php

namespace RunCloud\Plans;

use RunCloud\Interfaces\PlanInterface;

class BasicPlan implements PlanInterface
{
    public function getName(): string
    {
        return 'Basic Plan';
    }

    public function getMaxServers(): int
    {
        return 1;
    }
}