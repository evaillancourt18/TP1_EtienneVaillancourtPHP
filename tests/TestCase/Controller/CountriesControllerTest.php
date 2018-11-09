<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CountriesController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\CountriesController Test Case
 */
class CountriesControllerTest extends IntegrationTestCase
{
	
	public $AuthAdmin;
    public $Countries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.countries',
        'app.provinces',
		'app.users'
    ];
	
	public function setUp()
    {
        parent::setUp();
        $this->Countries = TableRegistry::get('Countries');
        $usersTable = TableRegistry::get('users');
        $user = $usersTable->find('all', ['conditions' => ['Users.type' => 2]])->first()->toArray();
        $this->AuthAdmin = [
            'Auth' => [
                'User' => $user
            ]
        ];
    }
	
	public function tearDown()
    {
        unset($this->AuthAdmin);
        unset($this->Countries);
        parent::tearDown();
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->session($this->AuthAdmin);
        $this->get('/countries');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->session($this->AuthAdmin);
        $this->get('/countries/view/1');
        //echo $this->_response->body();
        $this->assertResponseContains('Test One');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->session($this->AuthAdmin);
        $this->get('/countries/add');
        $this->assertResponseOk();
        $data = [
				'id' => 2,
                'name' => 'Test Two',
                'created' => 'null',
                'modified' => 'null'
        ];
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/countries/add', $data);
        //echo $this->_response->body();
        $this->assertResponseSuccess();
        $query = $this->Countries->find('all', ['conditions' => ['Countries.id' => $data['id']]]);
        $this->assertNotEmpty($query);
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->session($this->AuthAdmin);
        $newName = 'Test Country Edit';
        $country = $this->Countries->find('all')->first();
        $country->name = $newName;
        $countryId = $country->id;
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/countries/edit/' . $countryId, $country->toArray());
        $this->assertResponseSuccess();
        $query = $this->Countries->find('all', ['conditions' => ['Countries.id' => $countryId]])->first();
        $this->assertEquals($newName, $query->name);
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->session($this->AuthAdmin);
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->delete('/countries/delete/1');
        $this->assertResponseSuccess();
        $query = $this->Countries->find('all', ['conditions' => ['Countries.id' => 1]])->first();
        $this->assertEmpty($query);
    }
	
	public function testAddUnauthenticatedFail() {
        $this->get('/countries/add');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login', 'redirect'=> '/countries/add']);
        //$this->markTestIncomplete('Not implemented yet.');
    }
}
