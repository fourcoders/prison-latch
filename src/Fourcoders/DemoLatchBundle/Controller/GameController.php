<?php

namespace Fourcoders\DemoLatchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Fourcoders\DemoLatchBundle\Form\Type\QuestionaryType;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class GameController extends Controller
{
    public function indexAction()
    {
        return $this->redirect($this->generateUrl('fos_user_security_login'));
    }

    public function cellAction()
    {
        return $this->render('FourcodersDemoLatchBundle:Game:cell.new.html.twig', array());
    }

    public function questionsAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('FourcodersDemoLatchBundle:Question');

        $totalNumQuestions = $repository->createQueryBuilder('q')->getQuery()->getResult();

        $query = $repository->createQueryBuilder('q')
            ->setFirstResult(rand(0, count($totalNumQuestions)-4))
            ->setMaxResults(4)
            ->getQuery();
        $questions = $query->getResult();

        $arrayQuestions = array();
        $cont = 0;
        $colors = ["green", "red", "blue" , "yellow"];
        foreach ($questions as $question) {
            $arrayQuestions[$colors[$cont]] = array(
                'field' => $question->getField(),
                'result' => $question->getResult()
            );
            $cont++;
        }

        return new JsonResponse($arrayQuestions);
    }

    public function question1Action(){
        return new Response('Verde');
    }

    public function question2Action(){
        return new Response('rojo');
    }

    public function question3Action(){
        return new Response('azul');
    }

    public function question4Action(){
        return new Response('amarillo');
    }

}
