<?php
namespace Kissagalleria\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cat Entity
 *
 * @property int $id
 * @property string $name
 * @property string $breeder
 * @property string $alias
 * @property string $number
 * @property string $color
 * @property string $gender
 * @property int $castrated
 * @property string $bloodtype
 * @property \Cake\I18n\FrozenDate $birthdate
 * @property \Cake\I18n\FrozenDate $deathdate
 * @property string $motherbreeder
 * @property string $mothername
 * @property string $mothernumber
 * @property string $fatherbreeder
 * @property string $fathername
 * @property string $fathernumber
 * @property \Cake\I18n\FrozenTime $date
 * @property string $ems
 * @property string $text
 * @property string $breed_id
 * @property int $user_id
 *
 * @property \Kissagalleria\Model\Entity\Breed $breed
 * @property \Kissagalleria\Model\Entity\User[] $users
 * @property \Kissagalleria\Model\Entity\BlogPost[] $blog_posts
 * @property \Kissagalleria\Model\Entity\Blog[] $blogs
 * @property \Kissagalleria\Model\Entity\Exhibition[] $exhibitions
 * @property \Kissagalleria\Model\Entity\Photo[] $photos
 */
class Cat extends Entity
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
