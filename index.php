<?php


class getApi
{
    const MATCH_LIST_URL = 'api/matches';
    const TOURNAMENT_TABLE_URL = 'api/standings';
    const SCORER_URL = 'api/goalscores';
    const CARDS_URL = 'api/champ/cards';
    const TOURNAMENT_LIST_URL = 'api/champseasons';
    const ALT_LIST_TOURNAMENT_URL = 'api/allstandings';
    const TOUR_LIST_URL = 'api/tours';
    const START_LIST_URL = 'api/tsmatches/start';
    const EVENTS_LIST_URL = 'api/tsmatches';
    const CLUBS_URL = 'api/clubs/';
    const PLAYERS_LIST_URL = 'api/club/persons';
    const SEASONS_URL = 'api/clubseasons';
    const ASSOCIATIONS_URL = 'api/associations';
    const ASSOC_TOURS_URL = 'api/associations/champs';
    const USER_ASSOC_URL = 'api/associate';
    const EVENT_URL = 'api/events/';
    const PLAYER_URL = 'api/person/';
    const PLAYER_STAT_URL = 'api/person/';
    const SEASONS_STAT_URL = 'api/seasons/';
    const USER_TOURN_LIST = 'api/mychamps';


    public function getCID()
    {
        return '8';
    }

    public function getCToken()
    {
        return 'gg58bb1zueskd1cry6tv5vp4j2';
    }

