<?php


namespace App\Controller;


use App\Repository\EmployeeRepository;
use App\Service\FileHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\Routing\Annotation\Route;

class FileController extends AbstractController
{
    /**
     * @Route("/file/generate")
     * @throws \Exception
     */
    public function generateFile(EmployeeRepository $repository, FileHandler $handler): BinaryFileResponse
    {
        $employees = $repository->findAll();
        $handler->generateTravelCompensationAsCsv($employees);

        return $this->file($handler::FILE_NAME);
    }
}