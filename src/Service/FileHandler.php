<?php

namespace App\Service;

use App\Entity\Employee;

class FileHandler
{
    public const FILE_NAME = "Travel-Compensation.csv";

    private $employeeHandler;
    private $dateHandler;

    public function __construct(EmployeeHandler $employeeHandler, DateHandler $dateHandler)
    {
        $this->employeeHandler = $employeeHandler;
        $this->dateHandler = $dateHandler;
    }


    /**
     * @param \App\Entity\Employee[] $employees
     * @throws \Exception
     */
    public function generateTravelCompensationAsCsv($employees): void
    {
        file_put_contents(self::FILE_NAME,
            "Employee name, Transport Method, Traveled Distance, Compensation, Payment Date\n");

        for ($month = 1; $month <= 12; $month++) {
            foreach($employees as $employee) {
                file_put_contents(self::FILE_NAME, $this->getCsvEntry($employee, $month),FILE_APPEND);
            }
        }
    }

    /**
     * @throws \Exception
     */
    private function getCsvEntry(Employee $employee, int $month): string
    {
        $distance = $this->employeeHandler->getTraveledDistanceByMonth($employee, $month);

        return sprintf("%s,%s,%s,%s,%s\n",
            $employee->getName(),
            $employee->getTransportMethod(),
            $distance,
            number_format($this->employeeHandler->getCompensationByEmployee($employee, $distance), 2),
            $this->dateHandler->getFirstMondayOfNextMonth($month)->format('d-m-Y')
        );
    }
}