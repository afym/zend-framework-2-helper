<?php

namespace Application\ServiceManager;

class Object {

    private $id;

    public function __construct() {
        $this->id = 100;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

}
