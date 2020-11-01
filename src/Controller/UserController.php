<?php

namespace App\Controller;

use App\Entity\UserEvent;
use App\Services\Users\ManagerUserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/", name="list")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository(UserEvent::class)->searchAllEvents ();
        return $this->render('user/index.html.twig', [
            'events' => $event,
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
        $form = $managerUserService->create($request, new UserEvent());
        if ($form == 'create')
        {
            return $this->redirectToRoute('list');
        } else {
            return $this->render('user/create.html.twig', [
                'form'=>$form->createView()
            ]);
        }
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
       $form = $managerUserService->update($request, $userEvent);
       if ($form == 'update')
       {
           return $this->redirectToRoute('list');
       }
        return $this->render('user/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
