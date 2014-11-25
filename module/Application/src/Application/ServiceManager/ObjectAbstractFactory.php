<?php

namespace Application\ServiceManager;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ObjectAbstractFactory implements AbstractFactoryInterface {

    private $log = array();
    private $colors = array('green', 'red', 'blue');

    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName) {
        $this->log['can-create-service-with-name--name'] = $name;
        $this->log['can-create-service-with-name--requested-name'] = $requestedName;
        $this->log['can-create-service-with-name--isset-object-service'] = gettype($serviceLocator->get('object-service'));

        return in_array($requestedName, $this->colors);
    }

    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName) {
        $this->log['createService-with-name--name'] = $name;
        $this->log['createService-with-name--requested-name'] = $requestedName;
        $this->log['createService-with-name--isset-object-service'] = gettype($serviceLocator->get('object-service'));

        return new Color($requestedName);
    }

    public function getLog() {
        return $this->log;
    }

}
