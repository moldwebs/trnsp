<?php

namespace App\Controller;

use App\Entity\Wayorder;
use App\Form\WayorderCreateType;
use App\Service\AppService;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("wayorders")
 * @IsGranted({"ROLE_ADMIN", "ROLE_OPERATOR"})
 */

class WayordersController extends AppController
{

    private $service;
    private $paginate_order = ['defaultSortFieldName' => 'q.date_start', 'defaultSortDirection' => 'desc'];

    public function __construct(AppService $service)
    {
        $this->service = $service;
        $this->service->setEntity(Wayorder::class);
    }

    /**
     * @Route("/", name="wayorders-index", methods={"GET"})
     * @Template
     */
    public function index()
    {
        $pagination = $this->service->loadItems([], $this->paginate_order, $this->limitpp);
        return ['pagination' => $pagination];
    }

    /**
     * @Route("/view/{id}", name="wayorders-view", methods={"GET"})
     * @Template
     */
    public function view($id = null)
    {
        $item = $this->service->loadItem($id);
        return ['item' => $item];
    }

    /**
     * @Route("/edit/{id}", name="wayorders-edit", methods={"GET", "POST"})
     * @Template
     */
    public function edit($id = null)
    {
        $form = $this->service->editItem($id, WayorderCreateType::class);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('wayorders-index');
        }

        return ['form' => $form->createView(), 'page_title' => ($id > 0 ? 'Editare Comanda' . " #{$id}" : 'Adauga Comanda')];
    }

    /**
     * @Route("/delete/{id}", name="wayorders-delete", methods={"POST"})
     */
    public function delete($id = null)
    {
        $this->service->deleteItem($id);

        return $this->redirectToRoute('wayorders-index');
    }

}