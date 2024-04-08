<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Menuitem Entity
 *
 * @property int $menuitem_id
 * @property string $menuitem_desc
 * @property float $menuitem_price
 * @property float $menuitem_rating
 * @property string $menuitem_name
 *
 * @property \App\Model\Entity\Order[] $orders
 */
class Menuitem extends Entity
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
        'menuitem_desc' => true,
        'menuitem_price' => true,
        'menuitem_rating' => true,
        'menuitem_name' => true,
        'orders' => true,
    ];
}
