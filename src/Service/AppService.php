<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class AppService
{

    private $entity;
    private $em;
    private $paginator;
    protected $request;
    protected $formFactory;

    public function __construct(EntityManager $em, $paginator, RequestStack $requestStack, FormFactoryInterface $formFactory)
    {
        $this->em = $em;
        $this->paginator = $paginator;
        $this->request = $requestStack->getCurrentRequest();
        $this->formFactory = $formFactory;
    }

    public function loadItems($conditions, $order, $limit)
    {
        $pagination = $this->paginator->paginate(
            $this->em->getRepository($this->entity)->getPaginationQuery($conditions),
            $this->request->query->getInt('page', 1),
            $limit,
            $order
        );
        return $pagination;
    }

    public function loadItem($id)
    {
        return $this->em->getRepository($this->entity)->find($id);
    }

    public function editItem($id, $form_type)
    {
        if ($id > 0) $item = $this->loadItem($id); else
            $item = (new \ReflectionClass($this->entity))->newInstanceArgs();

        $form = $this->formFactory->create($form_type, $item);

        $form->handleRequest($this->request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($item);
            $this->em->flush($item);
        }

        return $form;
    }

    public function deleteItem($id)
    {
        $item = $this->loadItem($id);
        $this->em->remove($item);
        $this->em->flush();
    }

    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

}