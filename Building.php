<?php class Building
{
//Везде есть

    private $_id;
    private $_title;
    private $_name;
    private $_lat;
    private $_lng;
    private $_adress;
    public function getId()
    {
        return $this->_id;
    }
    public function getTitle()
    {
        return $this->_title;
    }
    public function getName()
    {
        return $this->_name;
    }
    public function getLat()
    {
        return $this->_lat;
    }
    public function getLng()
    {
        return $this->_lng;
    }
    public function getAdress()
    {
        return $this->_adress;
    }
    public function setId($id)
    {
        $this->_id = $id;
    }
    public function setTitle($title)
    {
        $this->_title = $title;
    }
    public function setName($name)
    {
        $this->_name = $name;
    }
    public function setLat($lat)
    {
        $this->_lat = $lat;
    }
    public function setLng($lng)
    {
        $this->_lng = $lng;
    }
    public function setAdress($address)
    {
        $this->_adress = $address;
    }
}
?>