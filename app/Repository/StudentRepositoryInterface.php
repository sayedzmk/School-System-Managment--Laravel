<?php

namespace App\Repository;

interface StudentRepositoryInterface{

    public function create_student();
        // Get classrooms
        public function Get_classrooms($id);

        //Get Sections
        public function Get_Sections($id);

        //Store_Student
        public function Store_Student($request);
}
