<?php

namespace Vivait\CRMBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Customer
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vivait\CRMBundle\Entity\CustomerRepository")
 */
class Customer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min="3",max="255")
     * @ORM\Column(name="forename", type="string", length=255)
     */
    private $forename;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min="3",max="255")
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var \DateTime
     * @Assert\Date()
     * @Assert\NotBlank()
     * @ORM\Column(name="dob", type="date", nullable=true)
     */
    private $dob;


    /**
     * @var Address[]|ArrayCollection
     * @ORM\OneToMany(targetEntity="Address", mappedBy="customer")
     */
    private $addresses;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set forename
     *
     * @param string $forename
     * @return Customer
     */
    public function setForename($forename)
    {
        $this->forename = ucfirst($forename);

        return $this;
    }

    /**
     * Get forename
     *
     * @return string 
     */
    public function getForename()
    {
        return $this->forename;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return Customer
     */
    public function setSurname($surname)
    {
        $this->surname = ucfirst($surname);

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    public function getName() {
        return sprintf("%s %s",$this->forename,$this->surname);
    }

    /**
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param \DateTime $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->addresses = new ArrayCollection();
    }

    /**
     * Add addresses
     *
     * @param Customer $addresses
     * @return Customer
     */
    public function addAddress(Customer $addresses)
    {
        $this->addresses[] = $addresses;

        return $this;
    }

    /**
     * Remove addresses
     *
     * @param \Vivait\CRMBundle\Entity\Customer $addresses
     */
    public function removeAddress(Customer $addresses)
    {
        $this->addresses->removeElement($addresses);
    }

    /**
     * Get addresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddresses()
    {
        return $this->addresses;
    }
}
