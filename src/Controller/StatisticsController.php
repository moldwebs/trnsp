<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("statistics")
 * @IsGranted({"ROLE_ADMIN", "ROLE_OPERATOR"})
 */

class StatisticsController extends AppController
{

    /**
     * @Route("/plan", name="statistics-plan")
     */
    public function plan()
    {
        return new Response("Try later");
    }

    /**
     * @Route("/motorina", name="statistics-motorina")
     */
    public function motorina()
    {
        return new Response("Try later");
    }

    /**
     * @Route("/venit", name="statistics-venit")
     */
    public function venit()
    {
        return new Response("Try later");
    }

}