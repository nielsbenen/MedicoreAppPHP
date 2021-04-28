<?php


namespace main\Service;

use main\Model\Employee;
use main\Model\TransportMethod;
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
     * @return \main\Model\Employee[]
     */
    public function getEmployees(): array
    {
        $employees = [];

        $employees[] = new Employee('Paul', TransportMethod::CAR, 60, 5);
        $employees[] = new Employee('Martin', TransportMethod::BUS, 8, 4);
        $employees[] = new Employee('Jeroen', TransportMethod::BIKE, 9, 5);
        $employees[] = new Employee('Tineke', TransportMethod::BIKE, 4, 3);
        $employees[] = new Employee('Arnout', TransportMethod::TRAIN, 23, 5);
        $employees[] = new Employee('Matthijs', TransportMethod::BIKE, 11, 4.5);
        $employees[] = new Employee('Rens', TransportMethod::CAR, 12, 5);

        return $employees;
    }

    /**
     * @throws \Exception
     */
    public function getTraveledDistanceByMonth(Employee $employee, int $month): int
    {
        $dateToCheck = $this->dateHandler->getFirstDayOfMonth($month);
        $workedDays = 0;

        while($dateToCheck->format('m') == $month) {
            if ($dateToCheck->format('N') <= ceil($employee->getWorkdays())) {
                $workedDays++;
            }

            $dateToCheck->modify('+1 day');
        }

        return $workedDays * 2 * $employee->getDistance();
    }

    /**
     * @return float|int
     */
    public function getCompensationByEmployee(Employee $employee, int $distance)
    {
        switch ($employee->getMethod()) {
            case TransportMethod::CAR:
                return $distance * self::CAR_COMPENSATION;
            case TransportMethod::BIKE:
                if (5 <= $employee->getDistance()
                    && $employee->getDistance() <= 10) {
                    return $distance * self::BIKE_COMPENSATION * 2;
                } else {
                    return $distance * self::BIKE_COMPENSATION;
                }
            default:
                return $distance * self::PUBLIC_TRANSPORT_COMPENSATION;
        }
    }
}