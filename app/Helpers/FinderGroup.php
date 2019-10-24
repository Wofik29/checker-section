<?php


namespace App\Helpers;


use App\Models\Group;
use App\Models\Office;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FinderGroup
{
    protected $timeEducation = [
        1 => [
            'startFree' => '13:30',
            'endFree' => '22:00',
        ],
        2 => [
            'startFree' => '8:00',
            'endFree' => '14:00',
        ],
    ];

    public function find($data)
    {
        $birthDay = $data['birthDate'];
        $timeEducation = $data['timeEducation'];

        $age = now()->diffInYears(Carbon::parse($birthDay));
        $time = $this->timeEducation[$timeEducation];

        $query = Group::query()
            ->with('office')
            ->where('min_age', '<=', $age)
            ->where('max_age', '>=', $age);

        if ($timeEducation == 1) {
            $query->where('start', '>=', $time['startFree']);
        } else {
            $query->where('end', '<=', $time['endFree']);
        }

        $groups = $query->get();
        $offices = $groups->pluck('office')->collapse()->unique('id');
        $office = $this->getNearOffice($data['coords'], $offices);


        return $groups->filter(function($item) use ($office) {
            /** @var Group $item */
            return in_array( $office->number, $item->office()->pluck('offices.number')->toArray());
        });
    }

    public function getNearOffice($coords, $offices = null)
    {
        /** @var Office[] $offices */
        $offices = $offices && empty($offices) ? $offices : Office::all();
        $max = INF;
        $resultOffice = $offices[0];

        foreach ($offices as $office) {
            $length = hypot(abs($office->coordinates[0] - $coords[0]), abs($office->coordinates[1] - $coords[1]));
            if ($length < $max) {
                $max = $length;
                $resultOffice = $office;
            }
        }

        return $resultOffice;
    }
}
