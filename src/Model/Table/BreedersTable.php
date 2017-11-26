<?php
namespace Kissagalleria\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Breeders Model
 *
 * @property \Kissagalleria\Model\Table\UsersTable|\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \Kissagalleria\Model\Entity\Breeder get($primaryKey, $options = [])
 * @method \Kissagalleria\Model\Entity\Breeder newEntity($data = null, array $options = [])
 * @method \Kissagalleria\Model\Entity\Breeder[] newEntities(array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\Breeder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Kissagalleria\Model\Entity\Breeder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\Breeder[] patchEntities($entities, array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\Breeder findOrCreate($search, callable $callback = null, $options = [])
 */
class BreedersTable extends Table
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

        $this->setTable('breeders');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Users', [
            'foreignKey' => 'breeder_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'breeders_users',
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
            ->requirePresence('id', 'create')
            ->notEmpty('id');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
