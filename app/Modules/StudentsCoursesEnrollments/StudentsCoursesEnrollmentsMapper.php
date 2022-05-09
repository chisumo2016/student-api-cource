<?php
declare(strict_types =1);

namespace App\Modules\StudentsCoursesEnrollments;

use App\Modules\Common\MyHelpers;

class  StudentsCoursesEnrollmentsMapper
{
    public static function  mapFrom(array $data) : StudentsCoursesEnrollments
    {
        return  new StudentsCoursesEnrollments(
            MyHelpers::nullStringToInt($data["id"] ?? null),
                     $data["studentId"],
                     $data["courseId"],
                     $data["enrolledByUserId"],
            $data["deletedAt"] ?? null,
            $data["createdAt"] ?? date("Y-m-d H:i:s"),
            $data["updatedAt"] ?? null,
        );
    }
}
