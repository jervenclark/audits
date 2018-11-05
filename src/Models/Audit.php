<?php

namespace Jervenclark\Audits\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event',
        'new_values',
        'old_values',
        'user_id',
        'user_type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'new_values' => 'array',
        'old_values' => 'array',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get auditable model
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function auditable()
    {
        return $this->morphTo();
    }

}
