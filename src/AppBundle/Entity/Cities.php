<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cities
 *
 * @ORM\Table(name="cities")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CitiesRepository")
 */
class Cities
{
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
     * @ORM\Column(name="title", type="string", length=70)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=10000)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="country_id", type="integer", unique=false)
     */
    private $countryId;

    /**
     * @var int
     *
     * @ORM\Column(name="continent_id", type="integer", unique=false)
     */
    private $continentId;

    /**
     * @ORM\ManyToOne(targetEntity="Countries", inversedBy="cities")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="Continents", inversedBy="cities")
     * @ORM\JoinColumn(name="continent_id", referencedColumnName="id")
     */
    private $continent;

    /**
     * @ORM\OneToMany(targetEntity="Tours", mappedBy="city")
     */
    private $tours;

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
     * Set title
     *
     * @param string $title
     *
     * @return Cities
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

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Cities
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

    /**
     * Set countryId
     *
     * @param integer $countryId
     *
     * @return Cities
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    /**
     * Get countryId
     *
     * @return int
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * Set continentId
     *
     * @param integer $continentId
     *
     * @return Cities
     */
    public function setContinentId($continentId)
    {
        $this->continentId = $continentId;

        return $this;
    }

    /**
     * Get continentId
     *
     * @return int
     */
    public function getContinentId()
    {
        return $this->continentId;
    }

    /**
     * Set country
     *
     * @param \AppBundle\Entity\Countries $country
     *
     * @return Cities
     */
    public function setCountry(\AppBundle\Entity\Countries $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\Countries
     */
    public function getCountry()
    {
        return $this->country;
    }
}
