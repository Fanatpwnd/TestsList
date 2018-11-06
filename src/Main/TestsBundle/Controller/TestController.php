<?php

namespace Main\TestsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Main\TestsBundle\Entity\Question;


class TestController extends Controller
{
    public function testAction($id)
    {
        $questions = $this->getDoctrine()
        ->getRepository('Main\TestsBundle\Entity\Question')
        ->findBy(["test_id" => $id]);
        return $this->render('MainTestsBundle:Default:test.html.twig', 
            ["questions" => $questions, "id_test" => $id]);
    }
}
