<?php

namespace main\Model;

class Employee
{
    /**
     * @var String
     */
    private $name;

    /**
     * @var String
     */
    private $method;

    /**
     * @var int
     */
    private $distance;

    /**
     * @var double|int
     */
    private $workdays;

    /**
     * @param double|int $workdays
     */
    public function __construct(String $name, String $method, int $distance, $workdays)
    {
        $this->name = $name;
        $this->method = $method;
        $this->distance = $distance;
        $this->workdays = $workdays;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getDistance(): int
    {
        return $this->distance;
    }

    /**
     * @return int|double
     */
    public function getWorkdays()
    {
        return $this->workdays;
    }


}