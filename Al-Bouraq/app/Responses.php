<?php

namespace App;

use Illuminate\Http\JsonResponse;

class Responses {
    /**
     * @param $data
     * @return JsonResponse
     */
     public static function success($data) {
         //this step is required to send proper response

         $count =0;
         //in case array has sent in param
         if(is_array($data)){
             $count = sizeof($data);
         }else{
             $count = $data->count();
         }

         if($count> 0){
             return response()->json([
                 'success' => true,
                 'message' => 'Operation Successful',
                 'data' => $data
             ], 200);
         }
         // no data
         return response()->json([
             'success' => true,
             'message' => 'No Data Found',
             'data' => $data
         ], 404);


     }

    /**
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
     public static function failure($message='internal error', $code=500) {

          return response()->json([
               'success' => false,
               'message' => $message,
          ], $code);
     }

}
