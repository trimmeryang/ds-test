<?php

namespace Src;

use DateTime;
use Src\ITimeServiceInterface;

class MyGreeter
{
    const MORNING_GREETING = 'Good morning';
    const AFTERNOON_GREETING = 'Good afternoon';
    const EVENING_GREETING = 'Good evening';
    private ITimeServiceInterface $timeService;

    public function __construct(ITimeServiceInterface $timeService)
    {
        $this->timeService = $timeService;
    }


    // This method returns a greeting message based on the current time.
    // We can use Strategy Design Pattern when the logic becomes complex.Keep it simple now.
    public function greeting(): string
    {
        // Get the current hour
        $currentHour = $this->timeService->getCurrentTime()->format('H');

        // Determine the appropriate greeting based on the current hour
        if ($currentHour >= 6 && $currentHour < 12) {
            return self::MORNING_GREETING;
        }

        if ($currentHour >= 12 && $currentHour < 18) {
            return self::AFTERNOON_GREETING;
        }

        return self::EVENING_GREETING;
    }
}
