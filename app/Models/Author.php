<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property Track[] $tracks
 * @property Track[] tracks_coverage
 */
class Author extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var array
     */
    protected $fillable = ['first_name', 'last_name'];

    /**
     * @return HasMany
     */
    public function tracks()
    {
        return $this->hasMany('App\Track');
    }

    /**
     * @return HasMany
     */
    public function composers()
    {
        return $this->hasMany('App\Track');
    }

    /**
     * @return HasMany
     */
    public function tracks_coverage()
    {
        return $this->hasMany('App\Track', 'author_coverage_id');
    }
}
