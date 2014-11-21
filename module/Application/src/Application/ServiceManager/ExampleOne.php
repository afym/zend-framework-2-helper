<?php

namespace Application\ServiceManager;

class ExampleOne {

    public function example1() {
        $sm = new \Zend\ServiceManager\ServiceManager();
        $sm->setService('array', new \ArrayObject());

        return $sm->get('array');
    }

    public function example2() {
        $sm = new \Zend\ServiceManager\ServiceManager();
        $response = array('before' => 0, 'after' => 0);

        // Setting a new object
        $object = new Object();
        $sm->setService('object', $object);
        // Getting object from the service manager
        $objectService1 = $sm->get('object');
        // Getting id from object
        $response['before'] = $objectService1->getId();
        // Setting a new 500 id to object
        $objectService1->setId(500);
        // Getting object from the service manager
        $objectService2 = $sm->get('object');
        // Getting id from object
        $response['after'] = $objectService2->getId();

        return $response;
    }

    public function example3() {
        $sm = new \Zend\ServiceManager\ServiceManager();
        $sm->setInvokableClass('invokable-object', 'Application\ServiceManager\Object');
        $id = $sm->get('invokable-object');
        return $id;
    }

    public function example4() {
        $sm = new \Zend\ServiceManager\ServiceManager();
        $sm->setFactory('object-factory-1', 'Application\ServiceManager\Object');
        $sm->setFactory('object-factory-2', function() {
            return new Object();
        });
        $sm->setFactory('object-factory-3', new ObjectFactory());

        return array(
            'object-1' => $sm->get('object-factory-1'),
            'object-2' => $sm->get('object-factory-2'),
            'object-3' => $sm->get('object-factory-3'),
        );
    }

}
