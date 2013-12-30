<?php
namespace Weather;

class Weatherd
{
    const URL = 'http://api.openweathermap.org/data/2.5/weather?q=';

    public function getWeather ($city = false)
    {
        $url = self::URL . $city . ',ru';
        $data = file_get_contents($url);
        $myArr = json_decode($data);
        return $myArr;
    }

    public function getPressure ($city = false)
    {
        $info = $this->getWeather($city);
        return $info->main->pressure;
    }

    public function getWindspeed ($city = false)
    {
        $info = $this->getWeather($city);
        return $info->wind->speed;
    }

    public function displayWeather ($city = false)
    {
        $info = 'Давление: ' . $this->getPressure($city) . '<br/>';
        $info .= 'Скорость ветра: ' . $this->getWindspeed($city);
        return $info;
    }
}