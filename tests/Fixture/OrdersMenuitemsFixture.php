<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersMenuitemsFixture
 */
class OrdersMenuitemsFixture extends TestFixture
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
                'menuitem_id' => 1,
                'om_quantity' => 1,
                'om_price' => 1,
            ],
        ];
        parent::init();
    }
}
