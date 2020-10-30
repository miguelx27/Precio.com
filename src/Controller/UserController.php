<?php

namespace App\Controller;

use App\Entity\UserEvent;
use App\Form\UserType;
use App\Services\Users\ManagerUserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/create", name="create")
     * @param Request $request
     * @param ManagerUserService $managerUserService
     * @return Response
     */
    public function create(Request $request, ManagerUserService $managerUserService): Response
    {
        $form = $managerUserService->createOrUpdate($request, new UserEvent());
        if (!$form instanceof FormFactoryInterface)
        {
            return $this->redirectToRoute('list');
        }
        return $this->render('user/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/update/{id}", name="update")
     * @param Request $request
     * @param UserEvent $userEvent
     * @param ManagerUserService $managerUserService
     * @return Response
     */
    public function update(Request $request, UserEvent $userEvent, ManagerUserService $managerUserService): Response
    {
       $form = $managerUserService->createOrUpdate($request, $userEvent);
       if (!$form instanceof FormFactoryInterface)
       {
           return $this->redirectToRoute('list');
       }
        return $this->render('user/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
