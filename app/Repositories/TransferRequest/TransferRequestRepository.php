<?php

namespace App\Repositories\TransferRequest;

use App\Models\TransferRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class TransferRequestRepository
 *
 * @package App\Repositories\TransferRequest
 */
class TransferRequestRepository implements TransferRequestRepositoryInterface
{
    private TransferRequest $transferRequest;

    public function __construct(TransferRequest $transferRequest) {
        $this->transferRequest = $transferRequest;
    }

    /**
     * @param array $data
     * @return TransferRequest
     * @throws \Exception
     */
    public function store(array $data): TransferRequest
    {
        DB::beginTransaction();

        try {
            $transferRequest = $this->transferRequest->create($data);

            DB::commit();

            return $transferRequest;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function update(int $id, array $data): void
    {
        DB::beginTransaction();

        try {
            $transferRequest = $this->transferRequest->findOrFail($id);
            $transferRequest->update($data);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }
}
