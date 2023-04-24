<?php

namespace App\Controller;

use App\DTO\TricksDto;
use App\Entity\Tricks;
use App\Entity\User;
use App\Form\TricksFormType;
use App\Repository\TricksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/tricks")
 */
class TricksController extends AbstractController
{
    /**
     * @Route("/", name="app_tricks_index", methods={"GET"})
     */
    public function index(TricksRepository $tricksRepository): Response
    {
        return $this->render('tricks/index.html.twig', [
            'tricks' => $tricksRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_tricks_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TricksRepository $tricksRepository): Response
    {

        $form = $this->createForm(TricksFormType::class);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            /** @var TricksDto $data */
            $data = $form->getData();
            /** @var User $user */
            $user = $this->getUser();
            $trick = new Tricks(null,$user,$data->name,$data->description,$data->categorie);
            $trick->setPoster($data->poster);
            $tricksRepository->add($trick, true);

            return $this->redirectToRoute('app_tricks_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tricks/new.html.twig', [
            'form' => $form,

        ]);
    }

    /**
     * @Route("/{id}", name="app_tricks_show", methods={"GET"})
     */
    public function show(Tricks $trick): Response
    {
        return $this->render('tricks/show.html.twig', [
            'trick' => $trick,

        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_tricks_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Tricks $trick, TricksRepository $tricksRepository, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(TricksFormType::class);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('imageFile')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {

                }

                $trick->setImageFilename($newFilename);
            }
            $tricksRepository->add($trick, true);
            $this->addFlash('success', 'La figure a été mise a jour avec succès !');
            return $this->redirectToRoute('app_tricks_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tricks/edit.html.twig', [
            'trick' => $trick,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_tricks_delete", methods={"GET","POST"})
     */
    public function delete(Request $request, Tricks $trick, TricksRepository $tricksRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$trick->getId(), $request->request->get('_token'))) {
            $tricksRepository->remove($trick, true);
        }

        return $this->redirectToRoute('app_tricks_index', [], Response::HTTP_SEE_OTHER);
    }
}