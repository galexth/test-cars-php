<?php
namespace App\Http\Controllers;


use App\Components\Car;
use App\Components\Layout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response(\Session::get('position'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function move(Request $request)
    {
        if (! $position = \Session::get('position')) {
            return response(['error' => 'Place the car first.'], 422);
        }

        $car = new Car($position, new Layout());

        \Session::put('position', $car->move()->getPosition());

        return response($car->getPosition());
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function left(Request $request)
    {
        if (! $position = \Session::get('position')) {
            return response(['error' => 'Place the car first.'], 422);
        }

        $car = new Car($position, new Layout());

        \Session::put('position', $car->left()->getPosition());

        return response($car->getPosition());
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function right(Request $request)
    {
        if (! $position = \Session::get('position')) {
            return response(['error' => 'Place the car first.'], 422);
        }

        $car = new Car($position, new Layout());

        \Session::put('position', $car->right()->getPosition());

        return response($car->getPosition());
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function place(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'x' => 'required|integer',
            'y' => 'required|integer',
            'direction' => ['required', Rule::in(Car::directions())],
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }

        $position = $request->only(['x', 'y', 'direction']);

        $layout = new Layout();

        if (! $layout->isValid($position['x'], $position['y'])) {
            return response(['error' => 'The position is out of the table'], 422);
        }

        \Session::put('position', $position);

        return response($position);
    }

}
