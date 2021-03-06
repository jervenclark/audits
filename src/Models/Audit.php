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
        'tags'       => 'array',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'updated_at',
        'user_id',
        'auditable_type',
        'auditable_id',
        'new_values',
        'old_values'
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

    /**
     * Add auditable scope
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeAuditable($query, $id) {
        return (!is_int($id)) ? $query : $query->where('auditable_id', $id);
    }

    /**
     * Add auditable_type scope
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeType($query, $type) {
        return (!is_string($type)) ? $query : $query->where('auditable_type', $type);
    }

}
