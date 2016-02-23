<?php class Match
{
    //Запрос данных о матче
    private $_championship;
    private $_season;
    private $_tour;
    private $_home_club;
    private $_away_club;
    private $_score;
    private $_length;
    private $_datetime;
    private $_likes_count;
    private $_comments_count;
    private $_played;
    private $_building;
    public function getChampionship()
    {
        return $this->_championship;
    }
    public function getSeason()
    {
        return $this->_season;
    }
    public function getTour()
    {
        return $this->_tour;
    }
    public function getHomeClub()
    {
        return $this->_home_club;
    }
    public function getAwayClub()
    {
        return $this->_away_club;
    }
    public function getScore()
    {
        return $this->_score;
    }
    public function getLength()
    {
        return $this->_length;
    }
    public function getDateTime()
    {
        return $this->_datetime;
    }
    public function getLikesCount()
    {
        return $this->_likes_count;
    }
    public function getCommentsCount()
    {
        return $this->_comments_count;
    }
    public function getPlayed()
    {
        return $this->_played;
    }
    public function get_Building()
    {
        return $this->_building;
    }
    public function setChampionship($championship)
    {
        $this->_championship = $championship;
    }
    public function setSeason($season)
    {
        $this->_season = $season;
    }
    public function setTour($tour)
    {
        $this->_tour = $tour;
    }
    public function setHomeClub($home_club)
    {
        $this->_home_club = $home_club;
    }
    public function setAwayClub($away_club)
    {
        $this->_away_club = $away_club;
    }
    public function setScore($score)
    {
        $this->_score = $score;
    }
    public function setLength($_length)
    {
        $this->_length = $_length;
    }
    public function setDateTime($datetime)
    {
        $this->_datetime = $datetime;
    }
    public function setLikesCount($likes_count)
    {
        $this->_likes_count = $likes_count;
    }
    public function setCommentsCount($comments_count)
    {
        $this->_comments_count = $comments_count;
    }
    public function setPlayed($played)
    {
        $this->_played = $played;
    }
    public function setBuilding($building)
    {
        $this->_building = $building;
    }
}
?>