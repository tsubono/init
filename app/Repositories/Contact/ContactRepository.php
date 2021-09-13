<?php

namespace App\Repositories\Contact;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class ContactRepository
 *
 * @package App\Repositories\Contact
 */
class ContactRepository implements ContactRepositoryInterface
{
    private Contact $contact;

    public function __construct(Contact $contact) {
        $this->contact = $contact;
    }

    /**
     * @param array $data
     * @return Contact
     * @throws \Exception
     */
    public function store(array $data): Contact
    {
        DB::beginTransaction();

        try {
            $contact = $this->contact->create($data);

            DB::commit();

            return $contact;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            throw new \Exception($e);
        }
    }
}
