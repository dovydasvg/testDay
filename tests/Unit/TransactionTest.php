<?php


namespace Tests\Unit;


use DateTime;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_transactionReceived_event_is_fired(): void
    {
        $response = $this->post('api/appleAppStoreNotification',[
            'responseBody' => [
                'auto_renew_adam_id' => 'someLongInteger',
                'environment' => 'SandBox',
                'notification_type' => 'INITIAL_BUY'
            ]
        ]);
        $response->assertStatus(200);
    }
}
