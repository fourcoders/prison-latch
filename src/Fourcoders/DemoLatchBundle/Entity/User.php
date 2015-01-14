<?php

namespace Fourcoders\DemoLatchBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $latch
     *
     * @ORM\Column(name="latch", type="string", length=255, nullable=true)
     */
    private $latch;    

    /**
     * Set latch
     *
     * @param string $latch
     */
    public function setLatch($latch)
    {
        $this->latch = $latch;
    }

    /**
     * Get latch
     *
     * @return string 
     */
    public function getlatch()
    {
        return $this->latch;
    }   


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}