<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property mixed $suspect_no
 * @property mixed $town
 * @property mixed $crimeType
 * @property mixed $county
 * @property mixed $type_id
 * @method static create(array $array)
 * @method static latest()
 */
class Crime extends Model
{
    use HasFactory;

    protected $fillable = ['type_id','reporter_name','county_id','town','building','suspect_no','evidence_link', 'videos', 'audios', 'images', 'documents'];

    public mixed $building;

    protected $appends = ['county', 'type'];


    public function getCountyAttribute(): string
    {
        $county = County::find($this->county_id);

        return $county ? $county->name : 'Not Given';
    }


    public function getTypeAttribute(): string
    {
        $crimeType = CrimeType::find($this->type_id);

        return $crimeType ? $crimeType->name : 'Not Given';
    }


    /**
     * @return BelongsTo
     */
    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class,'county_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function crimeType(): BelongsTo
    {
        return $this->belongsTo(CrimeType::class,'type_id', 'id');
    }

}
