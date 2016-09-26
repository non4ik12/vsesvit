<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Countries
 *
 * @ORM\Table(name="countries")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CountriesRepository")
 */
class Countries
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
     * @ORM\Column(name="title", type="string", length=60)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="continent_id", type="integer")
     */
    private $continentId;

    /**
     * @ORM\ManyToOne(targetEntity="Continents", inversedBy="countriesList")
     * @ORM\JoinColumn(name="continent_id", referencedColumnName="id")
     */
    protected $continent;

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
     * @return Countries
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
     * @return Countries
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
     * @return Countries
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

