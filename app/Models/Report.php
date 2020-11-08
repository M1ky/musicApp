<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $title
 * @property int $year
 * @property int $month
 * @property string $created_at
 * @property string $updated_at
 * @property ReportTrack[] $reportTracks
 */
class Report extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['title', 'year', 'month', 'created_at', 'updated_at'];

    /**
     * @return HasMany
     */
    public function tracks()
    {
        return $this->belongsToMany('App\Models\Track', 'report_track');
    }
}

