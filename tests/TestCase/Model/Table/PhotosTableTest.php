<?php
namespace Kissagalleria\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Kissagalleria\Model\Table\PhotosTable;

/**
 * Kissagalleria\Model\Table\PhotosTable Test Case
 */
class PhotosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Kissagalleria\Model\Table\PhotosTable
     */
    public $Photos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.kissagalleria.photos',
        'plugin.kissagalleria.users',
        'plugin.kissagalleria.usergroups',
        'plugin.kissagalleria.breeders',
        'plugin.kissagalleria.blog_posts',
        'plugin.kissagalleria.blogs',
        'plugin.kissagalleria.cats',
        'plugin.kissagalleria.breeds',
        'plugin.kissagalleria.cats_users',
        'plugin.kissagalleria.exhibitions',
        'plugin.kissagalleria.comments',
        'plugin.kissagalleria.commentsold',
        'plugin.kissagalleria.posts',
        'plugin.kissagalleria.vets',
        'plugin.kissagalleria.notes',
        'plugin.kissagalleria.ratinghistories',
        'plugin.kissagalleria.ratingsold',
        'plugin.kissagalleria.tagsold',
        'plugin.kissagalleria.photos_tagsold'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Photos') ? [] : ['className' => PhotosTable::class];
        $this->Photos = TableRegistry::get('Photos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Photos);

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
