<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property Track[] $tracks
 */
class Composer extends Model
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
    public $incrementing = false;

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
}
