<?php

namespace App\Models;

class Company
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

    public function getOffers(): array
    {
        return $this->offers;
    }

    public function addOffer(Offer $offer)
    {
        $this->offer[] = $offer;
    }
}
