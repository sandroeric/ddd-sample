<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Ddd\Infrastructure\Domain\Model\Recruiter\DoctrineRecruiterRepository;
use Ddd\Application\Service\Recruiter\SignUpRecruiterRequest;
use Ddd\Application\DataTransformer\Recruiter\RecruiterDataTransformer;
use Ddd\Infrastructure\Persistence\Doctrine\EntityManagerFactory;
use Ddd\Application\Service\Recruiter\SignUpRecruiterService;

class DddController extends AbstractController
{
    /**
     * @Route("/ddd", name="ddd")
     */
    public function index()
    {
        $em = EntityManagerFactory::build();
        $metadata = $em->getClassMetadata('Ddd\Domain\Model\Recruiter\Recruiter');
        $this->recruiterRepository = new DoctrineRecruiterRepository($em, $metadata);

        $this->signUpRecruiterService = new SignUpRecruiterService(
            $this->recruiterRepository,
            new RecruiterDataTransformer()
        );
        
        $request = new SignUpRecruiterRequest('Sandro Eric', 'sandroeric', 'sandroeric@gmail.com', 'mypassword');
        
        var_dump($this->signUpRecruiterService->execute($request));
        
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DddController.php',
        ]);
    }
}
