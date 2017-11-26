<?php
namespace Kissagalleria\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property string $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $token
 * @property \Cake\I18n\FrozenTime $token_expires
 * @property string $api_token
 * @property \Cake\I18n\FrozenTime $activation_date
 * @property string $secret
 * @property bool $secret_verified
 * @property \Cake\I18n\FrozenTime $tos_date
 * @property bool $active
 * @property bool $is_superuser
 * @property string $role
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \Kissagalleria\Model\Entity\Usergroup $usergroup
 * @property \Kissagalleria\Model\Entity\Breeder[] $breeders
 * @property \Kissagalleria\Model\Entity\BlogPost[] $blog_posts
 * @property \Kissagalleria\Model\Entity\Blog[] $blogs
 * @property \Kissagalleria\Model\Entity\Cat[] $cats
 * @property \Kissagalleria\Model\Entity\Comment[] $comments
 * @property \Kissagalleria\Model\Entity\Commentsold[] $commentsold
 * @property \Kissagalleria\Model\Entity\Photo[] $photos
 * @property \Kissagalleria\Model\Entity\Post[] $posts
 * @property \Kissagalleria\Model\Entity\Vet[] $vets
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token'
    ];
}
