<?php

namespace AppBundle\Repository;

/**
 * ContinentsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContinentsRepository extends \Doctrine\ORM\EntityRepository
{

    
    /**
     * Get countries
     *
     * @return Countries
     */
    public function getCountries()
    {
        return $this->countries;
    }
}
