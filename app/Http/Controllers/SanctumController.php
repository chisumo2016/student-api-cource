<?php
 declare(strict_types = 1);
namespace App\Http\Controllers;

use App\Modules\Core\HTTPResponseCodes;
use App\Modules\Sanctum\SanctumService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class SanctumController
{
    private  SanctumService $service;

    public  function  __construct(SanctumService $service)
    {
        $this->service = $service;
    }

    public  function  issueToken(Request $request) : Response
    {
       //return new Response("Done");
        try {
              $dataArray = ($request->toArray() !== []) ? $request->toArray():$request->json()->all();
               return new Response(
                 //RETURN VALUE
               $this->service->issueToken($dataArray),
                   HTTPResponseCodes::Success['code']
               );
              //throw new Exception("gg");
        }catch (Exception $error){
            return new Response(
                [
                   "exception" => get_class($error),
                   "errors"   => $error->getMessage(),
                ],
                HTTPResponseCodes::BadRequest['code']
            );
        }
    }
}
