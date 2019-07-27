<?php

namespace App\Controller;

use App\Entity\Buy;
use App\Repository\BuyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/compras")
 *
 * @IsGranted("ROLE_SUPER_ADMIN")
 */


class BuyController extends AbstractController
{
    /**
     * @Route("/", name="compra_index", methods={"GET"})
     *
     */
    public function busquedas(){
        $em = $this->getDoctrine()->getManager();
        $compras = $em->getRepository(Buy::class)->findAll();

        return $this->render('buy/index.html.twig', array(
            'findAll'=> $compras,

        ));
    }
}
