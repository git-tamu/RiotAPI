<?php

namespace App\Service\Riot;


interface RiotServiceInterface
{
    public function getRiotAPIKey(): string;

    public function getSummonerByName(string $summonerName, string $apiKey): \stdClass;

    public function getMatchListsByAccountId(string $accountId, string $apiKey): \stdClass;

    public function getJsonByCurl(string $url): \stdClass;
}