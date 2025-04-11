<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DTO\InfoDTO;

class InfoController extends Controller
{
    public function server()
    {
        ob_start();
        phpinfo();
        $phpinfo = ob_get_clean();
        return InfoDTO::toJson(['phpinfo' => strip_tags($phpinfo)]);
    }

    public function client(Request $request)
    {
        return InfoDTO::toJson([
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);
    }

    public function database()
    {
        $dbVersion = DB::selectOne('select version() as version')->version;
        return InfoDTO::toJson(['database_version' => $dbVersion]);
    }
}


?>