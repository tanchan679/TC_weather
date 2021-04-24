<?php
if ( ! function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}
class TC_GetAPI_Weather {
	public function __construct()
    {
    }

    public function get_JSON( $json ) {
        return json_decode( $json, true );
    }
    public function getDataWeather($city) {
        $city = urlencode( trim( $city ) );
        $url  = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=69483b6ea074fb610f0aed948e242d48&lang=vi";
        @$fget = file_get_contents($url);
        if ( $fget ) {
            return $this->get_JSON($fget);
        }
        return false;
    }
	public function searchRequest( $city ) {
		$city = urlencode( trim( $city ) );
		$url  = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=69483b6ea074fb610f0aed948e242d48&lang=vi";
		@$fget = file_get_contents($url);
		if ( $fget ) {
			$data = $this->get_JSON($fget);
			if(isset($data['name'])) return $data['name'];
			else return null;
		}
		return null;
	}
}
?>