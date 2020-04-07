<?php


namespace App\Components;


class Layout
{
    /**
     * @var array
     */
    protected $layout;

    /**
     * Layout constructor.
     *
     * @param int $rows
     * @param int $columns
     */
    public function __construct(int $rows = 5, int $columns = 5)
    {
        $this->layout = array_fill(0, $rows, array_fill(0, $columns, 0));
    }

    /**
     * @param int $x
     * @param int $y
     *
     * @return bool
     */
    public function isValid(int $x, int $y) {
        return isset($this->layout[$x][$y]);
    }

    /**
     * @return array
     */
    public function getLayout(): array
    {
        return $this->layout;
    }
}
