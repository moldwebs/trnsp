<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("export")
 * @IsGranted({"ROLE_ADMIN", "ROLE_OPERATOR"})
 */

class ExportController extends AppController
{

    /**
     * @Route("/tabelpontaj", name="export-tabelpontaj")
     */
    public function tabelpontaj()
    {
        return new Response("Try later");
    }

    /**
     * @Route("/raportbeb", name="export-raportbeb")
     */
    public function raportbeb()
    {
        return new Response("Try later");
    }

    /**
     * @Route("/autogari", name="export-autogari")
     */
    public function autogari()
    {
        return new Response("Try later");
    }

}