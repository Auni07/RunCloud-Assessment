<?php

namespace RunCloud;

use RunCloud\Interfaces\PlanInterface;

class User
{
    public string $name;
    private ?PlanInterface $currentPlan = null;
    private array $connectedServers = [];

    private function simulateLoading(int $dots = 3, int $delay = 500000): void
    {
        for ($i = 0; $i < $dots; $i++) {
            echo " .";
            usleep($delay);
        }
        echo "\n";
    }

    public function subscribe(PlanInterface $plan): void
    {
        echo "Action: Subscribing to Plan " . $plan->getName();
        $this->simulateLoading();

        $this->currentPlan = $plan;
        echo "Subscribed to plan " . $plan->getName() . "\n\n";
    }

    public function unsubscribe(): void
    {
        if ($this->currentPlan) {
            echo "Action: Canceling Subscription to Plan " . $this->currentPlan->getName();
            $this->simulateLoading();

            $this->currentPlan = null;
            $this->connectedServers = []; // Clear connected servers on unsubscription
            echo "You have successfully unsubscribed from plan. Thank you for using RunCloud.\n\n";
        } else {
            echo "No active subscription to unsubscribe from.\n\n";
        }
    }

    public function connectServer(Server $server): void
    {
        echo "Action: Connecting Server " . $server->name;
        $this->simulateLoading();

        if (!$this->currentPlan) {
            echo "Error: User has no active subscription to connect servers.\n\n";
            return;
        }

        // Check if the server is already connected
        if (in_array($server, $this->connectedServers, true)) {
            echo "Action → Server {$server->name} is already connected!\n\n";
            $this->displayUserInfo();
            return;
        }

        if (count($this->connectedServers) >= $this->currentPlan->getMaxServers()) {
            echo "Error User Exceeded Server Limit allowed for Plan " . $this->currentPlan->getName() . " !\n\n";
            return;
        }


        $this->connectedServers[] = $server;
        echo "Action → Server {$server->name} is connected!\n\n";
        $this->displayUserInfo();
    }

    private function displayUserInfo(): void
    {
        $planName = $this->currentPlan ? $this->currentPlan->getName() : 'None';
        $serverList = empty($this->connectedServers) ? '' : implode(', ', $this->connectedServers);

        echo "-------------------------------------------------------------------------\n";
        echo sprintf("| %-18s| %-50s |\n", "User's Name", $this->name);
        echo sprintf("| %-18s| %-50s |\n", "Current Plan", $planName);
        echo sprintf("| %-18s| %-50s |\n", "Connected Servers", $serverList);
        echo "-------------------------------------------------------------------------\n\n";
    }
}