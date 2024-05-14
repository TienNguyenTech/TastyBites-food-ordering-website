<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @property \App\Model\Table\MenuitemsTable&\Cake\ORM\Association\BelongsToMany $Menuitems
 * @property \App\Model\Table\MenuitemsOrdersTable&\Cake\ORM\Association\BelongsToMany $MenuitemsOrders
 *
 * @method \App\Model\Entity\Order newEmptyEntity()
 * @method \App\Model\Entity\Order newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Order> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Order findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Order> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Order saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Order>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Order>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Order>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Order> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Order>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Order>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Order>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Order> deleteManyOrFail(iterable $entities, array $options = [])
 */
class OrdersTable extends Table
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

        $this->setTable('orders');
        $this->setDisplayField('order_id');
        $this->setPrimaryKey('order_id');

        $this->belongsToMany('Menuitems', [
            'foreignKey' => 'order_id',
            'targetForeignKey' => 'menuitem_id',
            'joinTable' => 'menuitems_orders',
        ]);

        $this->belongsToMany('MenuitemsOrders', [
            'foreignKey' => 'order_id',
            'targetForeignKey' => 'order_id'
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
            ->dateTime('order_datetime')
            ->notEmptyDateTime('order_datetime');

        $validator
            ->scalar('order_status')
            ->maxLength('order_status', 20)
            ->notEmptyString('order_status');

        $validator
            ->scalar('customer_name')
            ->maxLength('customer_name', 100)
            ->requirePresence('customer_name', 'create')
            ->notEmptyString('customer_name');

        $validator
            ->scalar('customer_email')
            ->maxLength('customer_email', 100)
            ->requirePresence('customer_email', 'create')
            ->notEmptyString('customer_email')
            ->add('customer_email', [
                'validFormat' => [
                    'rule' => ['custom', '/\b[\w\.-]+@[\w\.-]+\.\w{2,4}\b/'],
                    'message' => 'Please enter a valid email address.'
                ]
            ]);


        $validator
            ->scalar('customer_phone')
            ->maxLength('customer_phone', 10)
            ->requirePresence('customer_phone', 'create')
            ->notEmptyString('customer_phone')
            ->add('customer_phone', [
                'validFormat' => [
                    'rule' => ['custom', '/^((\+61\s?)?(\((0|02|03|04|07|08)\))?)?\s?\d{1,4}\s?\d{1,4}\s?\d{0,4}$/'],
                    'message' => 'Please enter a valid phone number.'
                ]
            ]);

        return $validator;
    }
}
