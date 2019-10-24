<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Office
 * @package App\Models
 *
 * @property int $id
 * @property int $number
 * @property int $min_age
 * @property int $max_age
 * @property array $days
 * @property string $start
 * @property string $end
  */
class Group extends Model
{
    const DAY_MON = 1;
    const DAY_TUE = 2;
    const DAY_WED = 3;
    const DAY_THU = 4;
    const DAY_FRI = 5;

    protected $casts = [
        'days' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function office()
    {
        return $this->belongsToMany(Office::class, 'offices_groups', 'group_id', 'office_id', 'number', 'number');
    }

}
