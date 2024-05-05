<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MenuitemsOrdersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MenuitemsOrdersTable Test Case
 */
class MenuitemsOrdersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MenuitemsOrdersTable
     */
    protected $MenuitemsOrders;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.MenuitemsOrders',
        'app.Menuitems',
        'app.Orders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MenuitemsOrders') ? [] : ['className' => MenuitemsOrdersTable::class];
        $this->MenuitemsOrders = $this->getTableLocator()->get('MenuitemsOrders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MenuitemsOrders);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MenuitemsOrdersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MenuitemsOrdersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
