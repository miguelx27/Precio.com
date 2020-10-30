<?php
declare(strict_types=1);

namespace App\Services\Users;


use App\Entity\UserEvent;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class ManagerUserService
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var FormInterface
     */
    private $form;

    public function __construct(EntityManagerInterface $entityManager, FormFactoryInterface $form)
    {

        $this->entityManager = $entityManager;
        $this->form = $form;
    }

    public function createOrUpdate(Request $request, UserEvent $userEvent)
    {
        $form = $this->form->create(UserType::class, $userEvent);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $userEvent = $form->getData();
            $this->entityManager->persist($userEvent);
            $this->entityManager->flush();
            return 'updated';
        }
        return $form;
    }
}