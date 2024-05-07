<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentsFixture
 */
class PaymentsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'payment_id' => 1,
                'payment_amount' => 1,
                'card_number' => 1,
                'card_expiry' => 1,
                'card_cvc' => 1,
                'order_id' => 1,
            ],
        ];
        parent::init();
    }
}
