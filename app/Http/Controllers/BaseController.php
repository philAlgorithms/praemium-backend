<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message, int|null $status=200)
    {
     $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, $status);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code=404, $type="validation",)
    {
     $response = [
	    'success' => false,
	    'type' => $type,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    public function sendMixed($response, $success){
	if($response instanceof JsonResponse){
	    if(!json_decode($response->content())->success)
            return $response;
	    return $this->sendResponse($response, $success, 200);
	}
	return $this->sendResponse($response, $success, 200);
    }
}
