<?php

namespace App\Repositories\TransferRequest;

use App\Models\TransferRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TransferRequestRepositoryInterface
{
    public function getPaginate(int $perCount = 15): LengthAwarePaginator;
    public function store(array $data): TransferRequest;
    public function update(int $id, array $data): void;
}
