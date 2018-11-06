<?php

namespace Main\TestsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Main\TestsBundle\Entity\Result;
use Main\TestsBundle\Entity\Answer;
use Main\TestsBundle\Entity\Question;

class ResultController extends Controller
{

    public function resultAction(Request $request)
    {

        $answers = $request->request;

        $questions = $this->getDoctrine()
            ->getRepository('Main\TestsBundle\Entity\Question')
            ->findBy(["test_id" => $answers->get('id_test')]);

        $table = array();

        foreach ($questions as $key => $question) {
            if ($question->getType() == "several") {
                $tmp = array();
                foreach ($answers as $id => $answer) {
                    if (preg_match("/(s".$question->getId()."_)/",$id)) {
                        $tmp[] = $answer;
                    }
                }
                $table[$question->getId()] = [$question->getCorrect(), implode(";", $tmp), $question->getText()];
            }
            else {
                $table[$question->getId()] = [$question->getCorrect(), $answers->get($question->getId()), $question->getText()];
            }
        }



        $em = $this->getDoctrine()->getEntityManager();

        $result = new Result();
        $result->setIp($request->getClientIp()); 
    
        $result->setTestName($answers->get('id_test'));

        foreach ($table as $id => $item) {
            $answer = new Answer();
            $answer->setIdResult($result);
            $answer->setQuestionId($id);
            $answer->setAnswer($item[1]);
            $em->persist($answer); 
            $result->addAnswer($answer);
        }

        $em->persist($result);
        $em->flush();

        return $this->render('MainTestsBundle:Default:result.html.twig', ["table" => $table]);
    }
}
