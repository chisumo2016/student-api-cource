<?php

namespace App\Http\Controllers;

use App\Modules\Core\HTTPResponseCodes;
use App\Modules\Courses\StudentsCoursesEnrollmentsService;
use App\Modules\Sanctum\SanctumService;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    private StudentsCoursesEnrollmentsService $service;

    public  function  __construct(StudentsCoursesEnrollmentsService $service)
    {
        $this->service = $service;
    }

    public  function  get(int $id) : Response
    {
        try {

            return new response($this->service->get($id)->toArray());

        }catch (Exception $error){
            return new response(
                [
                    "exception" => get_class($error),
                    "errors" => $error->getMessage(),
                ],
                HTTPResponseCodes::BadRequest['code']
            );
        }
    }

    public  function  update(Request $request) : Response
    {
        try {
            $dataArray = ($request->toArray() !== [])
                ? $request->toArray()
                :$request->json()->all();

            return new Response(
            //RETURN VALUE
                $this->service->update($dataArray)->toArray(),
                HTTPResponseCodes::Success['code']
            );
            //throw new Exception("gg");

        }catch (Exception $error){
            return new response(
                [
                    "exception" => get_class($error),
                    "errors" => $error->getMessage(),
                ],
                HTTPResponseCodes::BadRequest['code']
            );
        }
    }

    public  function  softDelete(int $id) : Response
    {
        try {

            return new response($this->service->softDelete($id));

        }catch (Exception $error){
            return new response(
                [
                    "exception" => get_class($error),
                    "errors" => $error->getMessage(),
                ],
                HTTPResponseCodes::BadRequest['code']
            );
        }
    }
}
