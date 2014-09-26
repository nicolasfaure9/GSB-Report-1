<?php

namespace GSB\Domain;

class Family 
{
    /**
     * Family id.
     *
     * @var integer
     */
    private $id;

    /**
     * Code.
     *
     * @var string
     */
    private $code;

    /**
     * Name.
     *
     * @var string
     */
    private $name;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}