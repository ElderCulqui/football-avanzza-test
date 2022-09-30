<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('pages.team.index', [
            'teams' => Team::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('pages.team.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team_id = $request['team_id'];

        $end = "/v4/teams/{$team_id}";
        $response = Http::withHeaders([ 'X-Auth-Token' => env('FOOTBALL_TOKEN') ])->get('http://api.football-data.org'. $end);

        if ($response->successful()) {
            $team = Team::firstOrCreate([
                        'code' => $response['id'],
                    ], [
                        'name' => $response['name'],
                        'country' => $response['area']['name'],
                    ]);

            foreach ($response['squad'] as $value) {
                Player::firstOrCreate([
                    'code' => $value['id'],
                ], [
                    'team_id' => $team->id,
                    'name' => $value['name'],
                    'position' => $value['position']
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Team::with(['players'])->find($id);
        return Inertia::render('pages.team.show', [
            'team' => Team::with(['players'])->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
