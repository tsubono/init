<?php

namespace App\Repositories\MstLanguage;

use App\Models\MstLanguage;

/**
 * Class MstLanguageRepository
 *
 * @package App\Repositories\MstLanguage
 */
class MstLanguageRepository implements MstLanguageRepositoryInterface
{
    private MstLanguage $mstLanguage;

    public function __construct(MstLanguage $mstLanguage) {
        $this->mstLanguage = $mstLanguage;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->mstLanguage->all();
    }
}
