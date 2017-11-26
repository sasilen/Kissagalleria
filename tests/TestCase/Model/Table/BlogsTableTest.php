<?php
namespace Kissagalleria\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Kissagalleria\Model\Table\BlogsTable;

/**
 * Kissagalleria\Model\Table\BlogsTable Test Case
 */
class BlogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Kissagalleria\Model\Table\BlogsTable
     */
    public $Blogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.kissagalleria.blogs',
        'plugin.kissagalleria.users',
        'plugin.kissagalleria.usergroups',
        'plugin.kissagalleria.breeders',
        'plugin.kissagalleria.blog_posts',
        'plugin.kissagalleria.cats',
        'plugin.kissagalleria.breeds',
        'plugin.kissagalleria.cats_users',
        'plugin.kissagalleria.exhibitions',
        'plugin.kissagalleria.photos',
        'plugin.kissagalleria.commentsold',
        'plugin.kissagalleria.notes',
        'plugin.kissagalleria.ratinghistories',
        'plugin.kissagalleria.ratingsold',
        'plugin.kissagalleria.tagsold',
        'plugin.kissagalleria.photos_tagsold',
        'plugin.kissagalleria.comments',
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
        $config = TableRegistry::exists('Blogs') ? [] : ['className' => BlogsTable::class];
        $this->Blogs = TableRegistry::get('Blogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Blogs);

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
