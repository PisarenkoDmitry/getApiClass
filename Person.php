<?php
class Person
{
    private $_foto_url;
    private $_name;
    private $_year;
    private $_month;
    private $_day;
    private $_alias;
    private $_current_career_clubs;

    public function getFoto()
    {
        return $this->_foto_url;
    }
    public function getName()
    {
        return $this->_name;
    }
    public function getYear()
    {
        return $this->_year;
    }
    public function getMonth()
    {
        return $this->_month;
    }
    public function getDay()
    {
        return $this->_day;
    }
    public function getAlias()
    {
        return $this->_alias;
    }
    public function getCurrentCareerClubs()
    {
        return $this->_current_career_clubs;
    }


    public function setFoto($foto_url)
    {
        $this->_foto_url = $foto_url;
    }
    public function setName($name)
    {
        $this->_name = $name;
    }
    public function setYear($year)
    {
        $this->_year = $year;
    }
    public function setMonth($month)
    {
        $this->_month = $month;
    }
    public function setDay($day)
    {
        $this->_day = $day;
    }
    public function setAlias($alias)
    {
        $this->_alias = $alias;
    }
    public function setCurrentCareerClubs($current_career_clubs)
    {
        $this->_current_career_clubs = $current_career_clubs;
    }

}
?>