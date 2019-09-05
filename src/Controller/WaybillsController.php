<?php

namespace App\Controller;

use App\Entity\Waybill;
use App\Form\WaybillCompleteType;
use App\Form\WaybillCreateType;
use App\Service\AppService;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("waybills")
 * @IsGranted({"ROLE_ADMIN", "ROLE_OPERATOR"})
 */

class WaybillsController extends AppController
{

    private $service;
    private $paginate_order = ['defaultSortFieldName' => 'q.date_start', 'defaultSortDirection' => 'desc'];

    public function __construct(AppService $service)
    {
        $this->service = $service;
        $this->service->setEntity(Waybill::class);
    }

    /**
     * @Route("/", name="waybills-index", methods={"GET"})
     * @Template
     */
    public function index()
    {
        $pagination = $this->service->loadItems([], $this->paginate_order, $this->limitpp);
        return ['pagination' => $pagination];
    }

    /**
     * @Route("/incomplete", name="waybills-incomplete", methods={"GET"})
     * @Template("waybills/index.html.twig")
     */
    public function incomplete()
    {
        $pagination = $this->service->loadItems(['q.tp' => 1], $this->paginate_order, $this->limitpp);
        return ['pagination' => $pagination, 'sub_page_title' => 'Incomplete'];
    }

    /**
     * @Route("/anulate", name="waybills-anulate", methods={"GET"})
     * @Template("waybills/index.html.twig")
     */
    public function anulate()
    {
        $pagination = $this->service->loadItems(['q.annulled' => 1], $this->paginate_order, $this->limitpp);
        return ['pagination' => $pagination, 'sub_page_title' => 'Anulate'];
    }

    /**
     * @Route("/view/{id}", name="waybills-view", methods={"GET"})
     * @Template
     */
    public function view($id = null)
    {
        sleep(5);
        $item = $this->service->loadItem($id);
        return ['item' => $item];
    }

    /**
     * @Route("/edit/{id}", name="waybills-edit", methods={"GET", "POST"})
     * @Template
     */
    public function edit($id = null)
    {
        $form = $this->service->editItem($id, WaybillCreateType::class);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('waybills-index');
        }

        return ['form' => $form->createView(), 'page_title' => ($id > 0 ? 'Editare Foaie de parcurs' . " #{$id}" : 'Adauga Foaie de parcurs')];
    }

    /**
     * @Route("/delete/{id}", name="waybills-delete", methods={"POST"})
     */
    public function delete($id = null)
    {
        $this->service->deleteItem($id);

        return $this->redirectToRoute('waybills-index');
    }

    /**
     * @Route("/edit_complete/{id}", name="waybills-edit-complete", methods={"GET", "POST"})
     * @Template
     */
    public function edit_complete($id)
    {
        $form = $this->service->editItem($id, WaybillCompleteType::class);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('waybills-incomplete');
        }

        return ['form' => $form->createView(), 'page_title' => 'Completare Foaie de parcurs' . " #{$id}"];
    }

}