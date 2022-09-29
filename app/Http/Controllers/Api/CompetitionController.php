<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class CompetitionController extends Controller
{
    public function index()
    {
        $end = '/v4/competitions/';
        $token = '40714b16aadf4656956491e1f6b6fd86';

        $response = Http::withHeaders([ 'X-Auth-Token' => $token ])->get('http://api.football-data.org'. $end);

        // return $response;
        return response()->json([
            'data' => json_decode($response->body())->competitions ?? [],
            'message' => $response['message'] ?? null,
            'errorCode' => $response['errorCode'] ?? null
        ], $response['errorCode'] ?? 200);

        // return json_decode($response->body())->competitions;
        // return $response->body()->competitions;
    }
}
