<?php

class getApi
{

    public function __construct($c_id, $c_token)
    {
        $this->c_id = $c_id;
        $this->c_token = $c_token;
        $this->ch = self::postRequest($c_id, $c_token);
    }

    private function postRequest($c_id, $c_token)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token);
        $obj = $ch;
        curl_close($ch);
        return $obj;
    }

    public function matchList($type, $played, $limit = null, $order = null, $offset = null, $fromdate = null, $todate = null, $season = null, $championship = null, $itemtype = null, $itemid = null, $listdata = null)
    {
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        $ch = $this->ch;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token . "&type=" . $type . "&played=" . $played . "&limit=" . $limit . "&order=" . $order . "&offset=" . $offset . "&fromdate=" . $fromdate . "&todate=" . $todate . "&season=" . $season . "&championship=" . $championship . "&itemtype=" . $itemtype . "&itemid=" . $itemid . "&listdata=" . $listdata);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/matches");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);

    }

    public function matchInfo($id) //Запрос данных о матче.
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/matches/" . $id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function matchPlayers($id) //Запрос составов матча.
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/matches/" . $id . "/lineups");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function matchPlayersList($id) //Запросы списка игроков для матча.
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/matches/" . $id . "/personlist");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function matchEvents($id) //Запрос событий матча
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/matches/" . $id . "/events");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function wholeMatchEvents($objtype, $objid, $type = null, $limit = null, $offset = null) //Общий запрос событий
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token . "&objtype=" . $objtype . "&objid=" . $objid . "&type=" . $type . "&limit=" . $limit . "&offset=" . $offset);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/events/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function infoPlayer($id) // Запрос данных об игроке.
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/person/" . $id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function playerStat($id) //Запрос статистических данных об игроке
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/person/" . $id."/careerstats");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function detailPlayerStat($id) //Запрос детальных статистических данных об игроке
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/person/" . $id."/careerdetailedstats");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function seasonStat($id,$season) //Запрос статистики по матчам сезона
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&season=".$season);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/person/" . $id."/matchsstats");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function getInfoBySeason($season_id)//Запрос данных турнира по идентификатору сезона.
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/seasons/" . $season_id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function getInfoByChamp($champ_id) //Запрос данных турнира по идентификатору чемпионата.
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/champs/" . $champ_id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function administratedMatches() //Запрос списка администрируемых турниров пользователя/партнера
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/mychamps");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function tournamentTableByTourID($tour_id) //Запрос турнирной таблицы по туру
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&tour_id=".$tour_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/standings");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function tournamentTableByStageID($stage_id) //Запрос турнирной таблицы по этапу
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&stage_id=".$stage_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/standings");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function tournamentTableBySeasonID($season_id) //Запрос турнирной таблицы по сезону
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&season_id=".$season_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/standings");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function scorerByTourID($tour_id) //Запрос бомбардиров по туру
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&tour_id=".$tour_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/goalscores");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function scorerByStageID($stage_id) //Запрос бомбардиров по этапу
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&stage_id=".$stage_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/goalscores");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function scorerBySeasonID($season_id) //Запрос бомбардиров по сезону
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&season_id=".$season_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/goalscores");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function scorerByChampID($champ_id) //Запрос бомбардиров по чемпионату
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&champ_id=".$champ_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/goalscores");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function cardsByTourID($tour_id) //Запрос карточек по туру
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&tour_id=".$tour_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/champ/cards");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function cardsByStageID($stage_id) //Запрос карточек по этапу
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&stage_id=".$stage_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/champ/cards");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function cardsBySeasonID($season_id) //Запрос карточек по сезону
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&season_id=".$season_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/champ/cards");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function cardsByChampID($champ_id) //Запрос карточек по чемпионату
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&champ_id=".$champ_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/champ/cards");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function listSeasonTournaments($alias) //Запрос списка сезонов турнира
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&alias=".$alias);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/champseasons");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function altTournamentTableByTourID($tour_id) //Альтернативный запрос турнирной таблицы по туру
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&tour_id=".$tour_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/allstandings");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function altTournamentTableByStageID($stage_id) //Альтернативный запрос турнирной таблицы по этапу
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&stage_id=".$stage_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/allstandings");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function altTournamentTableBySeasonID($season_id) //Альтернативный запрос турнирной таблицы по сезону
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&season_id=".$season_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/allstandings");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function listToursInTournaments($alias) //Запрос списка туров в турнире
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&alias=".$alias);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/tours");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function listStartTournamentEventsByTourID($tour_id,$limit=null,$order=null,$played=null) //Запрос стартового списка событий по туру
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&tour_id=".$tour_id."&limit=".$limit."&order=".$order."&played=".$played);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/tsmatches/start");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function listStartTournamentEventsBySeasonID($season_id,$limit=null,$order=null,$played=null) //Запрос стартового списка событий по сезону
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&tour_id=".$season_id."&limit=".$limit."&order=".$order."&played=".$played);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/tsmatches/start");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function listTournamentEventsByTourID($tour_id,$limit=null,$offset=null, $order=null, $fromdate = null, $todate = null,$played=null) //Запрос списка событий по туру
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&tour_id=".$tour_id."&limit=".$limit."&order=".$order."&played=".$played."&offset=".$offset."&fromdate=".$fromdate."&todate=".$todate);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/tsmatches");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function listTournamentEventsBySeasonID($season_id,$limit=null,$offset=null, $order=null, $fromdate = null, $todate = null,$played=null) //Запрос списка событий по сезону
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&tour_id=".$season_id."&limit=".$limit."&order=".$order."&played=".$played."&offset=".$offset."&fromdate=".$fromdate."&todate=".$todate);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/tsmatches");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function teamInfo($id) //Запрос данных о команде
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/clubs/" . $id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function listUserTeams($type, $gathertool_trial_info) //Запрос списка команд пользователя
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&type=".$type."&gathertool_trial_info=".$gathertool_trial_info);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/clubs/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function teamPlayers($alias,$match_id=null,$season=null) //Запрос списка игроков команды
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token ."&alias=".$alias."&match_id=".$match_id."&season=".$season);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/club/persons");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function allSeasonsTeamPlayed($alias) //Запрос всех сезонов в которых участвовала команда
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&alias=".$alias);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/clubseasons");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function getAssocList() //Запрос списка доступных ассоциаций
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/associations");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function getAssocTournaments($association_id) //Запрос турниров ассоциаций.
    {
        $ch = $this->ch;
        $c_id = $this->c_id;
        $c_token = $this->c_token;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "c_id=" . $c_id . "&c_token=" . $c_token."&association_id=".$association_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/associations/champs");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function getIdByLoginAndMail($email, $login) //Запрос идентификатора пользователя по логину и паролю
    {
        $ch = $this->ch;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "email=".$email."&login=".$login);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/associate");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }

    public function checkPlayerConnectionToUser($email, $login,$person_id) //Проверка связи игрока с пользователем
    {
        $ch = $this->ch;
        curl_setopt($ch, CURLOPT_POSTFIELDS, "email=".$email."&login=".$login."&person_id=".$person_id);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/api/associate");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        var_dump($obj);
    }


}

$list = new getApi('8', 'gg58bb1zueskd1cry6tv5vp4j2');
$list->matchList("company", "y", null, null, null, null, null, null, null, null, null, 1);

?>

