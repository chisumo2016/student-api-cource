<?php
declare(strict_types =1 );

namespace  App\Modules\Core;

abstract  class HTTPResponseCodes
{
      const Success = [
          "title" => "success",
          "code" => 200,
          "message" => "Request has been successfully processed",
      ];

    const NotFound = [
        "title" => "not_found_error",
        "code" => 404,
        "message" => "could not locate resource",
    ];

    const InvalidArgument = [
        "title" => "invalid_argument_error",
        "code" => 404,
        "message" => "Invalid arguments, Server failed to process",
    ];

    const BadRequest = [
        "title" => "bad_request",
        "code" => 400,
        "message" => "Server failed to process your request",
    ];
}
