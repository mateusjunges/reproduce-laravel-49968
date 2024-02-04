<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $guarded=[];
    public function tenant(): ?BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
