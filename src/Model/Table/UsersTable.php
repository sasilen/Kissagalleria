<?php
namespace Kissagalleria\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Kissagalleria\Model\Table\CatsTable|\Cake\ORM\Association\HasMany $Cats
 * @property |\Cake\ORM\Association\HasMany $SocialAccounts
 * @property \Kissagalleria\Model\Table\BreedersTable|\Cake\ORM\Association\BelongsToMany $Breeders
 * @property \Kissagalleria\Model\Table\CatsTable|\Cake\ORM\Association\BelongsToMany $Cats
 *
 * @method \Kissagalleria\Model\Entity\User get($primaryKey, $options = [])
 * @method \Kissagalleria\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \Kissagalleria\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Kissagalleria\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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
          'path' => '../../img/Users/%f',  // default upload path relative to webroot folder (see below for path parameters)
          'extensions' => ['jpg','png','gif','bmp','pdf','nef'],
          #          'extensions' => ['jpg', 'png'],   // array of authorized extensions (lowercase)
          'limit' => 0,           // limit number of upload file. Default: 0 (no limit)
          'max_width' => 0,         // maximum authorized width for uploaded pictures. Default: 0 (no limitation) 
          'max_height' => 0,          // maximum authorized height for uploaded pictures. Default: 0 (no limitation)
          'size' => 0             // maximum autorized size for uploaded pictures (in kb). Default: 0 (no limitation)
        ]);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Cats', [
            'foreignKey' => 'user_id',
            'className' => 'Kissagalleria.Cats'
        ]);
        $this->hasMany('SocialAccounts', [
            'foreignKey' => 'user_id',
            'className' => 'Kissagalleria.SocialAccounts'
        ]);
        $this->belongsToMany('Breeders', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'breeder_id',
            'joinTable' => 'breeders_users',
            'className' => 'Kissagalleria.Breeders'
        ]);
        $this->belongsToMany('Cats', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'cat_id',
            'joinTable' => 'cats_users',
            'className' => 'Kissagalleria.Cats'
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('username')
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('first_name')
            ->allowEmpty('first_name');

        $validator
            ->scalar('last_name')
            ->allowEmpty('last_name');

        $validator
            ->scalar('token')
            ->allowEmpty('token');

        $validator
            ->dateTime('token_expires')
            ->allowEmpty('token_expires');

        $validator
            ->scalar('api_token')
            ->allowEmpty('api_token');

        $validator
            ->dateTime('activation_date')
            ->allowEmpty('activation_date');

        $validator
            ->scalar('secret')
            ->allowEmpty('secret');

        $validator
            ->boolean('secret_verified')
            ->allowEmpty('secret_verified');

        $validator
            ->dateTime('tos_date')
            ->allowEmpty('tos_date');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        $validator
            ->boolean('is_superuser')
            ->requirePresence('is_superuser', 'create')
            ->notEmpty('is_superuser');

        $validator
            ->scalar('role')
            ->allowEmpty('role');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
