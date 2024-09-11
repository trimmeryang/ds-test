<?php

namespace Src;

use DateTime;

interface ITimeServiceInterface
{
    public function getCurrentTime(): DateTime;
}
