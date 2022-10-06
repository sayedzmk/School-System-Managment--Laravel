<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TypeBlood;
class TypeBooldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_bloods')->delete();
        $tybebloode=['O-','O+','A+','A-','B+','B-','AB+','AB-'];
        foreach($tybebloode as $tyBD){
            TypeBlood::create(['name' => $tyBD]);
        }
    }
}
