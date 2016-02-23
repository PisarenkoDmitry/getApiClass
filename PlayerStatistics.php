<?php class playerStatistics
{
    //Запрос детальных статистических данных об игроке

    private $_champ;
    private $_season;
    private $_club;
    private $_games;
    private $_subs;
    private $_goals;
    private $_assists;
    private $_yellow;
    private $_red;
    private $_voteAvg;
    public function getChamp()
    {
        return $this->_champ;
    }
    public function getSeason()
    {
        return $this->_season;
    }
    public function getClub()
    {
        return $this->_club;
    }
    public function getGames()
    {
        return $this->_games;
    }
    public function getSubs()
    {
        return $this->_subs;
    }
    public function getGoals()
    {
        return $this->_goals;
    }
    public function getAssists()
    {
        return $this->_assists;
    }
    public function getYellow()
    {
        return $this->_yellow;
    }
    public function getRed()
    {
        return $this->_red;
    }
    public function getVoteAvg()
    {
        return $this->_voteAvg;
    }
    public function setChamp($champ)
    {
        $this->_champ = $champ;
    }
    public function setSeason($season)
    {
        $this->_season = $season;
    }
    public function setClub($club)
    {
        $this->_club = $club;
    }
    public function setGames($games)
    {
        $this->_games = $games;
    }
    public function setSubs($subs)
    {
        $this->_subs = $subs;
    }
    public function setGoals($goals)
    {
        $this->_goals = $goals;
    }
    public function setAssists($assists)
    {
        $this->_assists = $assists;
    }
    public function setYellow($yellow)
    {
        $this->_yellow = $yellow;
    }
    public function setRed($red)
    {
        $this->_red = $red;
    }
    public function setVoteAvg($voteAvg)
    {
        $this->_voteAvg = $voteAvg;
    }
}
?>