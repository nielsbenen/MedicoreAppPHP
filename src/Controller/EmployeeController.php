<?php


namespace App\Controller;


use App\Entity\Employee;
use App\Form\EmployeeFormType;
use App\Repository\EmployeeRepository;
use App\Service\FileHandler;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    /**
     * @Route("/employee/add", name="add_employee")
     */
    public function addEmployee(EntityManagerInterface $em, Request $request)
    {
        $form = $this->createForm(EmployeeFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Employee $employee */
            $employee = $form->getData();

            $em->persist($employee);
            $em->flush();

            return $this->redirectToRoute("add_employee");

        }

        return $this->render('employee/add.html.twig', [
            'employeeForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/employee/", name="list_employee")
     */
    public function listEmployees(EmployeeRepository $repository)
    {
        $employees = $repository->findAll();

        return $this->render('employee/list.html.twig', [
            'employees' => $employees,
        ]);
    }

    /**
     * @Route("/employee/{id}/delete", name="remove_employee")
     */
    public function removeEmployee(Employee $employee, EmployeeRepository $repository)
    {
        $repository->deleteEmployee($employee);

        return $this->redirectToRoute("list_employee");
    }
}