    public function postRequest($params, $url)
    {
        $params['c_id='] = $this->getCID();
        $params['c_token='] = $this->getCToken();
        $new = [];
        foreach ($params as $name => $value) {
            $new[] = $name . $value;

        }
        $str = implode($new, "&");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $str);
        curl_setopt($ch, CURLOPT_URL, "http://www.goalstream.org:8015/" . $url);
        $obj = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $obj;

    }

    public function matchList($type, $played, $limit = null, $order = null, $offset = null, $fromdate = null, $todate = null, $season = null, $championship = null, $itemtype = null, $itemid = null, $listdata = null)
    {
        $params['type='] = $type;
        $params['played='] = $played;
        $params['limit='] = $limit;
        $params['order='] = $order;
        $params['offset='] = $offset;
        $params['fromdate='] = $fromdate;
        $params['todate='] = $todate;
        $params['season='] = $season;
        $params['championship='] = $championship;
        $params['itemtype='] = $itemtype;
        $params['itemid='] = $itemid;
        $params['listdata='] = $listdata;
        $this->postRequest($params, self::MATCH_LIST_URL);

    }

    public function tournamentTableByStageID($stage_id) //Запрос турнирной таблицы по этапу
    {
        $params['stage_id='] = $stage_id;
        $this->postRequest($params, self::TOURNAMENT_TABLE_URL);
    }

    public function tournamentTableBySeasonID($season_id) //Запрос турнирной таблицы по сезону
    {
        $params['season_id='] = $season_id;
        $this->postRequest($params, self::TOURNAMENT_TABLE_URL);
    }

    public function scorerByTourID($tour_id) //Запрос бомбардиров по туру
    {
        $params['tour_id='] = $tour_id;
        $this->postRequest($params, self::SCORER_URL);
    }

    public function scorerByStageID($stage_id) //Запрос бомбардиров по этапу
    {
        $params['stage_id='] = $stage_id;
        $this->postRequest($params, self::SCORER_URL);
    }

    public function scorerBySeasonID($season_id) //Запрос бомбардиров по сезону
    {
        $params['season_id='] = $season_id;
        $this->postRequest($params, self::SCORER_URL);
    }

    public function scorerByChampID($champ_id) //Запрос бомбардиров по чемпионату
    {
        $params['champ_id='] = $champ_id;
        $this->postRequest($params, self::SCORER_URL);
    }

    public function cardsByTourID($tour_id) //Запрос карточек по туру
    {
        $params['tour_id='] = $tour_id;
        $this->postRequest($params, self::CARDS_URL);
    }

    public function cardsByStageID($stage_id) //Запрос карточек по этапу
    {
        $params['stage_id='] = $stage_id;
        $this->postRequest($params, self::CARDS_URL);
    }

    public function cardsBySeasonID($season_id) //Запрос карточек по сезону
    {
        $params['season_id='] = $season_id;
        $this->postRequest($params, self::CARDS_URL);
    }

    public function cardsByChampID($champ_id) //Запрос карточек по чемпионату
    {
        $params['champ_id='] = $champ_id;
        $this->postRequest($params, self::CARDS_URL);
    }

    public function listSeasonTournaments($alias) //Запрос списка сезонов турнира
    {
        $params['alias='] = $alias;
        $this->postRequest($params, self::TOURNAMENT_LIST_URL);
    }

    public function altTournamentTableByTourID($tour_id) //Альтернативный запрос турнирной таблицы по туру
    {
        $params['tour_id='] = $tour_id;
        $this->postRequest($params, self::ALT_LIST_TOURNAMENT_URL);
    }

    public function altTournamentTableByStageID($stage_id) //Альтернативный запрос турнирной таблицы по этапу
    {
        $params['stage_id='] = $stage_id;
        $this->postRequest($params, self::ALT_LIST_TOURNAMENT_URL);
    }

    public function altTournamentTableBySeasonID($season_id) //Альтернативный запрос турнирной таблицы по сезону
    {
        $params['season_id='] = $season_id;
        $this->postRequest($params, self::ALT_LIST_TOURNAMENT_URL);
    }

    public function listToursInTournaments($alias) //Запрос списка туров в турнире
    {
        $params['alias='] = $alias;
        $this->postRequest($params, self::TOUR_LIST_URL);
    }

    public function listStartTournamentEventsByTourID($tour_id, $limit = null, $order = null, $played = null) //Запрос стартового списка событий по туру
    {
        $params['tour_id='] = $tour_id;
        $params['limit='] = $limit;
        $params['order='] = $order;
        $params['played='] = $played;
        $this->postRequest($params, self::START_LIST_URL);
    }

    public function listStartTournamentEventsBySeasonID($season_id, $limit = null, $order = null, $played = null) //Запрос стартового списка событий по сезону
    {
        $params['season_id='] = $season_id;
        $params['limit='] = $limit;
        $params['order='] = $order;
        $params['played='] = $played;
        $this->postRequest($params, self::START_LIST_URL);
    }

    public function listTournamentEventsByTourID($tour_id, $limit = null, $offset = null, $order = null, $fromdate = null, $todate = null, $played = null) //Запрос списка событий по туру
    {
        $params['tour_id='] = $tour_id;
        $params['played='] = $played;
        $params['limit='] = $limit;
        $params['order='] = $order;
        $params['offset='] = $offset;
        $params['fromdate='] = $fromdate;
        $params['todate='] = $todate;
        $this->postRequest($params, self::EVENTS_LIST_URL);
    }

    public function listTournamentEventsBySeasonID($season_id, $limit = null, $offset = null, $order = null, $fromdate = null, $todate = null, $played = null) //Запрос списка событий по сезону
    {
        $params['season_id='] = $season_id;
        $params['played='] = $played;
        $params['limit='] = $limit;
        $params['order='] = $order;
        $params['offset='] = $offset;
        $params['fromdate='] = $fromdate;
        $params['todate='] = $todate;
        $this->postRequest($params, self::EVENTS_LIST_URL);
    }

    public function teamInfo($id) //Запрос данных о команде
    {
        $params = [];
        $this->postRequest($params, self::CLUBS_URL . $id);
    }

    public function listUserTeams($type, $gathertool_trial_info) //Запрос списка команд пользователя
    {
        $params['type='] = $type;
        $params['gathertool_trial_info='] = $gathertool_trial_info;
        $this->postRequest($params, self::CLUBS_URL);
    }

    public function teamPlayers($alias, $match_id = null, $season = null) //Запрос списка игроков команды
    {
        $params['alias='] = $alias;
        $params['match_id='] = $match_id;
        $params['season='] = $season;
        $this->postRequest($params, self::PLAYERS_LIST_URL);
    }

    public function allSeasonsTeamPlayed($alias) //Запрос всех сезонов в которых участвовала команда
    {
        $params['alias='] = $alias;
        $this->postRequest($params, self::SEASONS_URL);
    }

    public function getAssocList() //Запрос списка доступных ассоциаций
    {
        $params = [];
        $this->postRequest($params, self::ASSOCIATIONS_URL);
    }

    public function getAssocTournaments($association_id = null) //Запрос турниров ассоциаций.
    {
        $params['association_id='] = $association_id;
        $this->postRequest($params, self::ASSOC_TOURS_URL);
    }

    public function getIdByLoginAndMail($email, $login) //Запрос идентификатора пользователя по логину и паролю
    {
        $params['email='] = $email;
        $params['login='] = $login;
        $this->postRequest($params, self::USER_ASSOC_URL);
    }

    public function checkPlayerConnectionToUser($email, $login, $person_id) //Проверка связи игрока с пользователем
    {
        $params['email='] = $email;
        $params['login='] = $login;
        $params['person_id='] = $person_id;
        $this->postRequest($params, self::USER_ASSOC_URL);
    }

    public function matchInfo($id) //Запрос данных о матче.
    {
        $params = [];
        $this->postRequest($params, self::MATCH_LIST_URL . '/' . $id);
    }

    public function matchPlayers($id) //Запрос составов матча.
    {
        $params = [];
        $this->postRequest($params, self::MATCH_LIST_URL . '/' . $id . '/lineups');
    }

    public function matchPlayersList($id) //Запросы списка игроков для матча.
    {
        $params = [];
        $this->postRequest($params, self::MATCH_LIST_URL . '/' . $id . '/personlist');
    }

    public function matchEvents($id) //Запрос событий матча
    {
        $params = [];
        $this->postRequest($params, self::MATCH_LIST_URL . '/' . $id . '/events');
    }

    public function wholeMatchEvents($objtype, $objid, $type = null, $limit = null, $offset = null) //Общий запрос событий
    {
        $params['type='] = $type;
        $params['objtype='] = $objtype;
        $params['limit='] = $limit;
        $params['offset='] = $offset;
        $params['objid='] = $objid;
        $this->postRequest($params, self::EVENT_URL);
    }

    public function infoPlayer($id) // Запрос данных об игроке.
    {
        $params = [];
        $this->postRequest($params, self::PLAYER_URL . $id);
    }

    public function playerStat($id) //Запрос статистических данных об игроке
    {
        $params = [];
        $this->postRequest($params, self::PLAYER_STAT_URL . $id . "/careerstats");
    }

    public function detailPlayerStat($id) //Запрос детальных статистических данных об игроке
    {
        $params = [];
        $this->postRequest($params, self::PLAYER_STAT_URL . $id . "/careerdetailedstats");
    }

    public function seasonStat($id, $season) //Запрос статистики по матчам сезона
    {
        $params['season='] = $season;
        $this->postRequest($params, self::PLAYER_STAT_URL . $id . "/matchsstats");
    }

    public function getInfoBySeason($season_id)//Запрос данных турнира по идентификатору сезона.
    {
        $params = [];
        $this->postRequest($params, self::SEASONS_STAT_URL . $season_id);
    }

    public function getInfoByChamp($champ_id) //Запрос данных турнира по идентификатору чемпионата.
    {
        $params = [];
        $this->postRequest($params, self::SEASONS_STAT_URL . $champ_id);
    }

    public function administratedMatches() //Запрос списка администрируемых турниров пользователя/партнера
    {
        $params = [];
        $this->postRequest($params, self::USER_TOURN_LIST);
    }

    public function tournamentTableByTourID($tour_id) //Запрос турнирной таблицы по туру
    {
        $params['tour_id='] = $tour_id;
        $this->postRequest($params, self::TOURNAMENT_TABLE_URL);
    }


}

$list = new getApi();

$list->administratedMatches();
?>

