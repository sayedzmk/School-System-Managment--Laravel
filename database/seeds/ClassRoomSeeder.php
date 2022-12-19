<?php

use App\Models\ClassRooms;
use App\Models\SchoolGrade;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classrooms')->delete();
        $classrooms = [
            ['en'=> 'First grade', 'ar'=> 'الصف الاول'],
            ['en'=> 'Second grade', 'ar'=> 'الصف الثاني'],
            ['en'=> 'Third grade', 'ar'=> 'الصف الثالث'],
        ];

        foreach ($classrooms as $classroom) {
            ClassRooms::create([
            'name_class' => $classroom,
            'schoolgarde_id' => SchoolGrade::all()->unique()->random()->id
            ]);
        }
    }
}
