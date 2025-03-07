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
                'order_datetime' => 1715057149,
                'order_status' => 'Lorem ipsum dolor ',
                'customer_name' => 'Lorem ipsum dolor sit amet',
                'customer_email' => 'Lorem ipsum dolor sit amet',
                'customer_phone' => 'Lorem ip',
            ],
        ];
        parent::init();
    }
}
