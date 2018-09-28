<?php
namespace App\Model\Entity;

use Cake\ORM\Behavior\Translate\TranslateTrait;
use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property int $author_id
 * @property int $province_id
 * @property string $title
 * @property string $release_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Author $author
 * @property \App\Model\Entity\Province $province
 * @property \App\Model\Entity\Category[] $categories
 */
class Book extends Entity
{

use TranslateTrait;
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
        'author_id' => true,
        'province_id' => true,
        'title' => true,
        'release_date' => true,
        'created' => true,
        'modified' => true,
        'author' => true,
        'province' => true,
        'categories' => true
    ];
}
