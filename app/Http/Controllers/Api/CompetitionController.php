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
        $response = Http::withHeaders([ 'X-Auth-Token' => env('FOOTBALL_TOKEN') ])->get('http://api.football-data.org'. $end);

        return response()->json([
            'data' => json_decode($response->body())->competitions ?? [],
            'message' => $response['message'] ?? null,
            'errorCode' => $response['errorCode'] ?? null
        ], $response['errorCode'] ?? 200);
    }

    public function show($id)
    {
        $end = "/v4/competitions/{$id}/teams";
        $response = Http::withHeaders([ 'X-Auth-Token' => env('FOOTBALL_TOKEN') ])->get('http://api.football-data.org'. $end);
        // return $response->body();
        return response()->json([
            'data' => json_decode($response->body()) ?? [],
            'message' => $response['message'] ?? null,
            'errorCode' => $response['errorCode'] ?? null
        ], $response['errorCode'] ?? 200);
    }
}
