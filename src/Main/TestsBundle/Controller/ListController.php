<?php

namespace Main\TestsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Main\TestsBundle\Entity\Test;

class ListController extends Controller
{
    public function indexAction()
    {
        $tests = $this->getDoctrine()
            ->getRepository('Main\TestsBundle\Entity\Test')
            ->findAll();
        return $this->render('MainTestsBundle:Default:index.html.twig', ['tests' => $tests]);
    }
}
