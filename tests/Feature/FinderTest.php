<?php

namespace Tests\Feature;

use App\Helpers\FinderGroup;
use App\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FinderTest extends TestCase
{
    use RefreshDatabase;
    protected $isSet = false;

    //public $connectionsToTransact = true;

    protected function setUp(): void
    {
        parent::setUp();

        $this->refreshDatabase();
    }

    /**
     * A basic test example.
     * @return void
     */
    public function testFirst()
    {
        $this->seed();

        $data =  [
            'birthDate' => now()->setYear(2005)->toW3cString(),
            'timeEducation' => 1,
            'coords' => [58.000870, 56.175850],
        ];
        $expected =  [
            '{"number":7,"min_age":14,"max_age":18,"days":[2,4],"start":"19:00:00","end":"20:30:00"}',
            '{"number":8,"min_age":14,"max_age":18,"days":[2,4],"start":"19:00:00","end":"20:30:00"}',
            '{"number":9,"min_age":14,"max_age":18,"days":[2,4],"start":"19:00:00","end":"20:30:00"}',
        ];

        $finder = new FinderGroup();
        $result = $finder->find($data)->values();
        $this->assertEquals(count($expected), $result->count());

        foreach ($result as $key => $group) {
            /** @var Group $group */
            $group->addHidden('created_at', 'updated_at', 'id');
            $this->assertSame(json_decode($expected[$key], true), $group->attributesToArray());
        }
    }

    public function testSecond()
    {
        $this->seed();

        $data =  [
            'birthDate' => now()->setYear(2007)->toW3cString(),
            'timeEducation' => 2,
            'coords' => [58.000870, 56.175850],
        ];
        $expected =  [
            '{"number":1,"min_age":7,"max_age":13,"days":[1,3],"start":"09:00:00","end":"10:30:00"}',
            '{"number":2,"min_age":7,"max_age":13,"days":[1,3],"start":"09:00:00","end":"10:30:00"}',
            '{"number":3,"min_age":7,"max_age":13,"days":[1,3],"start":"09:00:00","end":"10:30:00"}',
            '{"number":14,"min_age":7,"max_age":13,"days":[1,3],"start":"12:00:00","end":"13:30:00"}',
            '{"number":15,"min_age":7,"max_age":13,"days":[1,3],"start":"12:00:00","end":"13:30:00"}',
        ];

        $finder = new FinderGroup();
        $result = $finder->find($data)->values();
        $this->assertEquals(count($expected), $result->count());
        foreach ($result as $key => $group) {
            /** @var Group $group */
            $group->addHidden('created_at', 'updated_at', 'id');
            $this->assertSame(json_decode($expected[$key], true), $group->attributesToArray());
        }
    }

}
