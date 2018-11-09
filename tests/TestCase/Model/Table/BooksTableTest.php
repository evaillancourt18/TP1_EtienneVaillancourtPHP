<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BooksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * App\Model\Table\BooksTable Test Case
 */
class BooksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BooksTable
     */
    public $Books;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.books',
        'app.books_title_translation',
        'app.i18n',
        'app.authors',
        'app.provinces',
        'app.editors',
        'app.categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Books') ? [] : ['className' => BooksTable::class];
        $this->Books = TableRegistry::getTableLocator()->get('Books', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Books);

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
	
	public function testSaving() {
        $data = [
            'id' => 3,
                'author_id' => 1,
                'province_id' => 1,
                'title' => 'Test1',
                'release_date' => 'Test1',
                'created' => null,
                'modified' => null,
                'editor_id' => 1,
				'active'=>0
        ];
        $book = $this->Books->newEntity($data);
        $countBeforeSave = $this->Books->find()->count();
        $this->Books->save($book);
        $countAfterSave = $this->Books->find()->count();
        $this->assertEquals($countAfterSave, $countBeforeSave + 1);
    }
	
	public function testEditing() {
        $book = $this->Books->find('all', ['conditions' => ['active' => true]])->first();
        $book->active = false;
        $this->Books->save($book);
        $this->assertEquals(false, $book->active);
    }
	
	public function testDeleting() {
        $countBeforeDelete = $this->Books->find()->count();
        $book = $this->Books->find()->first();
        $this->Books->delete($book);
        $countAfterDelete = $this->Books->find()->count();
        $this->assertEquals($countAfterDelete, $countBeforeDelete - 1);
    }
	
	public function testValidateTitleSuccess () {
        $book = $this->Books->find('all')->first()->toArray();
        $errors = $this->Books->validationDefault(new Validator())->errors($book);
        $this->assertTrue(empty($errors));
    }
	
	public function testValidateTitleFail () {
		$book = $this->Books->find('all')->first()->toArray();
		$book['title'] = "";
		$errors = $this->Books->validationDefault(new Validator())->errors($book);
		$this->assertTrue(!empty($errors['title']));
    }
	
	    public function testFindActive()
    {
        $query = $this->Books->find('active');
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            [
                'id' => 1,
                'author_id' => 1,
                'province_id' => 1,
                'title' => 'Test1',
                'release_date' => 'Test1',
                'created' => null,
                'modified' => null,
                'editor_id' => 1,
				'active'=>1
            ],
            [
                'id' => 2,
                'author_id' => 1,
                'province_id' => 1,
                'title' => 'Test2',
                'release_date' => 'Test2',
                'created' => null,
                'modified' => null,
                'editor_id' => 1,
				'active'=>1
            ]
        ];
        $this->assertEquals($expected, $result);
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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
