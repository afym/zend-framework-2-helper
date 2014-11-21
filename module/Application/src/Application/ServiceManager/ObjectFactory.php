<?php

namespace Application\ServiceManager;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ObjectFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        return new Object();
    }

}
