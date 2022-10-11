<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/post', name: 'list_post', methods: ['GET'] )]
    public function listAllPost(PostRepository $postRepository): Response
    {
            $postList = $postRepository->findAll(); 
            $postPublished = $postRepository->findPosPublished(); 
 
        return $this->render('post/index.html.twig', [
            'postList' => $postList,
            'postPublished' =>  $postPublished,
        ]);
    }

    // #[Route('/postpub', name: 'pub_post', methods: ['GET'] )]
    // public function publishedPost(PostRepository $postRepository): Response
    // {
    //         $postPublished = $postRepository->findPosPublished(); 
 
    //     return $this->render('post/index.html.twig', [
    //         'postPublished' =>  $postPublished,
    //     ]);
    // }
}
