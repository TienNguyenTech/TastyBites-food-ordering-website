<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrdersMenuitems Model
 *
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \App\Model\Table\MenuitemsTable&\Cake\ORM\Association\BelongsTo $Menuitems
 *
 * @method \App\Model\Entity\OrdersMenuitem newEmptyEntity()
 * @method \App\Model\Entity\OrdersMenuitem newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\OrdersMenuitem> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrdersMenuitem get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\OrdersMenuitem findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\OrdersMenuitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\OrdersMenuitem> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrdersMenuitem|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\OrdersMenuitem saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\OrdersMenuitem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrdersMenuitem>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\OrdersMenuitem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrdersMenuitem> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\OrdersMenuitem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrdersMenuitem>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\OrdersMenuitem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\OrdersMenuitem> deleteManyOrFail(iterable $entities, array $options = [])
 */
class OrdersMenuitemsTable extends Table
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

        $this->setTable('orders_menuitems');
        $this->setDisplayField(['menuitem_id', 'order_id']);
        $this->setPrimaryKey(['menuitem_id', 'order_id']);

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Menuitems', [
            'foreignKey' => 'menuitem_id',
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
            ->integer('om_quantity')
            ->requirePresence('om_quantity', 'create')
            ->notEmptyString('om_quantity');

        $validator
            ->numeric('om_price')
            ->requirePresence('om_price', 'create')
            ->notEmptyString('om_price');

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
        $rules->add($rules->existsIn(['menuitem_id'], 'Menuitems'), ['errorField' => 'menuitem_id']);

        return $rules;
    }
}
