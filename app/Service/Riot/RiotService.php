<?php

namespace App\Service\Riot;


class RiotService implements RiotServiceInterface
{

    /**
     * configからRiotAPIKeyを取得する
     * @return string
     */
    public function getRiotAPIKey(): string
    {
        return config('riot.RiotAPIKey');
    }

    /**
     * 受け取ったURLからcurlコマンドを実行
     * @param string $url
     * @return \stdClass
     */
    public function getJsonByCurl(string $url): \stdClass
    {
        //curl開始
        $curl = curl_init($url);

        //curlのオプション
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //jsonデータをデコード
        $result = json_decode(curl_exec($curl));

        //curl終了
        curl_close($curl);

        return $result;
    }

    /**
     * サモナー名からサモナー情報を取得する
     * @param string $summonerName
     * @return \stdClass
     */
    public function getSummonerByName(string $summonerName, string $apiKey): \stdClass
    {
        //エンドポイント
        $url = 'https://jp1.api.riotgames.com/lol/summoner/v4/summoners/by-name/'.$summonerName.'?api_key='.$apiKey;

        return $this->getJsonByCurl($url);
    }

    /**
     * アカウント名から試合履歴を取得
     * @param string $accountId
     * @param string $apiKey
     * @return \stdClass
     */
    public function getMatchListsByAccountId(string $accountId, string $apiKey): \stdClass
    {
        $url = 'https://jp1.api.riotgames.com/lol/match/v4/matchlists/by-account/odYF6-oNh3aelsk6Ll6S2Yh9Z-6uc4ZKoNLgn05J83VVbAO4HTynDync?api_key='.$apiKey;

        return $this->getJsonByCurl($url);
    }



}