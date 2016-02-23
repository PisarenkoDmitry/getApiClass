<?php
require 'Person.php';
require 'Team.php';
require 'Match.php';
require 'Championship.php';
require 'Season.php';
require 'CurrentSeason.php';
require 'Association.php';
require 'PlayerStatistics.php';
require 'SeasonChampionship.php';
require 'Building.php';


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
    const PLAYER_URL = 'api/persons/';
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
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
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
        $seasons = [];
        $response = $this->postRequest($params, self::TOURNAMENT_LIST_URL);
        $champ = new Championship();
        $champ->setIndetity($response['championship']['identity']);
        $champ->setLogo($response['championship']['logo']);
        $champ->setState($response['championship']['state']);
        $champ->setHref($response['championship']['href']);
        $champ->setTitle($response['championship']['title']);
        $champ->setCity($response['championship']['city']);
        foreach ($response['seasons'] as $item) {
            $season = new Season();
            $season->setIndetity($item['identity']);
            $season->setTitle($item['title']);
            $season->setHref($item['href']);
            $season->setChampionshipId($item['championship_id']);
            $season->setStartDate($item['start_date']);
            $season->setEndDate($item['end_date']);
            $season->setLogo($item['logo']);
            $seasons[] = $season;
        }
        $result = array(
            'championship' => $champ,
            'seasons' => $seasons,
        );

        return $result;
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
        $response = $this->postRequest($params, self::CLUBS_URL . $id);
        $team = new Team();
        $team->setLogo($response['logo']);
        $team->setTitle($response['title']);
        $team->setId($response['id']);
        $team->setAlias($response['alias']);
        $team->setRate($response['rate']);
        $team->setCity($response['city']);
        $team->setHref($response['href']);
        $team->setSelf($response['product_gathertool']);
        return $team;
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
        $seasons = [];
        $response = $this->postRequest($params, self::SEASONS_URL);
