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
     * Remember:
     *  orphanRemoval=true is needed when deleting addresses from a customer
     *  cascade:persist is needed to create new addresses against a customer
     *  cascade:remove is to delete all addresses from a customer when you delete the customer
     * @ORM\OneToMany(targetEntity="Address", mappedBy="customer",cascade={"persist","remove"},orphanRemoval=true)
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
     * @param Address $addresses
     * @return Address
     */
    public function addAddress(Address $addresses)
    {
        $this->addresses[] = $addresses;

        #this ensures that the customer has been set on the address (this is important as Doctrine
        #will only check the 'owning' entity of a relationship for changes, if you leave this off
        #doctrine would create an Address without a Customer which will result in a broken link
        #The 'owner' of the relationship is always the one where the actual ID of the relationship
        #is stored in the database (Always the "Many" part on a OneToMany relationship but can be
        #manually specified in a OneToOne or ManyToMany)
        $addresses->setCustomer($this);
        return $this;
    }

    /**
     * Remove addresses
     *
     * @param \Vivait\CRMBundle\Entity\Address $addresses
     */
    public function removeAddress(Address $addresses)
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
