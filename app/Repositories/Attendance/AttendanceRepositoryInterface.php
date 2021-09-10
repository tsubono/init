<?php

namespace App\Repositories\Attendance;

use App\Models\Attendance;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AttendanceRepositoryInterface
{
    public function getPaginate(int $perCount = 10): LengthAwarePaginator;
    public function store(array $data): Attendance;
    public function update(int $id, array $data): void;
}