//        foreach ($response['seasons'] as $item){
//                $season = new Season();
//                $season->setIndetity($item['identity']);
//                $season->setTitle($item['title']);
//                $season->setHref($item['href']);
//                $season->setChampionshipId($item['championship_id']);
//                $season->setStartDate($item['start_date']);
//                $season->setEndDate($item['end_date']);
//                $season->setLogo($item['logo']);
//                $seasons[]=$season;
//        }
        return $response;
    }

    public function getAssocList() //Запрос списка доступных ассоциаций
    {
        $params = [];
        $response = $this->postRequest($params, self::ASSOCIATIONS_URL);
        return $response;
    }

    public function getAssocTournaments($association_id = null) //Запрос турниров ассоциаций.
    {
        $params['association_id='] = $association_id;
        $response = $this->postRequest($params, self::ASSOC_TOURS_URL);
        $assoc = array();
        foreach ($response as $el) {
            $params['association_id='] = $el;
            foreach ($el as $result) {
                foreach ($result as $item) {
                    $association = new Association();
                    $current_season = new Current_season();
                    $association->setIndetity($item['identity']);
                    $association->setHref($item['href']);
                    $association->setTitle($item['title']);
                    $association->setLogo($item['logo']);
                    $association->setState($item['state']);
                    $association->setState($item['state']);
                    $association->setCity($item['city']);
                    $association->setSportId($item['sport_id']);
                    $association->setTypeId($item['type_id']);
                    $current_season->setIndetity($item['current_season']['identity']);
                    $current_season->setTitle($item['current_season']['title']);
                    $current_season->setBuilding($item['current_season']['building']);
                    $current_season->setStartDate($item['current_season']['start_date']);
                    $current_season->setEndDate($item['current_season']['end_date']);
                    $current_season->setLogo($item['current_season']['logo']);
                    $association->setCurrentSeason($current_season);
                    $assoc[] = $association;


                }
            }

        }
        return $assoc;
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
        $response = $this->postRequest($params, self::MATCH_LIST_URL . '/' . $id);
        $match = new Match();
        $match->setLength($response['match']['length']);
        $match->setDateTime($response['match']['datetime']);
        $match->setHomeClub($response['match']['home_club']);
        $match->setScore($response['match']['score']);
        $match->setPlayed($response['match']['played']);
        $match->setSeason($response['match']['season']);
        $match->setTour($response['match']['tour']);
        $match->setAwayClub($response['match']['away_club']);
        $match->setBuilding($response['match']['building']);
        $season = new Season();
        $champ = new Championship();
        $champ->setIndetity($response['match']['championship']['identity']);
        $champ->setState($response['match']['championship']['state']);
        $champ->setLogo($response['match']['championship']['logo']);
        $champ->setHref($response['match']['championship']['href']);
        $champ->setTitle($response['match']['championship']['title']);
        $champ->setCity($response['match']['championship']['city']);
        $match->setChampionship($champ);

        $season->setIndetity($response['match']['season']['identity']);
        $season->setTitle($response['match']['season']['title']);
        $season->setHref($response['match']['season']['href']);
        $season->setChampionshipId($response['match']['season']['championship_id']);
        $season->setStartDate($response['match']['season']['start_date']);
        $season->setEndDate($response['match']['season']['end_date']);
        $season->setLogo($response['match']['season']['logo']);
        $match->setSeason($season);

        return $match;

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
        $response = $this->postRequest($params, self::PLAYER_URL . $id);
        $person = new Person();
        $person->setFoto($response['person']['foto_url']);
        $person->setName($response['person']['name']);
        $person->setDay($response['person']['born']['day']);
        $person->setMonth($response['person']['born']['month']);
        $person->setYear($response['person']['born']['year']);
        $person->setAlias($response['person']['alias']);
        $person->setCurrentCareerClubs($response['person']['current_career_clubs']['0']);
        return $person;
    }

    public function playerStat($id) //Запрос статистических данных об игроке
    {
        $params = [];
        $this->postRequest($params, self::PLAYER_STAT_URL . $id . "/careerstats");
    }

    public function detailPlayerStat($id) //Запрос детальных статистических данных об игроке
    {
        $params = [];
        $result = [];
        $response = $this->postRequest($params, self::PLAYER_STAT_URL . $id . "/careerdetailedstats");
        foreach ($response['details'] as $value) {
            foreach ($value as $item) {

                $playerStat = new playerStatistics();
                $champ = new Championship();
                $season = new Season();

                $playerStat->setChamp($item['champ']);
                $playerStat->setSeason($item['season']);
                $playerStat->setClub($item['club']);
                $playerStat->setGames($item['games']);
                $playerStat->setSubs($item['subs']);
                $playerStat->setGoals($item['goals']);
                $playerStat->setAssists($item['assists']);
                $playerStat->setYellow($item['yellow']);
                $playerStat->setRed($item['red']);
                $playerStat->setVoteAvg($item['voteAvg']);

                $champ->setIndetity($item['champ']['identity']);
                $champ->setState($item['champ']['state']);
                $champ->setLogo($item['champ']['logo']);
                $champ->setHref($item['champ']['href']);
                $champ->setTitle($item['champ']['title']);
                $champ->setCity($item['champ']['city']);
                $playerStat->setChamp($champ);

                $season->setIndetity($item['season']['identity']);
                $season->setTitle($item['season']['title']);
                $season->setHref($item['season']['href']);
                $season->setChampionshipId($item['season']['championship_id']);
                $season->setStartDate($item['season']['start_date']);
                $season->setEndDate($item['season']['end_date']);
                $season->setLogo($item['season']['logo']);
                $playerStat->setSeason($season);

                $result[] = $playerStat;
            }
        }

        return $result;
    }

    public function seasonStat($id, $season) //Запрос статистики по матчам сезона
    {
        $params['season='] = $season;
        $this->postRequest($params, self::PLAYER_STAT_URL . $id . "/matchsstats");
    }

    public function getInfoBySeason($season_id)//Запрос данных турнира по идентификатору сезона.
    {
        $params = [];
        $response = $this->postRequest($params, self::SEASONS_STAT_URL . $season_id);

        $champ = new Championship();
        $champ->setIndetity($response['championship']['identity']);
        $champ->setState($response['championship']['state']);
        $champ->setLogo($response['championship']['logo']);
        $champ->setHref($response['championship']['href']);
        $champ->setTitle($response['championship']['title']);
        $champ->setCity($response['championship']['city']);

        $season = new Season();
        $season->setIndetity($response['season']['identity']);
        $season->setTitle($response['season']['title']);
        $season->setHref($response['season']['href']);
        $season->setChampionshipId($response['season']['championship_id']);
        $season->setStartDate($response['season']['start_date']);
        $season->setEndDate($response['season']['end_date']);
        $season->setLogo($response['season']['logo']);

        $current_season = new Current_season();
        $current_season->setIndetity($response['current_season']['identity']);
        $current_season->setLogo($response['current_season']['logo']);
        $current_season->setHref($response['current_season']['href']);
        $current_season->setTitle($response['current_season']['title']);
        $current_season->setBuilding($response['current_season']['building']);
        $current_season->setChampionshipId($response['current_season']['championship_id']);
        $current_season->setStartDate($response['current_season']['start_date']);
        $current_season->setEndDate($response['current_season']['end_date']);

        $params = array(
            'season' => $season,
            'match' => $champ,
            'current_season' => $current_season,
        );
        return $params;
    }

    public function getInfoByChamp($champ_id) //Запрос данных турнира по идентификатору чемпионата.
    {
        $params = [];

        $response = $this->postRequest($params, self::SEASONS_STAT_URL . $champ_id);
        $champ = new Championship();
        $champ->setIndetity($response['championship']['identity']);
        $champ->setState($response['championship']['state']);
        $champ->setLogo($response['championship']['logo']);
        $champ->setHref($response['championship']['href']);
        $champ->setTitle($response['championship']['title']);
        $champ->setCity($response['championship']['city']);

        $season = new Season();
        $season->setIndetity($response['season']['identity']);
        $season->setTitle($response['season']['title']);
        $season->setHref($response['season']['href']);
        $season->setChampionshipId($response['season']['championship_id']);
        $season->setStartDate($response['season']['start_date']);
        $season->setEndDate($response['season']['end_date']);
        $season->setLogo($response['season']['logo']);

        $params = array(
            'season' => $season,
            'match' => $champ,
        );
        return $params;
    }

    public function administratedMatches() //Запрос списка администрируемых турниров пользователя/партнера
    {
        $params = [];
        $response = $this->postRequest($params, self::USER_TOURN_LIST);
        $result = [];
        foreach ($response['list'] as $value) {
            $champ = new Championship();
            $champ->setIndetity($value['championship']['identity']);
            $champ->setState($value['championship']['state']);
            $champ->setLogo($value['championship']['logo']);
            $champ->setHref($value['championship']['href']);
            $champ->setTitle($value['championship']['title']);
            $champ->setCity($value['championship']['city']);
            $season = new Season();
            $season->setIndetity($value['season']['identity']);
            $season->setTitle($value['season']['title']);
            $season->setChampionshipId($value['season']['championship_id']);
            $season->setStartDate($value['season']['start_date']);
            $season->setEndDate($value['season']['end_date']);
            $season->setLogo($value['season']['logo']);
            $result[] = array(
                'championship' => $champ,
                'season' => $season,
            );
        }
        return $result;
    }


    public function tournamentTableByTourID($tour_id) //Запрос турнирной таблицы по туру
    {
        $params['tour_id='] = $tour_id;
        $this->postRequest($params, self::TOURNAMENT_TABLE_URL);
    }


}

$list = new getApi();

//$person = new Person();
//$person = $list->infoPlayer(10190242);
//var_dump($person);
$match = new Season();
var_dump($list->allSeasonsTeamPlayed(2065290689));

?>
