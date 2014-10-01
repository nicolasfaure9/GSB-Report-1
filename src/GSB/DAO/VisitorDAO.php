<?php

namespace GSB\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use GSB\Domain\Visitor;

class VisitorDAO extends DAO implements UserProviderInterface
{
    /**
     * Returns a visitor matching the supplied id.
     *
     * @param integer $id
     *
     * @return \GSB\Domain\Visitor|throws an exception if no matching user is found
     */
    public function find($id) {
        $sql = "select * from visitor where visitor_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No visitor matching id " . $id);
    }

    /**
     * {@inheritDoc}
     */
    public function loadUserByUsername($username)
    {
        $sql = "select * from visitor where user_name=?";
        $row = $this->getDb()->fetchAssoc($sql, array($username));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new UsernameNotFoundException(sprintf('Visitor "%s" not found.', $username));
    }

    /**
     * {@inheritDoc}
     */
    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }
        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        return 'GSB\Domain\Visitor' === $class;
    }

    /**
     * Creates a Visitor object based on a DB row.
     *
     * @param array $row The DB row containing Visitor data.
     * @return \GSB\Domain\Visitor
     */
    protected function buildDomainObject($row) {
        $visitor = new Visitor();
        $visitor->setId($row['visitor_id']);
        $visitor->setUsername($row['user_name']);
        $visitor->setPassword($row['password']);
        $visitor->setSalt($row['salt']);
        $visitor->setRole($row['role']);
        return $visitor;
    }
}