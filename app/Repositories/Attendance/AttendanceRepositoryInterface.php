<?php

namespace App\Repositories\Attendance;

use App\Models\Attendance;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AttendanceRepositoryInterface
{
    public function getPaginate(int $perCount = 10): LengthAwarePaginator;
    public function getByAdviserUserIdPaginate(int $adviserUserId, int $perCount = 10): LengthAwarePaginator;
    public function getByMateUserIdPaginate(int $mateUserId, int $perCount = 10): LengthAwarePaginator;
    public function store(array $data): Attendance;
    public function update(int $id, array $data): Attendance;
}
