<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Office
 * @package App\Models
 *
 * @property int $id
 * @property string $address
 * @property array $coordinates
 */
class Office extends Model
{
    public $timestamps = null;
    protected $casts = [
        'coordinates' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'offices_groups', 'office_id', 'group_id');
    }

}
