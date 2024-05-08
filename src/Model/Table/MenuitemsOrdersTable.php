<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MenuitemsOrders Model
 *
 * @property \App\Model\Table\MenuitemsTable&\Cake\ORM\Association\BelongsTo $Menuitems
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 *
 * @method \App\Model\Entity\MenuitemsOrder newEmptyEntity()
 * @method \App\Model\Entity\MenuitemsOrder newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\MenuitemsOrder> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MenuitemsOrder get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\MenuitemsOrder findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\MenuitemsOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\MenuitemsOrder> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MenuitemsOrder|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\MenuitemsOrder saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\MenuitemsOrder>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MenuitemsOrder>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MenuitemsOrder>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MenuitemsOrder> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MenuitemsOrder>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MenuitemsOrder>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MenuitemsOrder>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MenuitemsOrder> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MenuitemsOrdersTable extends Table
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

        $this->setTable('menuitems_orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Menuitems', [
            'foreignKey' => 'menuitem_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('menuitem_id')
            ->notEmptyString('menuitem_id');

        $validator
            ->integer('order_id')
            ->notEmptyString('order_id');

        $validator
            ->integer('quantity')
            ->notEmptyString('quantity');

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
        $rules->add($rules->existsIn(['menuitem_id'], 'Menuitems'), ['errorField' => 'menuitem_id']);
        $rules->add($rules->existsIn(['order_id'], 'Orders'), ['errorField' => 'order_id']);

        return $rules;
    }
}
