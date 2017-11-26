<?php
namespace Kissagalleria\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Kissagalleria\Model\Table\CatsTable;

/**
 * Kissagalleria\Model\Table\CatsTable Test Case
 */
class CatsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Kissagalleria\Model\Table\CatsTable
     */
    public $Cats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.kissagalleria.cats',
        'plugin.kissagalleria.breeds',
        'plugin.kissagalleria.users',
        'plugin.kissagalleria.cats_users',
        'plugin.kissagalleria.blog_posts',
        'plugin.kissagalleria.blogs',
        'plugin.kissagalleria.exhibitions',
        'plugin.kissagalleria.photos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cats') ? [] : ['className' => CatsTable::class];
        $this->Cats = TableRegistry::get('Cats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cats);

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
