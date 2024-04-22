<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CustomersFixture
 */
class CustomersFixture extends TestFixture
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
                'customer_id' => 1,
                'customer_fname' => 'Lorem ipsum dolor sit amet',
                'customer_lname' => 'Lorem ipsum dolor sit amet',
                'customer_phone' => 'Lorem ip',
                'customer_email' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
