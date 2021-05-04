<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use App\Entity\TransportMethod;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmployeeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $emp1 = (new Employee())
            ->setName('Paul')
            ->setTransportMethod(TransportMethod::CAR)
            ->setTravelDistance(60)
            ->setWorkdaysPerWeek(5);

        $emp2 = (new Employee())
            ->setName('Martin')
            ->setTransportMethod(TransportMethod::BUS)
            ->setTravelDistance(8)
            ->setWorkdaysPerWeek(4);

        $emp3 = (new Employee())
            ->setName('Jeroen')
            ->setTransportMethod(TransportMethod::BIKE)
            ->setTravelDistance(9)
            ->setWorkdaysPerWeek(5);

        $emp4 = (new Employee())
            ->setName('Tineke')
            ->setTransportMethod(TransportMethod::BIKE)
            ->setTravelDistance(4)
            ->setWorkdaysPerWeek(3);

        $emp5 = (new Employee())
            ->setName('Arnout')
            ->setTransportMethod(TransportMethod::TRAIN)
            ->setTravelDistance(23)
            ->setWorkdaysPerWeek(5);

        $emp6 = (new Employee())
            ->setName('Matthijs')
            ->setTransportMethod(TransportMethod::BIKE)
            ->setTravelDistance(11)
            ->setWorkdaysPerWeek(4.5);

        $emp7 = (new Employee())
            ->setName('Rens')
            ->setTransportMethod(TransportMethod::CAR)
            ->setTravelDistance(12)
            ->setWorkdaysPerWeek(5);

        $manager->persist($emp1);
        $manager->persist($emp2);
        $manager->persist($emp3);
        $manager->persist($emp4);
        $manager->persist($emp5);
        $manager->persist($emp6);
        $manager->persist($emp7);
        $manager->flush();
    }
}
