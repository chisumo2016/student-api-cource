<?php
 declare(strict_types = 1);
namespace App\Http\Controllers;

use App\Modules\Core\HTTPResponseCodes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class SanctumController
{
    public  function  issueToken(Request $request) : Response
    {
       //return new Response("Done");
        try {
               throw new Exception("gg");


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
