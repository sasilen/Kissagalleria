<?php
namespace Kissagalleria\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Kissagalleria\Model\Table\UsersTable;

/**
 * Kissagalleria\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Kissagalleria\Model\Table\UsersTable
     */
    public $Users;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.kissagalleria.users',
        'plugin.kissagalleria.usergroups',
        'plugin.kissagalleria.breeders',
        'plugin.kissagalleria.breeders_users',
        'plugin.kissagalleria.blog_posts',
        'plugin.kissagalleria.blogs',
        'plugin.kissagalleria.cats',
        'plugin.kissagalleria.media',
        'plugin.kissagalleria.breeds',
        'plugin.kissagalleria.cats_users',
        'plugin.kissagalleria.exhibitions',
        'plugin.kissagalleria.comments',
        'plugin.kissagalleria.commentsold',
        'plugin.kissagalleria.photos',
        'plugin.kissagalleria.notes',
        'plugin.kissagalleria.ratinghistories',
        'plugin.kissagalleria.ratingsold',
        'plugin.kissagalleria.tagsold',
        'plugin.kissagalleria.photos_tagsold',
        'plugin.kissagalleria.posts',
        'plugin.kissagalleria.vets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

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
