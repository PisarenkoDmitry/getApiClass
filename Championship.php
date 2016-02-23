<?php class Championship
{
    //Запрос данных турнира по идентификатору чемпионата/сезона
    private $_identity;
    private $_href;
    private $_title;
    private $_logo;
    private $_state;
    private $_city;

    public function getIdentity()
    {
        return $this->_identity;
    }
    public function getHref()
    {
        return $this->_href;
    }
    public function getTitle()
    {
        return $this->_title;
    }
    public function getLogo()
    {
        return $this->_logo;
    }
    public function getState()
    {
        return $this->_state;
    }
    public function getCity()
    {
        return $this->_city;
    }
    public function setIndetity($indetity)
    {
        $this->_identity = $indetity;
    }
    public function setHref($href)
    {
        $this->_href = $href;
    }
    public function setTitle($title)
    {
        $this->_title = $title;
    }
    public function setLogo($logo)
    {
        $this->_logo = $logo;
    }
    public function setState($state)
    {
        $this->_state = $state;
    }
    public function setCity($city)
    {
        $this->_city = $city;
    }
}
?>