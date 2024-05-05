<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MenuitemsOrder Entity
 *
 * @property int $id
 * @property int $menuitem_id
 * @property int $order_id
 * @property int $quantity
 *
 * @property \App\Model\Entity\Menuitem $menuitem
 * @property \App\Model\Entity\Order $order
 */
class MenuitemsOrder extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'menuitem_id' => true,
        'order_id' => true,
        'quantity' => true,
        'menuitem' => true,
        'order' => true,
    ];
}
