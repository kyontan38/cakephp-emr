<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Patients Model
 *
 * @method \App\Model\Entity\Patient newEmptyEntity()
 * @method \App\Model\Entity\Patient newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Patient> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Patient get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Patient findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Patient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Patient> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Patient|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Patient saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Patient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Patient>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Patient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Patient> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Patient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Patient>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Patient>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Patient> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PatientsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('patients');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        // 患者番号
        $validator
            ->scalar('patient_number')
            ->maxLength('patient_number', 20)
            ->requirePresence('patient_number', 'create')
            ->notEmptyString('patient_number');

        // 氏名
        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        // フリガナ
        $validator
            ->scalar('name_kana')
            ->maxLength('name_kana', 100)
            ->requirePresence('name_kana', 'create')
            ->notEmptyString('name_kana');

        // 生年月日
        $validator
            ->date('birth_date')
            ->requirePresence('birth_date', 'create')
            ->notEmptyDate('birth_date');

        // 性別
        $validator
            ->scalar('gender')
            ->maxLength('gender', 10)
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');

        // 郵便番号
        $validator
            ->scalar('postal_code')
            ->maxLength('postal_code', 10)
            ->allowEmptyString('postal_code');

        // 住所
        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmptyString('address');

        // 電話番号
        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->allowEmptyString('phone');

        // 備考
        $validator
            ->scalar('note')
            ->allowEmptyString('note');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
       // 患者番号の重複を防ぐ
       $rules->add(
        $rules->isUnique(['patient_number']),
        ['errorField' => 'patient_number']
       );

       return $rules;
    }
}
