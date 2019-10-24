<?php

namespace App\Http\Controllers;

use App\Connector\DadataConnector;
use App\Helpers\FinderGroup;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class GroupController extends Controller
{
    public function suggestion(Request $request)
    {
        $data = $request->validate([
            'parentName' => 'required',
            'parentPhone' => 'required',
            'childName' => 'required',
            'birthDate' => 'required',
            'address' => 'required',
            'timeEducation' => 'required',
        ]);

        if (Carbon::parse($data['birthDate']) > now()) {
            throw new BadRequestHttpException('Дата не может быть больше текущей');
        }

        $connector = new DadataConnector();
        $city = $connector->getCity($data['address']);
        if (empty($city))
            throw new BadRequestHttpException('Город не найден!');

        $data['coords'] = [$city[0]['data']['geo_lat'], $city[0]['data']['geo_lon']];

        $finder = new FinderGroup();
        $groups = $finder->find($data);
        $office = $groups->count() ? $groups->first()->office : null;

        return ['result' => true,
            'groups' => $groups->map(function ($item) {
                /** @var $item Group */
                return $item->only(['number', 'max_age', 'min_age', 'days', 'start', 'end']) + ['offices' => $item->office->pluck('number')->toArray()];
            }),
            'offices' => $office ? $office->toArray() : null,
        ];
    }
}
