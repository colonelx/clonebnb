<?php
/**
 * Created by PhpStorm.
 * User: viktor
 * Date: 1/13/17
 * Time: 9:17 PM
 */

namespace CBNBBaseBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;

class RolesService
{
    protected $container;
    protected $userRoles;
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        $userRoles = array_keys($this->container->getParameter('security.role_hierarchy.roles'));

        //removing super admin from the roles:
        $userRoles = array_diff($userRoles, array('ROLE_SUPER_ADMIN'));
        $this->userRoles = $userRoles;
    }

    public function getDefinedRoles()
    {
        $roles = [];
        foreach($this->userRoles as $role)
        {
            $value = $role;
            $name = ucfirst(strtolower(str_replace('_', ' ',substr($role,5))));
            $roles[$name] = $value;
        }
        return $roles;
    }
}