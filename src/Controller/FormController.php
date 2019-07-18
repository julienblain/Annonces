<?php
// src/Controller/FormController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AnnonceType;
use App\Entity\Annonces;

class FormController extends AbstractController
{
    /**
     * @Route("/creer", name="create")
     */
    public function create(Request $request)
    {
        $annonce = new Annonces();
        $annonce->setTitle('');
        $annonce->setPrix('6000');
        $annonce->setDescription('');
        $annonce->setPhoto('www.jjjjf.fr');
        
        $form = $this->createForm(AnnonceType::class, $annonce);

        $form->handleRequest($request); //update data 

        // to create validate notification
        $notif = 0;

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
        
            $em->persist($annonce);
            $em->flush();
            $notif++;
        }

        return $this->render('annonces/create.html.twig', array(
            'form' => $form->createView(),
            'notif' => $notif,
        ));
    }
}