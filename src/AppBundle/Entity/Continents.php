<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Continents
 *
 * @ORM\Table(name="continents")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContinentsRepository")
 */
class Continents
{
    /**
     * @ORM\OneToMany(targetEntity="Countries", mappedBy="continent")
     */
    protected $countriesList;

    
    /**
     * Get countries
     *
     * @return Countries
     */
    public function getCountriesList()
    {
        return $this->countriesList;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=60)
     */
    private $title;

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Continents
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function __construct() {
        $this->countries = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=5000)
     */
    private $description;

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Continents
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
