<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use WithTx;

    protected $guarded = [];

    public function tenant(): ?BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
