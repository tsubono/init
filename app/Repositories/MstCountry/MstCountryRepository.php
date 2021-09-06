<?php

namespace App\Repositories\MstCountry;

use App\Models\MstCountry;

/**
 * Class MstCountryRepository
 *
 * @package App\Repositories\MstCountry
 */
class MstCountryRepository implements MstCountryRepositoryInterface
{
    private MstCountry $mstCountry;

    public function __construct(MstCountry $mstCountry) {
        $this->mstCountry = $mstCountry;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->mstCountry->all();
    }
}
