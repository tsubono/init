<?php

namespace App\Repositories\MstRoom;

interface MstRoomRepositoryInterface
{
    public function all();
    public function getWithCategories();
}
