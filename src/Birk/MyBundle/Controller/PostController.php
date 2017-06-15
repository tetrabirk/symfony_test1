<?php

namespace Birk\MyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Birk\MyBundle\Entity\User;
use Birk\MyBundle\Entity\Post;


class PostController extends Controller
{
    /**
     * @Route("/post")
     * name="post"
     */
    public function postAllAction()
    {
        $doctrine = $this->getDoctrine();
        $repo = $doctrine->getRepository('BirkMyBundle:Post');
        $allPost = $repo->findAll();
        dump($allPost);

        $content = $this-> renderView('BirkMyBundle:Default:PostAll.html.twig',['post'=>$allPost]);

        return new Response($content);
    }


    /**
     * @Route("/post/{id}")
     * name="post_one"
     * requirement={"id":"\d+"}
     */
    public function postOneAction($id=0){
        if ($id !== 0){
            $doctrine = $this->getDoctrine();
            $repo = $doctrine->getRepository('BirkMyBundle:Post');
            $post = $repo->find($id);
            $content = $this->renderView('BirkMyBundle:Default:PostOne.html.twig',['post'=>$post]);
        dump($post);
            return new Response($content);
        }else{
            return new Response('404');
        }
    }

    /**
     * @Route("/postadd")
     * name="user_add"
     */
//    public function postAddAction(){
//        $faker = \Faker\Factory::create('fr_BE');
//
//        $user = new User();
//        $user->setName($faker->name);
//        $user->setPhoto($faker->imageUrl(300,300,'people'));
//        $user->setBio($faker->text(200));
//
//        $post = new Post();
//        $post->setTitle($faker->sentence(6));
//        $post->setPhoto($faker->imageUrl(300,300,'abstract'));
//        $post->setDate($faker->dateTimeThisYear);
//        $post->setDescription($faker->text(400));
//
//        $user->addPost($post);
//
//        $doctrine = $this->getDoctrine();
//
//        $em=$doctrine->getManager();
//        $em->persist($user);
//        $em->flush();
//
//        $this->addFlash('notice','new user');
//
//        return $this->redirectToRoute('birk_my_user_userall');
//
//    }

}
