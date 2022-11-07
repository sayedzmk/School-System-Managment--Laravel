<?php

namespace App\Repository;

interface StudentRepositoryInterface
{

    public function Get_student();

    public function Edit_student($id);

    public function update_student($request);

    public function create_student();

    public function Delete_Student($request);
    // Get classrooms
    public function Get_classrooms($id);

    //Get Sections
    public function Get_Sections($id);

    //Store_Student
    public function Store_Student($request);
}
