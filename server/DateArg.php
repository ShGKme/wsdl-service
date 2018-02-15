<?php
/**
 * Class DateArg
 */
class DateArg {
    /**
     * @type int
     */
    public $day;
    /**
     * @type int
     */
    public $month;
    /**
     * @type int
     */
    public $year;

    public function __construct($d, $m, $y) {
        $this->day = $d;
        $this->month = $m;
        $this->year = $y;
    }
}
