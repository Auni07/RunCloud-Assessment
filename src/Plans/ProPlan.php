<?php

namespace RunCloud\Plans;

use RunCloud\Interfaces\PlanInterface;

class ProPlan implements PlanInterface
{
    public function getName(): string
    {
        return 'Pro Plan';
    }

    public function getMaxServers(): int
    {
        return 50;
    }
}