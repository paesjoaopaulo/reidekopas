<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public const WORLD_CUPS = [
        1930,
        1934,
        1938,
        1950,
        1954,
        1958,
        1962,
        1966,
        1970,
        1974,
        1978,
        1982,
        1986,
        1990,
        1994,
        1998,
        2002,
        2006,
        2010,
        2014
    ];

    public function respostaCerta()
    {
        switch ($this->correct_answer) {
            case 'a':
                return $this->alt_a;
            case 'b':
                return $this->alt_b;
            case 'c':
                return $this->alt_c;
            case 'd':
                return $this->alt_d;
            default:
                return "";
        }
    }

}
