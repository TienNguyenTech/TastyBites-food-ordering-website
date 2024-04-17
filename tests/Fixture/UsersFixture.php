<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'user_id' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'nonce' => 'Lorem ipsum dolor sit amet',
                'nonce_expiry' => '2024-04-17 05:27:07',
                'created' => '2024-04-17 05:27:07',
                'modified' => '2024-04-17 05:27:07',
                'user_type' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
