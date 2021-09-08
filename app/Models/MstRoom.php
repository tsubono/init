<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstRoom extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // ============ Relations ============
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(MstCategory::class);
    }

}
