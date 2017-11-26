<?php
namespace Kissagalleria\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Medias Model
 *
 * @property \Kissagalleria\Model\Table\RevesTable|\Cake\ORM\Association\BelongsTo $Reves
 *
 * @method \Kissagalleria\Model\Entity\Media get($primaryKey, $options = [])
 * @method \Kissagalleria\Model\Entity\Media newEntity($data = null, array $options = [])
 * @method \Kissagalleria\Model\Entity\Media[] newEntities(array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\Media|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Kissagalleria\Model\Entity\Media patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\Media[] patchEntities($entities, array $data, array $options = [])
 * @method \Kissagalleria\Model\Entity\Media findOrCreate($search, callable $callback = null, $options = [])
 */
class MediasTable extends Table
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

        $this->setTable('medias');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->scalar('ref')
            ->requirePresence('ref', 'create')
            ->notEmpty('ref');

        $validator
            ->scalar('file')
            ->requirePresence('file', 'create')
            ->notEmpty('file');

        $validator
            ->scalar('name')
            ->allowEmpty('name');

        $validator
            ->integer('position')
            ->requirePresence('position', 'create')
            ->notEmpty('position');

        $validator
            ->scalar('caption')
            ->allowEmpty('caption');

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
        return $rules;
    }
}
