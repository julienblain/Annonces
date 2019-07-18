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

    /*
     * @Route("/new", name="new")
   
    public function newAnnonce() {
           $annonce = new Annonces();
           
           $form= $this->createFormBuilder($annonce)
           ->add('title')
           ->add('prix', IntegerType::class)
           ->add('description', TextareaType::class)
           ->add('photo', UrlType::class)
           ->getForm();


        return $this->render('annonces/new.html.twig', [
            'form' => $form->createView()
        ]); 
    } */

    /**
     * @Route("/annonce/{id}", name="showOne")
     */
    public function showOne($id) {
        $repo = $this->getDoctrine()->getRepository(Annonces::class);
        $annonce = $repo->findOneById($id);
        return $this->render('annonces/show.html.twig', 
        ['annonce' => $annonce]);
    }

    
}
