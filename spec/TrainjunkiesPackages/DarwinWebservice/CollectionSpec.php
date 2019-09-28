<?php

namespace spec\TrainjunkiesPackages\DarwinWebservice;

use TrainjunkiesPackages\DarwinWebservice\Collection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $data = [
            'Pendolino',
            'HST',
            'A4 Paccific',
            'Pacer'
        ];

        $this->beConstructedWith($data);
        $this->shouldHaveType(Collection::class);
    }

    function it_can_be_initialized_staticlly()
    {
        $data = [
            'Pendolino',
            'HST',
            'A4 Paccific',
            'Pacer'
        ];

        $this->beConstructedThrough('make', [$data]);
        $this->shouldHaveType(Collection::class);
    }

    function it_can_count_items()
    {
        $data = [
            'Pendolino',
            'HST',
            'A4 Paccific',
            'Pacer'
        ];

        $this->beConstructedWith($data);
        $this->shouldImplement(\Countable::class);

        $this->shouldHaveCount(4);
    }

    function it_is_iterable()
    {
        $this->beConstructedWith([1,2,3,4,5]);
        $this->shouldImplement(\IteratorAggregate::class);
    }

    function it_has_array_features()
    {
        $data = ['one', 'two', 'three', 'four'];

        $this->beConstructedWith($data);
        $this->shouldImplement(\ArrayAccess::class);

        $this->offsetExists(1)->shouldBe(true);
        $this->offsetGet(2)->shouldBe('three');

        $this->offsetUnset(0);
    }

    function it_can_apply_a_function_to_each_item()
    {
        $data = [
            'Pendolino',
            'HST',
            'A4 Pacific',
            'Pacer'
        ];

        $this->beConstructedWith($data);

        $function = function($item, $key) {
            return sprintf(
                'Train "%s" with Index "%s"',
                $item,
                $key
            );
        };

        $this->each($function);

        $expectedCollection = Collection::make([
            'Pendolino',
            'HST',
            'A4 Pacific',
            'Pacer'
        ]);

        $this->shouldBeLike($expectedCollection);
    }

    function it_can_map_items()
    {
        $data = [
            [
                'brand_name' => "Pendolino",
                'toc' => "Virgin Trains"
            ],
            [
                'brand_name' => "Azuma",
                'toc' => "Virgin Trains East Coast"
            ],
            [
                'brand_name' => "Javelin",
                'toc' => "Southern High Speed"
            ]
        ];

        $this->beConstructedWith($data);

        $function = function($item) {
            return $item['brand_name'];
        };

        $expectedCollection = Collection::make([
            "Pendolino",
            "Azuma",
            "Javelin",
        ]);

        $this->map($function)->shouldBeLike($expectedCollection);
    }

    function it_can_filter_items()
    {
        $data = [
            [
                'br_class' => '220',
                'toc' => 'East Midlands Trains'
            ],
            [
                'br_class' => '220',
                'toc' => 'CrossCountry'
            ],
            [
                'br_class' => '390',
                'toc' => 'Virgin Trains'
            ],
            [
                'br_class' => '221',
                'toc' => 'Virgin Trains'
            ]
        ];

        $this->beConstructedWith($data);

        $function = function($item) {
            return $item['br_class'] === '220';
        };

        $expectedCollection = Collection::make([
            [
                'br_class' => '220',
                'toc'      => 'East Midlands Trains'
            ],
            [
                'br_class' => '220',
                'toc'      => 'CrossCountry'
            ]
        ]);

        $this->filter($function)->shouldBeLike($expectedCollection);
    }

    function it_can_reject_items()
    {
        $actual = [
            0 => 'HST',
            1 => 'Pendolino',
            2 => 'Union of South Africa',
            3 => 'Azuma',
            4 => 'Deltic'
        ];

        $expected = [
            0 => 'HST',
            1=> 'Pendolino',
            2 => 'Union of South Africa',
            4 => 'Deltic'
        ];

        $this->beConstructedWith($actual);

        $function = function($train) {
            return $train === 'Azuma';
        };

        $expectedCollection = Collection::make($expected);

        $this->reject($function)->shouldBeLike($expectedCollection);
    }

    function it_has_empty_data_set()
    {
        $this->beConstructedWith([]);

        $this->isEmpty()->shouldBe(true);
    }

    function it_can_create_assoc_array()
    {
        $this->beConstructedWith([
            ['VT', 'Pendolino'],
            ['XC', 'Voyager'],
            ['EM', 'Meridian']
        ]);

        $actual = $this->toAssoc();

        $actual->shouldBeLike([
            'VT' => 'Pendolino',
            'XC' => 'Voyager',
            'EM' => 'Meridian'
        ]);
    }

    function it_can_sort_by_desc()
    {
        $data = [
            [
                'uid'           => 'C1234',
                'stp_indicator' => 'P'
            ],
            [
                'uid'           => 'C2345',
                'stp_indicator' => 'C'
            ],
            [
                'uid'           => 'C2345',
                'stp_indicator' => 'O'
            ]
        ];

        $this->beConstructedWith($data);

        $function = function($a, $b) {
            $result = $a['stp_indicator'] > $b['stp_indicator'];
            return $result;
        };

        $expectedCollection = Collection::make([
            1 => [
                'uid'           => 'C2345',
                'stp_indicator' => 'C'
            ],
            2=> [
                'uid'           => 'C2345',
                'stp_indicator' => 'O'
            ],
            0 => [
                'uid'           => 'C1234',
                'stp_indicator' => 'P'
            ]
        ]);

        $this->sortBy($function)->shouldBeLike($expectedCollection);
    }

    function it_can_reset_keys()
    {
        $actual = [
            1 => 'One',
            3 => 'Two',
            4 => 'Three'
        ];

        $expected = [
            0 => 'One',
            1 => 'Two',
            2 => 'Three'
        ];

        $this->beConstructedWith($actual);
        $this->resetKeys()
            ->toArray()
            ->shouldBe($expected);

    }

    function it_can_json_serializable()
    {
        $actual = [
            'HST',
            'Union of South Africa',
            'Pendolino'
        ];

        $this->beConstructedWith($actual);
        $this->shouldImplement(\JsonSerializable::class);
    }
}
