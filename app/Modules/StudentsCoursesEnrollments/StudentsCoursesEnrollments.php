<?php
declare(strict_types =1);

namespace App\Modules\StudentsCoursesEnrollments;

class  StudentsCoursesEnrollments
{
    private     ?int    $id ;
    private     int     $studentId ;
    private     int     $courseId ;
    private     int     $enrolledByUserId ;
    private     ?string $deletedAt ;
    private     string  $createdAt ;
    private     ?string $updatedAt ;

    public  function  __construct(
        ?int        $id,
        int         $studentId,
        int         $courseId,
        int         $enrolledByUserId,
        ?string     $deletedAt,
        string      $createdAt,
        ?string     $updatedAt,
    )
    {
        $this->id = $id;
        $this->studentId = $studentId;
        $this->courseId = $courseId;
        $this->enrolledByUserId = $enrolledByUserId;

        $this->deletedAt = $deletedAt;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }


    /**
     * @return int
     */
    public function getStudentId(): int
    {
        return $this->studentId;
    }


    /**
     * @return int
     */
    public function getCourseId(): int
    {
        return $this->courseId;
    }

    /**
     * @return int
     */
    public function getEnrolledByUserId(): int
    {
        return $this->enrolledByUserId;
    }

    /**
     * @return string|null
     */
    public function getDeletedAt(): ?string
    {
        return $this->deletedAt;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }


    public  function  toArray() :array
    {
        return  [
            "id"                => $this->id,
            "studentId"         => $this->studentId,
            "courseId"          => $this->courseId,
            "enrolledByUserId"  => $this->enrolledByUserId,

            "deletedAt" => $this->deletedAt,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        ];
    }

    public  function  toSQL() :array
    {
        return  [
            "id"                   => $this->id,
            "student_id"           => $this->studentId,
            "course_id"            => $this->courseId,
            "enrolled_by_user_id"  => $this->enrolledByUserId,

            "deleted_at"     => $this->deletedAt,
            "created_at"     => $this->createdAt,
            "updated_at"     => $this->updatedAt,
        ];
    }
}
