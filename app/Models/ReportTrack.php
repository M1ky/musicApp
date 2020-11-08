<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $report_id
 * @property integer $track_id
 * @property integer $broadcasts
 * @property string $created_at
 * @property string $updated_at
 * @property Track $track
 * @property Report $report
 */
class ReportTrack extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'report_track';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['report_id', 'track_id', 'broadcasts', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function track()
    {
        return $this->belongsTo('App\Track');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function report()
    {
        return $this->belongsTo('App\Report');
    }

    public function getBroadcasts()
    {
        return $this->broadcasts;
    }
}
