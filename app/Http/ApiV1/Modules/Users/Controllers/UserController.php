<?php

namespace App\Http\ApiV1\Modules\Users\Controllers;

class UserController
{
    /**
     * @OA\Info(title="Test API for users", version="1.0")
     */

    /**
     * @OA\Get(
     *     path="/api/usesrs",
     *     summary="Test endpoint",
     *     @OA\Response(response=200, description="OK")
     * )
     */
    public function get()
    {
        return response()->json(['status' => 'ok']);
    }
}
