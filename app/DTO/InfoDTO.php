<?php

namespace App\DTO;

class InfoDTO
{
    public static function toJson(array $data): \Illuminate\Http\JsonResponse
    {
        return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
    }
}

?>