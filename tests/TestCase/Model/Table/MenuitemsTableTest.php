<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MenuitemsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MenuitemsTable Test Case
 */
class MenuitemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MenuitemsTable
     */
    protected $Menuitems;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
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
        $config = $this->getTableLocator()->exists('Menuitems') ? [] : ['className' => MenuitemsTable::class];
        $this->Menuitems = $this->getTableLocator()->get('Menuitems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Menuitems);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MenuitemsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
