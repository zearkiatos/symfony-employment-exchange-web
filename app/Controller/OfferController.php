<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use App\Entity\Offer;
use App\Entity\Applicant;

/**
* Class OfferController
* @package App\Controller
* @Route("/offer")
*/
class OfferController extends AbstractController
{
    /**
     * @Route("/", name="offers")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $offers = $entityManager->getRepository(Offer::class)->findAll();
        return $this->render('offer/index.html.twig', [
            'offers' => $offers,
        ]);
    }

    /**
     * @Route("/offer/{id}/apply", name="offer_apply")
     * @IsGranted("ROLE_APPLICANT")
     */
    public function apply(Offer $offer, EntityManagerInterface $entityManager, MailerInterface $mailer)
    {
        if ($applicant = $entityManager->getRepository(Applicant::class)->findOneBy([
            'user' => $user,
        ])) {
            $offer->addApplicant($applicant);
            $entityManager->persist($offer);
            try {
                $entityManager->flush();
                $this->addFlash('success', 'Request recived');
                $email = (new Email())
                    ->from('caprilespe@gmail.com')
                    ->to($offer->getOwner()->getEmail())
                    ->subject('It was recived a new application for '.$offer->getName().'!')
                    ->html('<p>'.$applicant->getName().' is intereste. His/her email is '.$applicant->getEmail().'</p>');
                    $mailer->send($email);

            } catch (\Exception $exception) {
                $this->addFlash('danger', 'The request couldn\'t be storage. Please, try again.');
            }
            $entityManager->flush();

            return $this->redirectToRoute('offers');
        } else {
            return $this->redirectToRoute('applicant_new', [
                'offerId' => $offer->getId(),
            ]);
        }
    }
}
