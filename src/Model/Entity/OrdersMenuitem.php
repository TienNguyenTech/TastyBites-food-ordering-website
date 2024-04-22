<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrdersMenuitem Entity
 *
 * @property int $order_id
 * @property int $menuitem_id
 * @property int $om_quantity
 * @property float $om_price
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Menuitem $menuitem
 */
class OrdersMenuitem extends Entity
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
        'om_quantity' => true,
        'om_price' => true,
        'order' => true,
        'menuitem' => true,
    ];
}
