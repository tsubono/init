<?php

namespace App\Repositories\TransferRequest;

use App\Models\TransferRequest;

interface TransferRequestRepositoryInterface
{
    public function store(array $data): TransferRequest;
    public function update(int $id, array $data): void;
}
