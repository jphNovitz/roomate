<?php

namespace App\Controller\Resident;

use App\Entity\Resident;
use App\Form\ResidentInterestType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InterestController extends AbstractController
{
    #[Route('interest/{id}', name: 'resident_interest', methods: ['GET', 'POST'])]
    public function edit(Request $request, Resident $resident, EntityManagerInterface $entityManager): Response
    {
//        dd($resident);
        $form = $this->createForm(ResidentInterestType::class, $resident);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($form->getData()->getBasePrefs() as $pref){
                $resident->addBasePref($pref);
            }
            $entityManager->persist($resident);
            $entityManager->flush();
dd($resident);
            return $this->redirectToRoute('app_resident', ['id' => $resident->getId()], Response::HTTP_SEE_OTHER);
//            return $this->redirectToRoute('app_resident_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('resident/interest/_form.html.twig', [
            'form' => $form
        ]);
    }
}