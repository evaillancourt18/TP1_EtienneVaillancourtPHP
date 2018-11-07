<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EditorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EditorsTable Test Case
 */
class EditorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EditorsTable
     */
    public $EditorsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.editors',
        'app.books'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Editors') ? [] : ['className' => EditorsTable::class];
        $this->EditorsTable = TableRegistry::getTableLocator()->get('Editors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EditorsTable);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
