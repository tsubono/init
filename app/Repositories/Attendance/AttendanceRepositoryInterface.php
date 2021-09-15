<?php

namespace App\Repositories\Attendance;

use App\Models\Attendance;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AttendanceRepositoryInterface
{
    public function getPaginate(int $perCount = 10): LengthAwarePaginator;
    public function getByConditionPaginate(array $condition, int $perCount = 10): LengthAwarePaginator;
    public function store(array $data): Attendance;
    public function update(int $id, array $data): Attendance;
    public function updateMessagesToRead(int $attendanceId, string $fromUserColumn): void;
}
