<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $suspect_no
 * @property mixed $town
 * @method static create(array $array)
 * @method static orderBy(string $string)
 * @method static latest()
 */
class Crime extends Model
{
    use HasFactory;

    protected $fillable = ['type_id','reporter_name','county_id','town','building','suspect_no','evidence_link', 'videos', 'audios', 'images', 'documents'];


    public mixed $building;
}
