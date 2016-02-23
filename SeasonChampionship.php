<?php
class seasonChampionship
{
    //Запрос данных турнира по идентификатору сезона
    private $_champ;
    private $_season;
    private $_current_season;

    public function getChamp()
    {
        return $this->_champ;
    }
    public function getSeason()
    {
        return $this->_season;
    }
    public function getCurrentSeason()
    {
        return $this->_current_season;
    }
    public function setChamp($champ)
    {
        $this->_champ = $champ;
    }
    public function setSeason($season)
    {
        $this->_season = $season;
    }
    public function setCurrentSeason($current_season)
    {
        $this->_current_season = $current_season;
    }

}
?>