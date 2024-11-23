<?php

namespace App\Controller;

use App\Entity\Memo;
use App\Form\MemoFormType;
use App\Repository\MemoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MemoController extends AbstractController
{
    public function __construct(
        private readonly MemoRepository $memoRepository
    ){
    }

    public function index(): Response
    {
        $memos = $this->memoRepository->findAllMemos();

        return $this->render('memo/index.html.twig', [
            'memos' => $memos,
        ]);
    }

    public function create(Request $request): Response
    {
        $memo = new Memo();

        $form = $this->createForm(MemoFormType::class, $memo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->memoRepository->saveMemo($memo);
            return $this->redirectToRoute('memo_index');
        }

        return $this->render('memo/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function edit(Request $request, Memo $memo): Response
    {
        $form = $this->createForm(MemoFormType::class, $memo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->memoRepository->saveMemo($memo);
            return $this->redirectToRoute('memo_index');
        }

        return $this->render('memo/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function delete(Request $request, Memo $memo): Response
    {
        if ($this->isCsrfTokenValid('delete' . $memo->getId(), $request->request->get('_token'))) {
            $this->memoRepository->deleteMemo($memo);
            return $this->redirectToRoute('memo_index');
        }

        return $this->render('memo/delete.html.twig', [
            'memo' => $memo,
        ]);
    }
}