<?php

namespace App\Repositories\Setting;

use App\Models\Setting;

interface SettingRepositoryInterface
{
    public function getOne(): Setting;
    public function update(int $id, array $data): void;
}
