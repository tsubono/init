<?php

namespace App\Repositories\MstCategory;

use App\Models\MstCategory;

/**
 * Class MstCategoryRepository
 *
 * @package App\Repositories\MstCategory
 */
class MstCategoryRepository implements MstCategoryRepositoryInterface
{
    private MstCategory $mstCategory;

    public function __construct(MstCategory $mstCategory) {
        $this->mstCategory = $mstCategory;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->mstCategory->all();
    }
}
