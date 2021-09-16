<?php

namespace App\Repositories\Lesson;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface LessonRepositoryInterface
{
    public function getPaginate(int $perCount = 15): LengthAwarePaginator;
    public function getByAdviserIdPaginate(int $adviserUserId, int $perCount = 15): LengthAwarePaginator;
    public function getByConditionPaginate(
        int $perCount,
        ?string $orderBy,
        ?string $category,
        ?string $language,
        ?string $room,
        ?string $country,
        ?string $gender,
        ?int $coinMin,
        ?int $coinMax
    ): LengthAwarePaginator;
    public function store(array $data): void;
    public function update(int $id, array $data): void;
    public function stopByAdviserUserId(int $adviserUserId): void;
    public function destroy(int $id): void;
}
