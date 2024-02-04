<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

trait WithTx
{
    public static function bootWithTx()
    {
        static::addGlobalScope('tx_and_sub_count', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->withCount(['transactions as all_transactions_count' => function ($query) {
            }]);
        });
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
