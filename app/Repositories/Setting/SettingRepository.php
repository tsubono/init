<?php

namespace App\Repositories\Setting;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class SettingRepository
 *
 * @package App\Repositories\Setting
 */
class SettingRepository implements SettingRepositoryInterface
{
    private Setting $setting;

    public function __construct(Setting $setting) {
        $this->setting = $setting;
    }

    /**
     * @return Setting
     */
    public function getOne(): Setting
    {
        return $this->setting->firstOrCreate();
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function update(int $id, array $data): void
    {
        DB::beginTransaction();

        try {
            $setting = $this->setting->findOrFail($id);
            $setting->update($data);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }
}
