<?php
namespace Kissagalleria\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Kissagalleria\Model\Table\ExhibitionsTable;

/**
 * Kissagalleria\Model\Table\ExhibitionsTable Test Case
 */
class ExhibitionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Kissagalleria\Model\Table\ExhibitionsTable
     */
    public $Exhibitions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.kissagalleria.exhibitions',
        'plugin.kissagalleria.cats',
        'plugin.kissagalleria.breeds',
        'plugin.kissagalleria.users',
        'plugin.kissagalleria.cats_users',
        'plugin.kissagalleria.blog_posts',
        'plugin.kissagalleria.blogs',
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
        $config = TableRegistry::exists('Exhibitions') ? [] : ['className' => ExhibitionsTable::class];
        $this->Exhibitions = TableRegistry::get('Exhibitions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Exhibitions);

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
