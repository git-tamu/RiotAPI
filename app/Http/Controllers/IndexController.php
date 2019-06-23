<?php

namespace App\Http\Controllers;

use App\Service\Riot\RiotServiceInterface;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    private $riotService;

    public function __construct(RiotServiceInterface $riotService)
    {
        $this->riotService = $riotService;
    }

    public function index(){
        return view('index');
    }

    public function show(Request $request){

        $apiKey = $this->riotService->getRiotAPIKey();
        $summonerName =  $request->summoner_name;

        $summoner = $this->riotService->getSummonerByName($summonerName, $apiKey);
        $matchLists = $this->riotService->getMatchListsByAccountId($summoner->accountId, $apiKey);

        return view('show')->with([
            'summoner' => $summoner,
            'matchLists' => $matchLists->matches,
        ]);
    }
}
