<?php

namespace Tests\Unit;

use App\Models\Subscription;
use App\Models\Tenant;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    protected $tenant;

    /**
     * A basic test example.
     */
    public function test_adding_a_subscription_to_tenant_breaks_in_Laravel_10dot43(): void
    {
        $this->tenant = Tenant::create([]);

        $subscription = Subscription::create([
            'payer_id' => $this->tenant->id,
        ]);

        $subscriptions = $this->tenant->subscriptions();
        $subscriptions->save($subscription); // this line causes a signal "11" (infinite loop)

        $this->assertEquals(1, Subscription::count()); // and this line is never reached in Laravel 10.43.0
    }
}
