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
        $sm->setInvokableClass('invokable-object', 'Application\ServiceManager\Object');
        $response = array('before' => 0, 'after' => 0);

        // Getting invokable object
        $object1 = $sm->get('invokable-object');
        $response['before'] = $object1->getId();
        $object1->setId(200);
        // Getting invokable object
        $object2 = $sm->get('invokable-object');
        $response['after'] = $object2->getId();

        return $response;
    }

    public function example5() {
        $sm = new \Zend\ServiceManager\ServiceManager();
        $sm->setFactory('object-factory-1', 'Application\ServiceManager\ObjectFactory');
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

    public function example6() {
        $sm = new \Zend\ServiceManager\ServiceManager();
        $sm->setFactory('object-factory', function() {
            return new Object();
        });

        $response = array('before' => 0, 'after' => 0);
        // Getting factory object
        $object1 = $sm->get('object-factory');
        $response['before'] = $object1->getId();
        $object1->setId(450);
        // Getting factory object
        $object2 = $sm->get('object-factory');
        $response['after'] = $object2->getId();

        return $response;
    }

    public function example7() {
        $sm = new \Zend\ServiceManager\ServiceManager();
        $sm->setInvokableClass('object-shared', 'Application\ServiceManager\Object');
        $sm->setInvokableClass('object-not-shared', 'Application\ServiceManager\Object');
        // Not share service (different instances)
        $sm->setShared('object-not-shared', false);

        // Shared objects
        $object1 = $sm->get('object-shared');
        $object1->setId(452);
        $object2 = $sm->get('object-shared');
        // Not shared objects
        $object3 = $sm->get('object-not-shared');
        $object3->setId(200);
        $object4 = $sm->get('object-not-shared');

        $response = array(
            'object-1-id' => "id : {$object1->getId()}, hash : " . spl_object_hash($object1),
            'object-2-id' => "id : {$object2->getId()}, hash : " . spl_object_hash($object2),
            'object-3-id' => "id : {$object3->getId()}, hash : " . spl_object_hash($object3),
            'object-4-id' => "id : {$object4->getId()}, hash : " . spl_object_hash($object4),
        );

        return $response;
    }

    public function example8() {
        $sm = new \Zend\ServiceManager\ServiceManager();
        $abastractFactory = new ObjectAbstractFactory();
        $sm->addAbstractFactory($abastractFactory);
        $sm->setService('object-service', new Object());

        return array(
            'green' => is_object($sm->get('green')),
            'red' => is_object($sm->get('red')),
            'blue' => is_object($sm->get('blue')),
            'log' => $abastractFactory->getLog()
        );
    }

}
