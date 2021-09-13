<?php

namespace App\Repositories\Contact;

use App\Models\Contact;

interface ContactRepositoryInterface
{
    public function store(array $data): Contact;
}
