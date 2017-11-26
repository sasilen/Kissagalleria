<?php
namespace Kissagalleria\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exhibitions Model
 *
 * @property \Kissagalleria\Model\Table\CatsTable|\Cake\ORM\Association\BelongsTo $Cats
 *
 * @method \Kissagalleria\Model\Entity\Exhibition get($primaryKey, $options = [])
 * @method \Kissagalleria\Model\Entity\Exhibition newEntity($data = null, array $options = [])
 * @method \Kissagalleria\Model\Entity\Exhibition[] newEntities(array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\Exhibition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Kissagalleria\Model\Entity\Exhibition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\Exhibition[] patchEntities($entities, array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\Exhibition findOrCreate($search, callable $callback = null, $options = [])
 */
class ExhibitionsTable extends Table
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

        $this->setTable('exhibitions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cats', [
            'foreignKey' => 'cat_id',
            'joinType' => 'INNER',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->scalar('place')
            ->allowEmpty('place');

        $validator
            ->scalar('ems')
            ->allowEmpty('ems');

        $validator
            ->scalar('class')
            ->allowEmpty('class');

        $validator
            ->scalar('result')
            ->allowEmpty('result');

        $validator
            ->scalar('judge')
            ->allowEmpty('judge');

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
        $rules->add($rules->existsIn(['cat_id'], 'Cats'));

        return $rules;
    }
}
