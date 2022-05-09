<?php
declare(strict_types =1);

namespace App\Modules\StudentsCoursesEnrollments;

use InvalidArgumentException;
use Illuminate\Support\Facades\DB;

class  StudentsCoursesEnrollmentsRepository
{
    private  $tableName = "students_courses_enrollments";
    private  $selectColums =[
        "students_courses_enrollments.student_id",
        "students_courses_enrollments.student_id As studentId",
        "students_courses_enrollments.course_id As courseId",
        "students_courses_enrollments.enrolled_by_user_id As enrolledByUserId",

        "courses.deleted_at AS deletedAt",
        "courses.created_at AS createdAt",
        "courses.updated_at AS updatedAt",
    ];

    public  function  get(int $id) : StudentsCoursesEnrollments
    {
        $selectColumns = implode(", " , $this->selectColums);
        $result = json_decode(json_encode(
            DB::selectOne("SELECT $selectColumns
                FROM {$this->tableName}
                WHERE id = :id AND deleted_at IS NULL",
                [
                    "id" => $id
                ])
        ), true);

        if ($result === null){
            throw new InvalidArgumentException("Invalid Students Courses Enrollments id.");
        }

        return  StudentsCoursesEnrollmentsMapper::mapFrom($result);
    }

    public  function  update(StudentsCoursesEnrollments $coursesEnrollments) : StudentsCoursesEnrollments
    {
        return  DB::transaction(function () use ($coursesEnrollments){
            DB::table($this->tableName)->updateOrInsert([
                "id" => $coursesEnrollments->getId()
            ], $coursesEnrollments->toSQL());

            $id = ($coursesEnrollments->getId() === null || $coursesEnrollments->getId() === 0)
                ? (int)DB::getPdo()->lastInsertId()
                : $coursesEnrollments->getId();

            return $this->get($id);
        });
    }

    public  function  softDelete(int $id) : bool
    {
        $result = DB::table($this->tableName)
            ->where("id", $id)
            ->where("deleted_at", null)
            ->update([
                "deleted_at" => date("Y-m-d H:i:s")
            ]);
        if ($result !== 1){
            throw  new InvalidArgumentException("Invalid Students Courses Enrollments");
        }
        return true;
    }


}
