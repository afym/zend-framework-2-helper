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

    public function example4Action() {
        $response = new ViewModel();
        $response->setVariable('array', $this->exampleOne->example4());
        return $response;
    }

    public function example5Action() {
        $response = new ViewModel();
        $factories = $this->exampleOne->example5();

        $response->setVariable('object1', $factories['object-1']);
        $response->setVariable('object2', $factories['object-2']);
        $response->setVariable('object3', $factories['object-3']);

        return $response;
    }

    public function example6Action() {
        $response = new ViewModel();
        $response->setVariable('array', $this->exampleOne->example6());
        return $response;
    }

    public function example7Action() {
        $response = new ViewModel();
        $response->setVariable('array', $this->exampleOne->example7());
        return $response;
    }

    public function example8Action() {
        $response = new ViewModel();
        $response->setVariable('array', $this->exampleOne->example8());
        return $response;
    }

}
