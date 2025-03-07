<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $order_id
 * @property \Cake\I18n\DateTime $order_datetime
 * @property string $order_status
 * @property string $customer_name
 * @property string $customer_email
 * @property string $customer_phone
 *
 * @property \App\Model\Entity\Menuitem[] $menuitems
 */
class Order extends Entity
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
        'order_datetime' => true,
        'order_status' => true,
        'customer_name' => true,
        'customer_email' => true,
        'customer_phone' => true,
        'menuitems' => true,
    ];
}
