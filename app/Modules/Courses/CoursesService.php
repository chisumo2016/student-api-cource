<?php
declare(strict_types =1);

namespace App\Modules\Courses;

class  CoursesService
{
    private  StudentsCoursesEnrollmentsValidator $validator;
    private  StudentsCoursesEnrollmentsRepository $repository;

    public function __construct(
        StudentsCoursesEnrollmentsValidator $validator,
        StudentsCoursesEnrollmentsRepository $repository
    )
    {
        $this->validator = $validator;
        $this->repository = $repository;
    }

    public  function get(int $id) : Courses
   {
       return  $this->repository->get($id);
   }

   public  function  update(array $data) : Courses
   {
       $this->validator->validatorUpdate($data);
       return  $this->repository->update(
           StudentsCoursesEnrollmentsMapper::mapFrom($data)
       );
   }

    public  function  softDelete(int $id) : bool
    {
         return  $this->repository->softDelete($id);
    }
}
