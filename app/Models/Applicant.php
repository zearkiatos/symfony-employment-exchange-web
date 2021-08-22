<?php

namespace App\Models;

class Applicant
{
    private $name;
    private $offers = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addOffer(Offer $offer)
    {
        $this->offers[] = $offer;
    }

    public function getOffers()
    {
        return $this->offers;
    }
}
