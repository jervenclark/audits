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
