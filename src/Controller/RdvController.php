<?php

namespace App\Controller;

use App\Entity\Rdv;
use App\Entity\Voyageur;
use App\Form\RdvTypeoneType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RdvController extends AbstractController
{
    /**
     * @Route("/rdv", name="rdv")
     */
    public function index(): Response
    {
        return $this->render('rdv/index.html.twig', [
            'controller_name' => 'RdvController',
        ]);
    }
    /**
     * @Route("/RdvList", name="RdvList")
     */
    public function readRdv()
    {
        $repository = $this->getDoctrine()->getRepository(Rdv::class);
        $Rdv = $repository->findAll();


        return $this->render('rdv/list.html.twig',[
            'Rdvs' =>$Rdv,
        ]);
    }

    /**
     * @Route("/addrdv", name="addrdv")
     */
    public function addRdv(Request $request)
    {
        $rdv = new Rdv();
        $form = $this->createForm(RdvTypeoneType::class, $rdv);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $rep = $this->getDoctrine()->getManager();
            $rep->persist($rdv);
            $rep->flush();
            return  $this->redirectToRoute("RdvList");
        }
        return $this->render("rdv/read.html.twig", [
            'f' => $form->createView(),
        ]);
    }


}
