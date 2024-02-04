<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait WithTx
{
    public static function bootWithTx(): void
    {
        static::addGlobalScope('tx_and_sub_count', function (Builder $builder) {
            $builder->withCount([
                'transactions' => function ($query) {},
            ]);
        });
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
