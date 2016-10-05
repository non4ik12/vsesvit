<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tours
 *
 * @ORM\Table(name="tours")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ToursRepository")
 */
class Tours
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="continent_id", type="integer")
     */
    private $continentId;

    /**
     * @var int
     *
     * @ORM\Column(name="country_id", type="integer")
     */
    private $countryId;

    /**
     * @var int
     *
     * @ORM\Column(name="city_id", type="integer")
     */
    private $cityId;

    /**
     * @var int
     *
     * @ORM\Column(name="ishot", type="integer")
     */
    private $ishot;

    /**
     * @var int
     *
     * @ORM\Column(name="enabled", type="integer")
     */
    private $enabled;

    /**
     * @var int
     *
     * @ORM\Column(name="image", type="string", length=50))
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=10000))
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Continents")
     * @ORM\JoinColumn(name="continent_id", referencedColumnName="id")
     */
    public $continent;

    /**
     * @ORM\ManyToOne(targetEntity="Countries")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    public $country;

    /**
     * @ORM\ManyToOne(targetEntity="Cities", inversedBy="tours")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     */
    public $city;


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
     * @return Tours
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
     * Set continentId
     *
     * @param integer $continentId
     *
     * @return Tours
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
     * Set countryId
     *
     * @param integer $countryId
     *
     * @return Tours
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
     * Set cityId
     *
     * @param integer $cityId
     *
     * @return Tours
     */
    public function setCityId($cityId)
    {
        $this->cityId = $cityId;

        return $this;
    }

    /**
     * Get cityId
     *
     * @return int
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * Set ishot
     *
     * @param integer $ishot
     *
     * @return Tours
     */
    public function setIshot($ishot)
    {
        $this->ishot = $ishot;

        return $this;
    }

    /**
     * Get ishot
     *
     * @return int
     */
    public function getIshot()
    {
        return $this->ishot;
    }

    /**
     * Set enabled
     *
     * @param integer $enabled
     *
     * @return Tours
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return int
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Tours
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Tours
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
     * Set continent
     *
     * @param \AppBundle\Entity\Continents $continent
     *
     * @return Tours
     */
    public function setContinent(\AppBundle\Entity\Continents $continent = null)
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * Get continent
     *
     * @return \AppBundle\Entity\Continents
     */
    public function getContinent()
    {
        return $this->continent;
    }

    /**
     * Set country
     *
     * @param \AppBundle\Entity\Countries $country
     *
     * @return Tours
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

    /**
     * Set city
     *
     * @param \AppBundle\Entity\Cities $city
     *
     * @return Cities
     */
    public function setCity(\AppBundle\Entity\Cities $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \AppBundle\Entity\Cities
     */
    public function getCity()
    {
        return $this->city;
    }
}
