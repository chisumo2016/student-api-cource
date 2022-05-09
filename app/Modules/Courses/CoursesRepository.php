<?php
declare(strict_types =1);

namespace App\Modules\Courses;

use InvalidArgumentException;
use Illuminate\Support\Facades\DB;

class  CoursesRepository
{
    private  $tableName = "courses";
    private  $coursesColums =[
        "courses.id",
        "courses.name",
        "courses.capacity",
        "(SELECT COUNT(*)
            FROM students_courses_enrollments
            WHERE students_courses_enrollments.course_id = courses.id AND students_courses_enrollments.deleted_at IS NULL
        )",
        "courses.deleted_at AS deletedAt",
        "courses.created_at AS createdAt",
        "courses.updated_at AS updatedAt",
    ];

    public  function  get(int $id) : Courses
    {
        $selectColumns = implode(", " , $this->coursesColums);
        $result = json_decode(json_encode(
            DB::selectOne("SELECT $selectColumns
                FROM {$this->tableName}
                WHERE id = :id AND deleted_at IS NULL",
                [
                    "id" => $id
                ])
        ), true);

        if ($result === null){
            throw new InvalidArgumentException("Invalid StudentsCoursesEnrollments id.");
        }

        return  StudentsCoursesEnrollmentsMapper::mapFrom($result);
    }

    public  function  update(Courses $courses) : Courses
    {
        return  DB::transaction(function () use ($courses){
            DB::table($this->tableName)->updateOrInsert([
                "id" => $courses->getId()
            ], $courses->toSQL());

            $id = ($courses->getId() === null || $courses->getId() === 0)
                ? (int)DB::getPdo()->lastInsertId()
                : $courses->getId();

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
            throw  new InvalidArgumentException("Invalid StudentsCoursesEnrollments");
        }
        return true;
    }


}
