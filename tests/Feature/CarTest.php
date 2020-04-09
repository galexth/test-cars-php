<?php

namespace Tests\Feature;

use App\Components\Car;
use App\Components\Layout;
use Tests\TestCase;

class CarTest extends TestCase
{
    /**
     * Drive car from left bottom corner to top right.
     * @throws \Exception
     */
    public function testDriveAcrossTheTable()
    {
        $car = new Car(['x' => 0, 'y' => 0, 'direction' => 'north'], new Layout());

        $car
            ->move()
            ->move()
            ->right()
            ->move()
            ->move()
            ->move()
            ->move()
            ->left()
            ->move()
            ->move()
            ->move();


        $this->assertEquals(['x' => 4, 'y' => 4, 'direction' => 'north'], $car->getPosition());
    }
}
