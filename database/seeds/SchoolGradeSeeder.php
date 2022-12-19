<?php

use App\Models\SchoolGrade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SchoolGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('school_gardes')->delete();
        $grades = [
            ['en'=> 'Primary Stage', 'ar'=> 'المرحلة الابتدائية'],
            ['en'=> 'middle School', 'ar'=> 'المرحلة الاعدادية'],
            ['en'=> 'High school', 'ar'=> 'المرحلة الثانوية'],
        ];

        foreach ($grades as $grade) {
            SchoolGrade::create(['name' => $grade]);
        }

    }
}
