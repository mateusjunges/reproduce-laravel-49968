<?php

namespace Tests\Unit;

use App\Models\Subscription;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TestInfiniteLoop extends TestCase
{
    use DatabaseMigrations;

    protected Tenant $tenant;

    public function test_adding_a_subscription_to_tenant_breaks_in_Laravel_10dot43(): void
    {
        $this->tenant = Tenant::create([]);

        $subscription = Subscription::create([
            'payer_id' => $this->tenant->id,
        ]);

        $subscriptions = $this->tenant->subscriptions();
        $subscriptions->save($subscription);

        $this->assertEquals(1, Subscription::count()); // and this line is never reached in Laravel 10.43.0
    }
}
