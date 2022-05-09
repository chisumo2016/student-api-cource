<?php
declare(strict_types =1);

namespace App\Modules\StudentsCoursesEnrollments;

use InvalidArgumentException;

class  StudentsCoursesEnrollmentsValidator
{

    private StudentsCoursesEnrollmentsDatabaseValidator $dbValidator;

    public function __construct(StudentsCoursesEnrollmentsDatabaseValidator $dbValidator)
    {
        $this->dbValidator = $dbValidator;
    }

    public  function  validatorUpdate(array $data)
    {
        $validator = validator($data,[
            "student_id"            => "required|int|exists:students,id",
            "course_id"             => "required|int|exists:courses,id",
            "enrolled_by_user_id"   => "required|int|exists:users,id",


        ]);

        if ($validator->fails()){
            throw  new InvalidArgumentException(
                json_encode($validator->errors()->all())
            );
        }

        $this->dbValidator->validateUpdate($data["coursesId"], $data["studentsId"]);
    }
}
