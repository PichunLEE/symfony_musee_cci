<?php

namespace App\Controller\Theme;

use App\Entity\Theme;
use App\Form\Theme1Type;
use App\Repository\ThemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/theme')]
class ThemeUpdateController extends AbstractController
{
    #[Route('/{id}/edit', name: 'app_theme_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Theme $theme, ThemeRepository $themeRepository): Response
    {
        $form = $this->createForm(Theme1Type::class, $theme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $themeRepository->add($theme, true);

            return $this->redirectToRoute('app_theme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/theme/edit.html.twig', [
            'theme' => $theme,
            'form' => $form,
        ]);
    }

    
}
