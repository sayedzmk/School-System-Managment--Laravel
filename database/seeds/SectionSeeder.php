<?php

use Illuminate\Database\Seeder;
use App\Models\ClassRooms;
use App\Models\SchoolGrade;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();

        $Sections = [
            ['en' => 'a', 'ar' => 'ا'],
            ['en' => 'b', 'ar' => 'ب'],
            ['en' => 'c', 'ar' => 'ج'],
        ];

        foreach ($Sections as $section) {
            Section::create([
                'name_section' => $section,
                'Status' => 1,
                'schoolgarde_id' => SchoolGrade::all()->unique()->random()->id,
                'class_id' => ClassRooms::all()->unique()->random()->id
            ]);
        }
    }
}
