<?php

namespace Jervenclark\Audits\Traits;

use Auth;
use Jervenclark\Audits\Models\Audit;

trait Auditable
{

    /**
     * Boot auditable trait
     *
     * @return void
     */
    public static function bootAuditable()
    {
        static::updated(function($model) {
            static::createAudit($model, 'update');
        });
        static::created(function($model) {
            static::createAudit($model, 'create');
        });
    }

    /**
     * Automatically create audits on update and create
     *
     * @params $model
     * @params string $event
     */
    private static function createAudit($model, $event = '')
    {
        $details = ['event' => $event];
        if ($model->isDirty()) {
            $new_values = $model->getDirty();
            $old_values = $model->getOriginal();
            $old_values = array_intersect_key($old_values, $new_values);
            $details['new_values'] = json_encode($new_values);
            $details['old_values'] = json_encode($old_values);
        }
        if (Auth::check()) {
            $details['user_id'] = Auth::user()->id;
        }
        $model->audits()->create($details);
    }

    /**
     * Get the model audits
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function audits()
    {
        return $this->morphMany(Audit::class, 'auditable');
    }

}
