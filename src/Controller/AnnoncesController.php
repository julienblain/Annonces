<?php

namespace App\Controller;

use App\Entity\Annonces;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnoncesController extends AbstractController
{
    /**
     * @Route("/annonces", name="annonces")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Annonces::class);
        $annonces = $repo->findAll();
        return $this->render('annonces/index.html.twig', 
            ['annonces' => $annonces]
        );
    }

    /**
     * @Route("annonce/{id}", name="showOne")
     */
    public function showOne($id) {
        $repo = $this->getDoctrine()->getRepository(Annonces::class);
        $annonce = $repo->findOneById($id);
        return $this->render('annonces/show.html.twig', 
        ['annonce' => $annonce]);
    }
}
