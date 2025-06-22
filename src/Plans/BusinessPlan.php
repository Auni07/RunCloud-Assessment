<?php

namespace RunCloud\Plans;

use RunCloud\Interfaces\PlanInterface;

class BusinessPlan implements PlanInterface
{
    public function getName(): string
    {
        return 'Business Plan';
    }

    public function getMaxServers(): int
    {
        return 100;
    }
}