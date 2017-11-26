<?php
namespace Kissagalleria\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Kissagalleria\Model\Table\BreedsTable;

/**
 * Kissagalleria\Model\Table\BreedsTable Test Case
 */
class BreedsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Kissagalleria\Model\Table\BreedsTable
     */
    public $Breeds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.kissagalleria.breeds',
        'plugin.kissagalleria.cats',
        'plugin.kissagalleria.media',
        'plugin.kissagalleria.users',
        'plugin.kissagalleria.cats_users',
        'plugin.kissagalleria.social_accounts',
        'plugin.kissagalleria.breeders',
        'plugin.kissagalleria.breeders_users',
        'plugin.kissagalleria.exhibitions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Breeds') ? [] : ['className' => BreedsTable::class];
        $this->Breeds = TableRegistry::get('Breeds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Breeds);

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
