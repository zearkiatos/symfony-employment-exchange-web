<?php

namespace App\Models;

class Offer
{
    private $name;
    private $company;
    private $applicants = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setCompany(Company $company)
    {
        $this->company = $company;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function addApplicants(Applicant $applicant)
    {
        $this->applicants[] = $applicant;
    }

    public function getApplicants(): array
    {
        return $this->applicants;
    }
}
