<?php

namespace App\Repositories\MstRoom;

use App\Models\MstRoom;

/**
 * Class MstRoomRepository
 *
 * @package App\Repositories\MstRoom
 */
class MstRoomRepository implements MstRoomRepositoryInterface
{
    private MstRoom $mstRoom;

    public function __construct(MstRoom $mstRoom) {
        $this->mstRoom = $mstRoom;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->mstRoom->query()->with('categories')->get();
    }
}
