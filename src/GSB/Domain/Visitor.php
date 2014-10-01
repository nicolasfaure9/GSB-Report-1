<?php

namespace GSB\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

class Visitor implements UserInterface
{
    /**
     * Visitor id.
     *
     * @var integer
     */
    private $id;

    /**
     * Visitor name.
     *
     * @var string
     */
    private $name;

    /**
     * Visitor password.
     *
     * @var string
     */
    private $password;

    /**
     * Salt that was originally used to encode the password.
     *
     * @var string
     */
    private $salt;

    /**
     * Role.
     * Values : ROLE_USER or ROLE_ADMIN.
     *
     * @var string
     */
    private $role;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @inheritDoc
     */
    public function getUsername() {
        return $this->name;
    }

    public function setUsername($name) {
        $this->name = $name;
    }

    /**
     * @inheritDoc
     */
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array($this->getRole());
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        // Nothing to do here
    }

    /**
     * @inheritDoc
     */
    public function equals(UserInterface $visitor) {
        $class = get_class($this);
        if (!$visitor instanceof $class) {
            return false;
        }
        if ($this->password !== $visitor->getPassword()) {
            return false;
        }
        if ($this->salt !== $visitor->getSalt()) {
            return false;
        }
        if ($this->name !== $visitor->getUsername()) {
            return false;
        }
        return true;
    }
}