<?php


namespace App\Components;


class Car
{
    /**
     * @var array
     */
    private $position;
    /**
     * @var \App\Components\Layout
     */
    private $layout;

    /**
     * Car constructor.
     *
     * @param array                  $position
     * @param \App\Components\Layout $layout
     */
    public function __construct(array $position, Layout $layout)
    {
        $this->position = $position;
        $this->layout = $layout;
    }

    /**
     * @return $this
     * @throws \Exception
     */
    public function move()
    {
        $position = $this->position;

        switch ($this->position['direction']) {
            case 'north':
                $position['y']++;
                break;
            case 'south':
                $position['y']--;
                break;
            case 'west':
                $position['x']--;
                break;
            case 'east':
                $position['x']++;
                break;
            default: throw new \Exception('wrong direction.');
        }

        if ($this->layout->isValid($position['x'], $position['y'])) {
            $this->position = $position;
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function left()
    {
        $list = static::directions();

        if (! $current = $list[array_search($this->position['direction'], $list) - 1] ?? null) {
            $current = end($list);
        }

        $this->position['direction'] = $current;

        return $this;
    }

    /**
     * @return $this
     */
    public function right()
    {
        $list = static::directions();

        if (! $current = $list[array_search($this->position['direction'], $list) + 1] ?? null) {
            $current = reset($list);
        }

        $this->position['direction'] = $current;

        return $this;
    }

    /**
     * @return array
     */
    public static function directions(){
        return ['north', 'east', 'south', 'west',];
    }

    /**
     * @return array
     */
    public function getPosition(): array
    {
        return $this->position;
    }
}
