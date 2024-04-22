<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use App\Event\CommentCreatedEvent;
use App\Form\CommentType;
use App\Repository\PostRepository;
use App\Repository\TagRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/**
 * MainController
 */
class MainController extends AbstractController
{
    #[Route('', name: 'index')]    
    /**
     * index
     *
     * @return Response
     */
    public function index(PostRepository $repository): Response
    {
        
        $posts = $repository->findAll();       


        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'posts' => $posts
        ]);

        //return phpinfo();
    }

    #[Route('/{id}', name: 'show')]  
    public function show(Post $post): Response
    {
        return $this->render('main/show.html.twig', [
            'post' => $post
        ]);
    }
}
 