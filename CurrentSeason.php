<?php class Current_season
{
    //Запрос данных турнира по идентификатору сезона (текущий_сезон)
    private $_identity;
    private $_title;
    private $_href;
    private $_championship_id;
    private $_start_date;
    private $_end_date;
    private $_logo;
    private $_building;

    public function getIdentity()
    {
        return $this->_identity;
    }
    public function getTitle()
    {
        return $this->_title;
    }
    public function getHref()
    {
        return $this->_href;
    }
    public function getChampionshipId()
    {
        return $this->_championship_id;
    }
    public function getStartDate()
    {
        return $this->_start_date;
    }
    public function getEndDate()
    {
        return $this->_end_date;
    }
    public function getLogo()
    {
        return $this->_logo;
    }
    public function getBuilding()
    {
        return $this->_building;
    }
    public function setIndetity($indetity)
    {
        $this->_identity = $indetity;
    }
    public function setTitle($title)
    {
        $this->_title = $title;
    }
    public function setHref($href)
    {
        $this->_href = $href;
    }
    public function setChampionshipId($championship_id)
    {
        $this->_championship_id = $championship_id;
    }
    public function setStartDate($start_date)
    {
        $this->_start_date = $start_date;
    }
    public function setEndDate($end_date)
    {
        $this->_end_date = $end_date;
    }
    public function setLogo($logo)
    {
        $this->_logo = $logo;
    }
    public function setBuilding($building)
    {
        $this->_building = $building;
    }

}
?>