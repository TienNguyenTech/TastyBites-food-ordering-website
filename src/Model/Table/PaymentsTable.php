<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Payments Model
 *
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 *
 * @method \App\Model\Entity\Payment newEmptyEntity()
 * @method \App\Model\Entity\Payment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Payment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Payment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Payment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Payment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Payment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Payment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Payment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Payment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Payment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Payment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Payment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Payment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Payment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Payment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Payment> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PaymentsTable extends Table
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

        $this->setTable('payments');
        $this->setDisplayField('payment_id');
        $this->setPrimaryKey('payment_id');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('payment_amount')
            ->requirePresence('payment_amount', 'create')
            ->notEmptyString('payment_amount');

        $validator
            ->integer('card_number')
            ->requirePresence('card_number', 'create')
            ->notEmptyString('card_number')
            ->numeric('card_number', 'Card Number must contain only number')
            ->lengthBetween('card_number', [16, 16], 'Card Number must be exactly 16 digits');

        $validator
            ->integer('card_expiry')
            ->requirePresence('card_expiry', 'create')
            ->notEmptyString('card_expiry')
            ->numeric('card_expiry', 'Expiry Date must contain only number')
            ->lengthBetween('card_expiry', [4, 4], 'Expiry Date must be exactly 4 digits (MMYY)');

        $validator
            ->integer('card_cvc')
            ->requirePresence('card_cvc', 'create')
            ->notEmptyString('card_cvc')
            ->numeric('card_cvc', 'Security Code must contain only numbers')
            ->lengthBetween('card_cvc', [3, 4], 'Security code must be either 3 or 4 digits');

        $validator
            ->integer('order_id')
            ->notEmptyString('order_id');

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
        $rules->add($rules->existsIn(['order_id'], 'Orders'), ['errorField' => 'order_id']);

        return $rules;
    }
}
