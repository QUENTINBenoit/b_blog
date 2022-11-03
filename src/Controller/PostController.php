<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PostController extends AbstractController
{
    #[Route('/post', name: 'list_post', methods: ['GET'] )]
    public function listAllPost(
        PostRepository $postRepository,
        PaginatorInterface $paginatorInterface, 
        Request $request): Response
    {
            $postList = $postRepository->findAll(); 
            $datas= $postRepository->findPosPublished();
            $postPublished = $paginatorInterface->paginate(
                $datas,
                $request->query->getInt('page',  1),
                5         
            );           
            \dump($postPublished);
 
        return $this->render('post/index.html.twig', [
            'postList' => $postList,
            'postPublished' =>  $postPublished,
        ]);
    }

}
