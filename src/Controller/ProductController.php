<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    // #[Route('/', name: 'app_product')]
    // public function index(EntityManagerInterface $entityManager): Response
    // {
    //     $productRepository = $entityManager->getRepository(Product::class);
    //     $products = $productRepository->findAll();

    //     return $this->render('product/index.html.twig', [
    //         'products' => $products,
    //     ]);
    // }

    // public function detail(int $id, EntityManagerInterface $entityManager): Response
    // {
    //     $montreRepository = $entityManager->getRepository(Montre::class);
    //     $montre = $montreRepository->find($id);

    //     if (!$montre) {
    //         throw $this->createNotFoundException('La montre demandée n\'existe pas.');
    //     }

    //     return $this->render('montre/detail.html.twig', [
    //         'montre' => $montre,
    //     ]);
    // }
}
