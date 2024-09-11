<?php

namespace Src;

use DateTime;

class RealTimeService implements ITimeServiceInterface
{
    public function getCurrentTime(): DateTime
    {
        date_default_timezone_set('Asia/Shanghai');
        return new DateTime();
    }
}
