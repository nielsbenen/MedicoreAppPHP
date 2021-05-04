<?php

namespace App\Service;

use DateTime;

class DateHandler
{
    /**
     * @return DateTime|false
     * @throws \Exception
     */
    public function getFirstMondayOfNextMonth(int $month)
    {
        $thisMonth = $this->getFirstDayOfMonth($month);

        return $thisMonth->modify('first monday of next month');
    }

    /**
     * @throws \Exception
     */
    public function getFirstDayOfMonth(int $month): DateTime
    {
        $now = new DateTime();
        $year = $now->format('Y');

        return new DateTime('01-'.$month.'-'.$year);
    }
}