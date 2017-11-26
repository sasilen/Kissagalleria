<?php
namespace Kissagalleria\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Breeds Model
 *
 * @property \Kissagalleria\Model\Table\CatsTable|\Cake\ORM\Association\HasMany $Cats
 *
 * @method \Kissagalleria\Model\Entity\Breed get($primaryKey, $options = [])
 * @method \Kissagalleria\Model\Entity\Breed newEntity($data = null, array $options = [])
 * @method \Kissagalleria\Model\Entity\Breed[] newEntities(array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\Breed|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Kissagalleria\Model\Entity\Breed patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\Breed[] patchEntities($entities, array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\Breed findOrCreate($search, callable $callback = null, $options = [])
 */
class BreedsTable extends Table
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

        $this->setTable('breeds');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Cats', [
            'foreignKey' => 'breed_id',
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
            ->scalar('id')
            ->requirePresence('id', 'create')
            ->notEmpty('id');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('text')
            ->allowEmpty('text');

        return $validator;
    }
}
