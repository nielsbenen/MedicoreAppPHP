<?php


namespace App\Service;

use App\Entity\Employee;
use App\Entity\TransportMethod;
use function ceil;

class EmployeeHandler
{
    private const BIKE_COMPENSATION = 0.5;
    private const PUBLIC_TRANSPORT_COMPENSATION = 0.25;
    private const CAR_COMPENSATION = 0.1;

    private $dateHandler;

    public function __construct(DateHandler $dateHandler)
    {
        $this->dateHandler = $dateHandler;
    }

    /**
     * @throws \Exception
     */
    public function getTraveledDistanceByMonth(Employee $employee, int $month): int
    {
        $dateToCheck = $this->dateHandler->getFirstDayOfMonth($month);
        $workedDays = 0;

        while($dateToCheck->format('m') == $month) {
            if ($dateToCheck->format('N') <= ceil($employee->getWorkdaysPerWeek())) {
                $workedDays++;
            }

            $dateToCheck->modify('+1 day');
        }

        return $workedDays * 2 * $employee->getTravelDistance();
    }

    /**
     * @return float|int
     */
    public function getCompensationByEmployee(Employee $employee, int $distance)
    {
        switch ($employee->getTransportMethod()) {
            case TransportMethod::CAR:
                return $distance * self::CAR_COMPENSATION;
            case TransportMethod::BIKE:
                if (5 <= $employee->getTravelDistance()
                    && $employee->getTravelDistance() <= 10) {
                    return $distance * self::BIKE_COMPENSATION * 2;
                } else {
                    return $distance * self::BIKE_COMPENSATION;
                }
            default:
                return $distance * self::PUBLIC_TRANSPORT_COMPENSATION;
        }
    }
}