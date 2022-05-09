<?php
declare(strict_types =1);

namespace App\Modules\StudentsCoursesEnrollments;
use App\Modules\Courses\CoursesService;
use App\Modules\Students\StudentsService;
use InvalidArgumentException;
class  StudentsCoursesEnrollmentsDatabaseValidator
{

    private CoursesService    $coursesService;
    private  StudentsService   $studentsService;

    public function __construct(CoursesService $coursesService, StudentsService $studentsService)
    {
        $this->coursesService  = $coursesService;
        $this->studentsService = $studentsService;
    }

    public  function  validateUpdate(int $courseId , int $studentId) : void
    {
        $course = $this->coursesService->get($courseId);

        if ($course->getTotalStudentsEnrolled() >= $course->getCapacity()) {
            throw new InvalidArgumentException("Failed to enroll student. Course enrollment limit {$course->getTotalStudentsEnrolled()} reached.");
        }
             // no duplicates allowed
             $studentsEnrolled = $this->studentsService->getByCourseId($courseId);
             for ($i = 0; $i < count($studentsEnrolled); $i++) {
                 if ($studentsEnrolled[$i]->getId() === $studentId) {
                     throw new InvalidArgumentException("Failed to enroll student. Student already registered.");
                 }
             }

    }
}
