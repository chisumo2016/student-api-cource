<?php

namespace App\Http\Controllers;

use App\Modules\Core\HTTPResponseCodes;
use App\Modules\StudentsCoursesEnrollments\StudentsCoursesEnrollmentsService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentCourseEnrollmentController extends Controller
{
    private StudentsCoursesEnrollmentsService $service;

    public function __construct(StudentsCoursesEnrollmentsService $service)
    {
        $this->service = $service;
    }

    public function get(int $id) : Response
    {
        try {
            return new response($this->service->get($id)->toArray());
        } catch (Exception $error) {
            return new Response(
                [
                    "exception" => get_class($error),
                    "errors" => $error->getMessage()
                ],
                HTTPResponseCodes::BadRequest["code"]
            );
        }
    }

    public function update(Request $request): Response
    {
        try {
            $dataArray = ($request->toArray() !== [])
                ? $request->toArray()
                : $request->json()->all();

            return new Response(
                $this->service->update($dataArray)->toArray(),
                HTTPResponseCodes::success["code"]
            );
        } catch (Exception $error) {
            return new Response(
                [
                    "exception" => get_class($error),
                    "errors" => $error->getMessage()
                ],
                HTTPResponseCodes::BadRequest["code"]
            );
        }
    }

    public function softDelete(int $id) : Response
    {
        try {
            return new response($this->service->softDelete($id));
        } catch (Exception $error) {
            return new Response(
                [
                    "exception" => get_class($error),
                    "errors" => $error->getMessage()
                ],
                HTTPResponseCodes::BadRequest["code"]
            );
        }
    }
}
