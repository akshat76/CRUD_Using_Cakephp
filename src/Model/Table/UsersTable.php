<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
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

        $this->setTable('users');
        $this->setDisplayField('id');
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
            ->allowEmpty('Photo');

        $validator
            ->requirePresence('First_Name', 'create')
            ->notEmpty('First_Name');

        $validator
            ->allowEmpty('Last_Name');

        $validator
            ->requirePresence('Username', 'create')
            ->notEmpty('Username')
            ->add('Username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('Email', 'create')
            ->notEmpty('Email');

        $validator
            ->requirePresence('Password', 'create')
            ->notEmpty('Password');

        $validator
            ->requirePresence('Gender', 'create')
            ->notEmpty('Gender');

        $validator
            ->allowEmpty('Company');

        $validator
            ->allowEmpty('Address_1');

        $validator
            ->allowEmpty('Address_2');

        $validator
            ->requirePresence('City', 'create')
            ->notEmpty('City');

        $validator
            ->requirePresence('Zip_Code', 'create')
            ->notEmpty('Zip_Code');

        $validator
            ->requirePresence('Mobile_No', 'create')
            ->notEmpty('Mobile_No');

        $validator
            ->requirePresence('DOB', 'create')
            ->notEmpty('DOB');

        $validator
            ->allowEmpty('Interest');

        $validator
            ->allowEmpty('Description');

        $validator
            ->allowEmpty('Rating');

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
        $rules->add($rules->isUnique(['Username']));

        return $rules;
    }
}
