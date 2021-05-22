# Toy car exercise

## Assessment Criteria
The object of this test is to see how the candidate performs with backend and frontend code. We’ll be looking at:
- Clean code design and sound software engineering practices.
- Structured repo so it can be used as working repo in future.
- Production ready code with tests.
### Description (The toy car Test)
The application is a simulation of a toy car moving on a square tabletop, of dimensions 5 units x 5 units. There are no other obstructions on the table surface.

The car is free to roam around the surface of the table, but must be prevented from falling to destruction. Any movement that would result in the car falling from the table must be prevented, however further valid movement commands must still be allowed.

Create backend application that can read in commands in the following format:
- **PLACE X,Y,F**
- **MOVE**
- **LEFT**
- **RIGHT**

PLACE will put the toy car on the table in position X,Y and facing NORTH, SOUTH, EAST or WEST. The origin (0,0) can be considered to be the SOUTH WEST most corner.
The first valid command to the car is a PLACE command, after that, any sequence of commands may be issued, in any order, including another PLACE command.
The application should discard all commands in the sequence until a valid PLACE command has been executed.
- MOVE will move the car one unit forward in the direction it is currently facing.
- LEFT and RIGHT will rotate the car 90 degrees in the specified direction without changing the position of the car.
A car that is not on the table can choose to ignore the MOVE, LEFT and RIGHT commands.
The frontend should be connected to the backend by API or socket connection, as the developer chooses.
Each command response should be reflected in the UI step by step. Please provide the complete application (backend + frontend).

## Constraints
The car must not fall off the table during movement. This also includes the initial placement of the car. Any move that would cause the car to fall must be ignored.
Additional points
For the senior candidates we also expect:
- Responsive UI that can be used on mobile
- Clean API between the frontend and backend (request/responses should contain
only the necessary data)
- Implement automated testing (unit tests, functional tests)
- Keep track of all the commands for a particular ​car​ and re run those commands.

## How to run

```shell
composer install
cp .env.example .env
php artisan key:generate

php artisan serve

```

#### Tests

```shell
php artisan test

```

#### [UI Build](https://github.com/galexth/cars-react) is included

[https://github.com/galexth/cars-react](https://github.com/galexth/cars-react)
