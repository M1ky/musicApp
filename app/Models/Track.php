<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $composer_id
 * @property integer $author_id
 * @property integer $author_coverage_id
 * @property string $title
 * @property string $isrc
 * @property integer $time_seconds
 * @property string $created_at
 * @property string $updated_at
 * @property Author $author
 * @property Author $author_composer
 * @property Author $author_coverage
 */
class Track extends Model
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
    protected $fillable = ['composer_id', 'author_id', 'author_coverage_id', 'title', 'isrc', 'time_seconds', 'created_at', 'updated_at'];

    /**
     * @return BelongsTo
     */
    public function author_composer()
    {
        return $this->belongsTo('App\Author', 'composer_id');
    }

    /**
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    /**
     * @return BelongsTo
     */
    public function author_coverage()
    {
        return $this->belongsTo('App\Author', 'author_coverage_id');
    }

    public function reports()
    {
        return $this->belongsToMany(Report::class);
    }
}
