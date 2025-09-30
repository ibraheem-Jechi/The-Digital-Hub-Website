<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run()
    {
        Faq::insert([
            [
                'question' => 'What learning style does Digital Hub follow?',
                'answer'   => 'We focus on self-learning methods while equipping students with problem-solving skills that prepare them for real-world challenges.',
            ],
            [
                'question' => 'How long is the program?',
                'answer'   => 'Our programs typically run between 3 to 6 months, depending on the track.',
            ],
            [
                'question' => 'Where is the workplace located?',
                'answer'   => 'All activities take place at our hub in Beirut Souks.',
            ],
            [
                'question' => 'What is the age range for the programs?',
                'answer'   => 'The students should be from 19 to 30.',
            ],
            [
                'question' => 'Do you accept all nationalities?',
                'answer'   => 'For now our programs are for Palestinians, and maybe in the future we will accept others.',
            ],
            [
                'question' => 'Do you have transportation fees?',
                'answer'   => 'Till now no, but maybe we can have private buses for all cities.',
            ],
        ]);
    }
}
