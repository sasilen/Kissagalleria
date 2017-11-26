<?php
namespace Kissagalleria\Model\Entity;

use Cake\ORM\Entity;

/**
 * Exhibition Entity
 *
 * @property int $id
 * @property int $cat_id
 * @property string $name
 * @property \Cake\I18n\FrozenDate $date
 * @property string $place
 * @property string $ems
 * @property string $class
 * @property string $result
 * @property string $judge
 *
 * @property \Kissagalleria\Model\Entity\Cat $cat
 */
class Exhibition extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
