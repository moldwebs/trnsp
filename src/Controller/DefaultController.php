<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted({"ROLE_ADMIN", "ROLE_OPERATOR"})
 */

class DefaultController extends AppController
{
    /**
     * @Route("/", name="default")
     */
    public function default()
    {
        return $this->render('/default.html.twig');
    }
}