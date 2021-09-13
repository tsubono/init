<?php

namespace App\Repositories\AttendanceMessage;

interface AttendanceMessageRepositoryInterface
{
    public function store(array $data): void;
    public function update(int $id, array $data): void;
}
