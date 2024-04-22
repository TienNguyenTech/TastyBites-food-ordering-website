<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MenuitemsFixture
 */
class MenuitemsFixture extends TestFixture
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
                'menuitem_id' => 1,
                'menuitem_name' => 'Lorem ipsum dolor sit amet',
                'menuitem_image' => 'Lorem ipsum dolor sit amet',
                'menuitem_desc' => 'Lorem ipsum dolor sit amet',
                'menuitem_price' => 1,
                'menuitem_rating' => 1,
            ],
        ];
        parent::init();
    }
}
