<?php

namespace App\Repositories\Lesson;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface LessonRepositoryInterface
{
    public function getPaginate(int $perCount = 10): LengthAwarePaginator;
    public function getByAdviserIdPaginate(int $adviserUserId, int $perCount = 10): LengthAwarePaginator;
    public function getByConditionPaginate(
        int $perCount = 10,
        string $category = null,
        string $language = null,
        string $room = null,
        string $country = null,
        string $gender = null,
        int $coinMin = null,
        int $coinMax = null
    ): LengthAwarePaginator;
    public function store(array $data): void;
    public function update(int $id, array $data): void;
    public function destroy(int $id): void;
}
