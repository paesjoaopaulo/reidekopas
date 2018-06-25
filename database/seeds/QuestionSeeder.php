<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [
            [
                'title' => 'Quanto é 1 + 1?',
                'alt_a' => '1',
                'alt_b' => '2',
                'alt_c' => '3',
                'alt_d' => '4',
                'correct_answer' => 'b',
                'year' => '1930'
            ],
            [
                'title' => 'Quanto é 4 + 1?',
                'alt_a' => '1',
                'alt_b' => '5',
                'alt_c' => '3',
                'alt_d' => '4',
                'correct_answer' => 'b',
                'year' => '1934'
            ],
            [
                'title' => 'Quanto é 9 + 1?',
                'alt_a' => '10',
                'alt_b' => '2',
                'alt_c' => '3',
                'alt_d' => '43',
                'correct_answer' => 'a',
                'year' => '1938'
            ],
            [
                'title' => 'Quanto é 1 - 31?',
                'alt_a' => '1',
                'alt_b' => '2',
                'alt_c' => '-30',
                'alt_d' => '4',
                'correct_answer' => 'c',
                'year' => '1950'
            ],
            [
                'title' => 'Quanto é 20 + 1?',
                'alt_a' => '1',
                'alt_b' => '2',
                'alt_c' => '3',
                'alt_d' => '21',
                'correct_answer' => 'd',
                'year' => '1954'
            ],
            [
                'title' => 'Quanto é 9 + 0?',
                'alt_a' => '1',
                'alt_b' => '9',
                'alt_c' => '3',
                'alt_d' => '4',
                'correct_answer' => 'b',
                'year' => '1958'
            ],
            [
                'title' => 'Quanto é 10 + 21?',
                'alt_a' => '31',
                'alt_b' => '32',
                'alt_c' => '33',
                'alt_d' => '44',
                'correct_answer' => 'a',
                'year' => '1962'
            ],
            [
                'title' => 'Quanto é -1 + 1?',
                'alt_a' => '0',
                'alt_b' => '2',
                'alt_c' => '-1',
                'alt_d' => '4',
                'correct_answer' => 'a',
                'year' => '1966'
            ],
            [
                'title' => 'Quanto é 19 + 1?',
                'alt_a' => '1',
                'alt_b' => '2',
                'alt_c' => '30',
                'alt_d' => '20',
                'correct_answer' => 'd',
                'year' => '1970'
            ],
            [
                'title' => 'Quanto é 15 + 6?',
                'alt_a' => '1',
                'alt_b' => '2',
                'alt_c' => '3',
                'alt_d' => '21',
                'correct_answer' => 'd',
                'year' => '1974'
            ],
            [
                'title' => 'Quanto é 14 + 21?',
                'alt_a' => '155',
                'alt_b' => '223',
                'alt_c' => '35',
                'alt_d' => '4666',
                'correct_answer' => 'c',
                'year' => '1978'
            ],
            [
                'title' => 'Quanto é 5 - 4?',
                'alt_a' => '1',
                'alt_b' => '2',
                'alt_c' => '3',
                'alt_d' => '4',
                'correct_answer' => 'a',
                'year' => '1982'
            ],
            [
                'title' => 'Quanto é -100 + 1?',
                'alt_a' => '1',
                'alt_b' => '-99',
                'alt_c' => '3',
                'alt_d' => '4',
                'correct_answer' => 'b',
                'year' => '1986'
            ],
            [
                'title' => 'Quanto é 8 / 2?',
                'alt_a' => '1',
                'alt_b' => '2',
                'alt_c' => '3',
                'alt_d' => '4',
                'correct_answer' => 'd',
                'year' => '1990'
            ],
            [
                'title' => 'Quanto é 10 / 4?',
                'alt_a' => '2.5',
                'alt_b' => '2,1',
                'alt_c' => '25',
                'alt_d' => '43',
                'correct_answer' => 'a',
                'year' => '1994'
            ],
            [
                'title' => 'Quanto é 1 + 1111?',
                'alt_a' => '1',
                'alt_b' => '2',
                'alt_c' => '1112',
                'alt_d' => '4',
                'correct_answer' => 'c',
                'year' => '1998'
            ],
            [
                'title' => 'Quanto é 44 - 1?',
                'alt_a' => '1',
                'alt_b' => '2',
                'alt_c' => '43',
                'alt_d' => '4',
                'correct_answer' => 'c',
                'year' => '2002'
            ],
            [
                'title' => 'Quanto é 1 + 1 + 99 + 10?',
                'alt_a' => '111',
                'alt_b' => '2',
                'alt_c' => '3',
                'alt_d' => '4',
                'correct_answer' => 'a',
                'year' => '2006'
            ],
            [
                'title' => 'Quanto é 3 + 1?',
                'alt_a' => '1',
                'alt_b' => '2',
                'alt_c' => '3',
                'alt_d' => '4',
                'correct_answer' => 'd',
                'year' => '2010'
            ],
            [
                'title' => 'Quanto é 10 + 1?',
                'alt_a' => '1',
                'alt_b' => '11',
                'alt_c' => '3',
                'alt_d' => '4',
                'correct_answer' => 'b',
                'year' => '2014'
            ],
        ];

        \Illuminate\Support\Facades\DB::table('questions')->insert($insert);
    }
}
