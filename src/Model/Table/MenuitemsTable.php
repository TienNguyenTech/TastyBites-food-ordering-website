<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Menuitems Model
 *
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsToMany $Orders
 *
 * @method \App\Model\Entity\Menuitem newEmptyEntity()
 * @method \App\Model\Entity\Menuitem newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Menuitem> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Menuitem get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Menuitem findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Menuitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Menuitem> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Menuitem|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Menuitem saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Menuitem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Menuitem>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Menuitem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Menuitem> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Menuitem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Menuitem>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Menuitem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Menuitem> deleteManyOrFail(iterable $entities, array $options = [])
 */
class MenuitemsTable extends Table
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

        $this->setTable('menuitems');
        $this->setDisplayField('menuitem_desc');
        $this->setPrimaryKey('menuitem_id');

        $this->belongsToMany('Orders', [
            'foreignKey' => 'menuitem_id',
            'targetForeignKey' => 'order_id',
            'joinTable' => 'menuitems_orders',
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
            ->scalar('menuitem_name')
            ->maxLength('menuitem_name', 50)
            ->requirePresence('menuitem_name', 'create')
            ->notEmptyString('menuitem_name');

        $validator
            ->scalar('menuitem_image')
            ->maxLength('menuitem_image', 200)
            ->requirePresence('menuitem_image', 'create')
            ->notEmptyFile('menuitem_image');

        $validator
            ->scalar('menuitem_desc')
            ->maxLength('menuitem_desc', 200)
            ->requirePresence('menuitem_desc', 'create')
            ->notEmptyString('menuitem_desc');

        $validator
            ->numeric('menuitem_price')
            ->requirePresence('menuitem_price', 'create')
            ->notEmptyString('menuitem_price');

        return $validator;
    }
}
