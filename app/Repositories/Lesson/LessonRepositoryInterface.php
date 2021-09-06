<?php

namespace App\Repositories\Lesson;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface LessonRepositoryInterface
{
    public function getByAdviserIdPaginate(int $adviserUserId, int $perCount = 10): LengthAwarePaginator;
    public function store(array $data): void;
    public function update(int $id, array $data): void;
    public function destroy(int $id): void;
}
