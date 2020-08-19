<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('student')--replaced
        //insert dummy data in student table
        (new App\Student)->insert([
            ['studentName' => 'Jagaran Maharjan1',
                'address' => 'Manamaiju',
                'age' => 20
            ],
            ['studentName' => 'Sanzay Shrestha1',
                'address' => 'Budhanilkantha',
                'age' => 20
            ]
        ]);
    }
}
