<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ServiceManagerController extends AbstractActionController {

    /**
     * @var \Application\ServiceManager\ExampleOne
     */
    private $exampleOne;

    public function __construct() {
        $this->exampleOne = new \Application\ServiceManager\ExampleOne();
    }

    public function indexAction() {
        return new ViewModel();
    }

    public function implementationAction() {
        return new ViewModel();
    }

    public function example1Action() {
        $response = new ViewModel();
        $response->setVariable('array', $this->exampleOne->example1());
        return $response;
    }

    public function example2Action() {
        $response = new ViewModel();
        $response->setVariable('array', $this->exampleOne->example2());
        return $response;
    }

    public function example3Action() {
        $response = new ViewModel();
        $response->setVariable('id', $this->exampleOne->example3());
        return $response;
    }

    public function example4Action() {}
}
