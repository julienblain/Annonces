<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController {

    /**
     * @Route("/", name="homepage")
     */
    public function home() {
        $prenom = ["Mickael" => 25, "Rachel" => 18, "Gérald" => 27];
        return $this->render('home.html.twig', 
        [   'salut' => "salut comment ça va bien ? ",
            'age'   => 14,
            'tableau'=> $prenom
        ]);
    }

    /**
     * @Route("/bonjour/{prenom}", name="bonjour")
     * @Route("/bonjour", name="bonjour_simple")
     * @Route("/bonjour/{prenom}/{age}", name="bonjour_complet")
     */
    public function bonjour($prenom="", $age=0) {
        return new Response("bonjour " . $prenom . " qui a " . $age . " ans");
    }

}