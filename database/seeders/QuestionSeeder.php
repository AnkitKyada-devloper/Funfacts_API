<?php

namespace Database\Seeders;

use App\Models\Questions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;



class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run()
    {
      
        Questions::insert([
            'question_type' => '1',
            'qustion_text' => 'What motivates you every day?',

        ]);
        Questions::insert([
            'question_type' => '2',
            'qustion_text' => 'What things or activities make you happy?',

        ]);
        Questions::insert([
            'question_type' => '3',
            'qustion_text' => 'What do you enjoy doing in your free time?',

        ]);
        Questions::insert([
            'question_type' => '4',
            'qustion_text' => 'What is the best piece of advice youve received?',

        ]);
        Questions::insert([
            'question_type' => '5',
            'qustion_text' => 'Share your three hobbies!!',

        ]);
        Questions::insert([
            'question_type' => '6',
            'qustion_text' => 'Favourite vacation place: For a week?',

        ]);
        Questions::insert([
            'question_type' => '7',
            'qustion_text' => 'Favourite vacation place: For a month?',

        ]);
        Questions::insert([
            'question_type' => '8',
            'qustion_text' => 'Mention your favourite: Colour?',

        ]);
        Questions::insert([
            'question_type' => '9',
            'qustion_text' => 'Mention your favourite: Ice-Cream?',

        ]);
        Questions::insert([
            'question_type' => '10',
            'qustion_text' => 'Mention your favourite: Actor?',

        ]);
        Questions::insert([
            'question_type' => '11',
            'qustion_text' => 'Mention your favourite: Actress?',

        ]);
        Questions::insert([
            'question_type' => '12',
            'qustion_text' => 'Mention your favourite: Festival?',

        ]);
        Questions::insert([
            'question_type' => '13',
            'qustion_text' => 'Mention your favourite: Singer?',

        ]);
        Questions::insert([
            'question_type' => '14',
            'qustion_text' => 'Mention your favourite: Dancer?',

        ]);
        Questions::insert([
            'question_type' => '15',
            'qustion_text' => 'Mention your favourite: Sports?',

        ]);
        Questions::insert([
            'question_type' => '16',
            'qustion_text' => 'Mention your favourite: Movie?',

        ]);
        Questions::insert([
            'question_type' => '17',
            'qustion_text' => 'Share one accomplishment that you are most proud of !!',

        ]);
        Questions::insert([
            'question_type' => '18',
            'qustion_text' => ' As a child what did you wish to become when you grew up?',

        ]);
        Questions::insert([
            'question_type' => '19',
            'qustion_text' => 'What was cool when you were young but isn’t cool now?',

        ]);
    }
}