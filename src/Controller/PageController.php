<?php

namespace App\Controller;

use App\Entity\Montre;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class PageController extends AbstractController
{
    #[Route('/', name: 'app_page')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Utilisation du MontreRepository pour récupérer toutes les montres
        $montreRepository = $entityManager->getRepository(Montre::class);

        // Appel de la méthode 'findAll' pour obtenir toutes les montres
        $montres = $montreRepository->findAll();

        return $this->render('page/index.html.twig', [
            'montres' => $montres,
        ]);
    }
    #[Route('/detail/{id}', name: 'detail')]
    public function montreDetail(int $id, EntityManagerInterface $entityManager): Response
    {
        $montreRepository = $entityManager->getRepository(Montre::class);
        $montre = $montreRepository->find($id);

        if (!$montre) {
            throw $this->createNotFoundException('La montre demandée n\'existe pas.');
        }

        return $this->render('part/detail.html.twig', [
            'montre' => $montre,
        ]);
    }
    #[Route('/catalogue', name: 'catalogue')]
    public function catalogue(EntityManagerInterface $entityManager): Response
    {
        // Utilisation du MontreRepository pour récupérer toutes les montres
        $montreRepository = $entityManager->getRepository(Montre::class);

        // Appel de la méthode 'findAll' pour obtenir toutes les montres
        $montres = $montreRepository->findAll();

        return $this->render('part/catalogue.html.twig', [
            'montres' => $montres,
        ]);
    }
}
