<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
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
                'order_id' => 1,
                'order_datetime' => 1712563502,
                'order_total' => 1,
                'customer_id' => 1,
            ],
        ];
        parent::init();
    }
}
