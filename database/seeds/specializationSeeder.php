<?php

use Illuminate\Database\Seeder;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;

class specializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en'=> 'Arabic', 'ar'=> 'عربي'],
            ['en'=> 'Sciences', 'ar'=> 'علوم'],
            ['en'=> 'Computer', 'ar'=> 'حاسب الي'],
            ['en'=> 'English', 'ar'=> 'انجليزي'],
            ['en'=> 'Maths', 'ar'=> 'رياضيات'],
            ['en'=> 'Biology', 'ar'=> 'احياء'],
            ['en'=> 'Geology', 'ar'=> 'جيلوجيا'],
            ['en'=> 'Geography', 'ar'=> 'جغرفيا'],
        ];
        foreach ($specializations as $S) {
            Specialization::create(['name' => $S]);
        }
    }
}
