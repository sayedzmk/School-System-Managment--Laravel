<?php

namespace App\Repository;

interface StudentRepositoryInterface
{

    public function Get_student();

    public function Edit_student($id);

    public function update_student($request);

    public function create_student();
    public function Show_Student($id);

    public function Delete_Student($request);
    // Get classrooms
    public function Get_classrooms($id);

    //Get Sections
    public function Get_Sections($id);

    //Store_Student
    public function Store_Student($request);

    //Upload Attachment
    public function Uploade_Attachment($request);

    //Download Attachment
    public function Download_Attachment($studentsname,$filename);

    //Delete Attachment
    public function Delete_attachment($request);
}
