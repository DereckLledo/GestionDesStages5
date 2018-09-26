<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InternshipOffer Entity
 *
 * @property int $id
 * @property int $id_official
 * @property string $title
 * @property string $description
 * @property string $task
 * @property bool $remuneration
 * @property float $number_of_hour
 * @property string $category
 */
class InternshipOffer extends Entity
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
        'id_official' => true,
        'title' => true,
        'description' => true,
        'task' => true,
        'remuneration' => true,
        'number_of_hour' => true,
        'category' => true
    ];
}
