<?php

namespace App\Controller;

use App\Entity\Montre;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;


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


    #[Route('/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername,
        ]);
    }
    #[Route('/register', name: 'register')]
    public function register(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('email', EmailType::class)
            ->add('plainPassword', PasswordType::class)
            ->add('agreeTerms', CheckboxType::class)
            ->add('submit', SubmitType::class, ['label' => 'Register'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Effectuez ici l'enregistrement de l'utilisateur
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
