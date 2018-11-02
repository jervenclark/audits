<?php

namespace Jervenclark\Audits\Traits;

use Jervenclark\Audits\Models\Audit;

trait Auditable
{
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
