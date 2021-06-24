<?php

namespace App\Controller;

use App\Entity\Voyageur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoyageurController extends AbstractController
{
    /**
     * @Route("/voyageur", name="voyageur")
     */
    public function index(): Response
    {
        return $this->render('voyageur/index.html.twig', [
            'controller_name' => 'VoyageurController',
        ]);
    }
    /**
     * @Route("/VoyageursList", name="VoyageursList")
     */
    public function readVoyageurs()
    {
        $repository = $this->getDoctrine()->getRepository(Voyageur::class);
        $voyageurs = $repository->findAll();


        return $this->render('voyageur/read.html.twig',[
            'voyageurs' =>$voyageurs,
        ]);
    }

    /**
     * @Route("/deletevoyage/{id}", name="deletevoyage")
     */
    public function deleteVoyage($id)
    {
        $em = $this->getDoctrine()->getManager();
        $voyageur = $em->getRepository(Voyageur::class)->find($id);
        $em->remove($voyageur);
        $em->flush();
        return $this->redirectToRoute("VoyageursList");
    }


}
