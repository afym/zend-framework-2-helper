<?php

namespace Application\ServiceManager;

class Color {

    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }

}
