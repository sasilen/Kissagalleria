<?php
namespace Kissagalleria\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cats Model
 *
 * @property \Kissagalleria\Model\Table\BreedsTable|\Cake\ORM\Association\BelongsTo $Breeds
 * @property \Kissagalleria\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \Kissagalleria\Model\Table\BlogPostsTable|\Cake\ORM\Association\HasMany $BlogPosts
 * @property \Kissagalleria\Model\Table\BlogsTable|\Cake\ORM\Association\HasMany $Blogs
 * @property \Kissagalleria\Model\Table\ExhibitionsTable|\Cake\ORM\Association\HasMany $Exhibitions
 * @property \Kissagalleria\Model\Table\PhotosTable|\Cake\ORM\Association\HasMany $Photos
 * @property \Kissagalleria\Model\Table\UsersTable|\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \Kissagalleria\Model\Entity\Cat get($primaryKey, $options = [])
 * @method \Kissagalleria\Model\Entity\Cat newEntity($data = null, array $options = [])
 * @method \Kissagalleria\Model\Entity\Cat[] newEntities(array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\Cat|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Kissagalleria\Model\Entity\Cat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\Cat[] patchEntities($entities, array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\Cat findOrCreate($search, callable $callback = null, $options = [])
 */
class CatsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->addBehavior('Media.Media', [
          'path' => '../../img/Cats/%f',  // default upload path relative to webroot folder (see below for path parameters)
          'extensions' => ['jpg','png','gif','bmp','pdf','nef'],
#          'extensions' => ['jpg', 'png'],   // array of authorized extensions (lowercase)
          'limit' => 0,           // limit number of upload file. Default: 0 (no limit)
          'max_width' => 0,         // maximum authorized width for uploaded pictures. Default: 0 (no limitation) 
          'max_height' => 0,          // maximum authorized height for uploaded pictures. Default: 0 (no limitation)
          'size' => 0             // maximum autorized size for uploaded pictures (in kb). Default: 0 (no limitation)
          ]
        );

        $this->setTable('cats');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Breeds', [
            'foreignKey' => 'breed_id',
            'joinType' => 'INNER',
            'className' => 'Kissagalleria.Breeds'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'className' => 'Kissagalleria.Users'
        ]);
        $this->hasMany('Exhibitions', [
            'foreignKey' => 'cat_id',
            'className' => 'Kissagalleria.Exhibitions'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'cat_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'cats_users',
            'className' => 'Kissagalleria.Users'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('breeder')
            ->allowEmpty('breeder');

        $validator
            ->scalar('alias')
            ->allowEmpty('alias');

        $validator
            ->scalar('number')
            ->allowEmpty('number');

        $validator
            ->scalar('color')
            ->allowEmpty('color');

        $validator
            ->scalar('gender')
            ->allowEmpty('gender');

        $validator
            ->allowEmpty('castrated');

        $validator
            ->scalar('bloodtype')
            ->allowEmpty('bloodtype');

        $validator
            ->date('birthdate')
            ->allowEmpty('birthdate');

        $validator
            ->date('deathdate')
            ->allowEmpty('deathdate');

        $validator
            ->scalar('motherbreeder')
            ->allowEmpty('motherbreeder');

        $validator
            ->scalar('mothername')
            ->allowEmpty('mothername');

        $validator
            ->scalar('mothernumber')
            ->allowEmpty('mothernumber');

        $validator
            ->scalar('fatherbreeder')
            ->allowEmpty('fatherbreeder');

        $validator
            ->scalar('fathername')
            ->allowEmpty('fathername');

        $validator
            ->scalar('fathernumber')
            ->allowEmpty('fathernumber');

        $validator
            ->dateTime('date')
            ->allowEmpty('date');

        $validator
            ->scalar('ems')
            ->allowEmpty('ems');

        $validator
            ->scalar('text')
            ->allowEmpty('text');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['breed_id'], 'Breeds'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
