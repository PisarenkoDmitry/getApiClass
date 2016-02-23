<?php
class Team
{
    private $_logo;
    private $_title;
    private $_id;
    private $_alias;
    private $_rate;
    private $_city;
    private $_href;
    private $_self; //(Это надо?)
    public function getLogo()
    {
        return $this->_logo;
    }
    public function getTitle()
    {
        return $this->_title;
    }
    public function getId()
    {
        return $this->_id;
    }
    public function getAlias()
    {
        return $this->_alias;
    }
    public function getRate()
    {
        return $this->_rate;
    }
    public function getCity()
    {
        return $this->_city;
    }
    public function getHref()
    {
        return $this->_href;
    }
    public function getSelf()
    {
        return $this->_self;
    }
    public function setLogo($logo)
    {
        $this->_logo = $logo;
    }
    public function setTitle($title)
    {
        $this->_title = $title;
    }
    public function setId($id)
    {
        $this->_id = $id;
    }
    public function setAlias($alias)
    {
        $this->_alias = $alias;
    }
    public function setRate($rate)
    {
        $this->_rate = $rate;
    }
    public function setCity($city)
    {
        $this->_city = $city;
    }
    public function setHref($href)
    {
        $this->_href = $href;
    }
    public function setSelf($self)
    {
        $this->_self = $self;
    }
}
?>