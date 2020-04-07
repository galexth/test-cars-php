<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\Concerns\InteractsWithSession;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CarControllerTest extends TestCase
{
    use WithoutMiddleware, InteractsWithSession;

    /**
     * @see \App\Http\Controllers\CarController::place()
     *
     * @return void
     */
    public function testPlace()
    {
        $position = $this->getInitialPosition();

        $response = $this->put('/car/place', $position);

        $response->assertStatus(200);
        $response->assertJson($position);
    }

    /**
     * @see \App\Http\Controllers\CarController::place()
     *
     * @return void
     */
    public function testPlaceOutOfTheBoard()
    {
        $position = $this->getInitialPosition();
        $position['x'] = 10;

        $response = $this->put('/car/place', $position);

        $response->assertStatus(422);
    }

    /**
     * @see \App\Http\Controllers\CarController::move()
     *
     * @return void
     */
    public function testMove()
    {
        $position = $this->getInitialPosition();

        $this->session(['position' => $position]);

        $response = $this->put('/car/move');

        $response->assertStatus(200);

        $position['y']++;

        $response->assertJson($position);
    }

    /**
     * @see \App\Http\Controllers\CarController::move()
     *
     * @return void
     */
    public function testMoveInWrongDirection()
    {
        $position = $this->getInitialPosition();
        $position['x'] = 4;
        $position['y'] = 4;

        $this->session(['position' => $position]);

        $response = $this->put('/car/move');

        $response->assertStatus(200);

        $response->assertJson($position);
    }

    /**
     * @see \App\Http\Controllers\CarController::left()
     *
     * @return void
     */
    public function testLeft()
    {
        $position = $this->getInitialPosition();

        $this->session(['position' => $position]);

        $response = $this->put('/car/left');

        $response->assertStatus(200);

        $position['direction'] = 'west';

        $response->assertJson($position);
    }

    /**
     * @see \App\Http\Controllers\CarController::right()
     *
     * @return void
     */
    public function testRight()
    {
        $position = $this->getInitialPosition();

        $this->session(['position' => $position]);

        $response = $this->put('/car/right');

        $response->assertStatus(200);

        $position['direction'] = 'east';

        $response->assertJson($position);
    }

    /**
     * @return array
     */
    private function getInitialPosition()
    {
        return [
            'x' => 0,
            'y' => 0,
            'direction' => 'north'
        ];
    }
}
