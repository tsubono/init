<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    protected $softCascade = ['images', 'movies', 'categories'];

    protected $guarded = ['id'];

    protected $appends = ['eye_catch_image'];

    // ============ Relations ============
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adviserUser(): BelongsTo
    {
        return $this->belongsTo(AdviserUser::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(MstLanguage::class, 'mst_language_id');
    }

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(MstCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(LessonImage::class)->orderBy('sort');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movies(): HasMany
    {
        return $this->hasMany(LessonMovie::class)->orderBy('sort');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessonMovies(): HasMany
    {
        return $this->hasMany(LessonMovie::class)->orderBy('sort');
    }

    // ============ Attributes ============
    /**
     * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed|string
     */
    public function getEyeCatchImageAttribute()
    {
        $image = $this->images()->first();

        return !empty($image) ? $image->image_path : asset('img/default-image.png');
    }

    /**
     * @return mixed
     */
    public function getCategoryIdsAttribute()
    {
        return $this->categories->pluck('id')->toArray();
    }
}
