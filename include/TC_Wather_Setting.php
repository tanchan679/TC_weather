<?php
class TC_Wather_Setting {
	private $option;
	private $option_group="TC_option_group";
	public function __construct() {


		$option = get_option("tc_setting");
        $option_group = "Tc_setting_groud";
		add_action('admin_menu',function(){
			add_submenu_page(
				'options-general.php',
				'TC Weather Setting',
				'TC Setting',
				'manage_options',
				'Tc_setting',
				function (){
				        $listCityName = json_decode(get_option('TC_setting'));
						require TC_WEATHER_PLUGIN_DIR.'view/TC_Settingview.php';
				}
				,2
			);
		});



        add_action('admin_enqueue_scripts',function (){
            wp_register_script('tc_js', TC_WEATHER_PLUGIN_URL.'script/js/tc_functions.js', ['jquery']);
            wp_localize_script('tc_js', 'tc', [
                'url' => admin_url('admin-ajax.php')
            ]);
            wp_enqueue_script("tc_js");
        });

        add_action('wp_ajax_search_city_ajax',  function (){
            $cityname = "NULL";
            if(isset( $_POST['cityname']))  $cityname =$_POST['cityname'];
            require_once TC_WEATHER_PLUGIN_DIR . "include/TC_GetAPI_Weather.php";
            $getclass = new TC_GetAPI_Weather();
            $getcity = $getclass->searchRequest($cityname);
            if( $getcity != null) echo  $getcity;
            else echo "Không tìm thấy";
            wp_die();
        });


		add_action('admin_init', [$this, 'Register_setting']);
        add_action('admin_menu', function()
        {

        } );
	}
    public function search_city_ajax(){
        wp_send_json_success("45");
    }


	public function Register_setting()
	{
		register_setting(
			$this->option_group,
			'Tc_setting',
            function ($data){
			    if(isset($data[0])) {
                    require_once TC_WEATHER_PLUGIN_DIR . "include/TC_GetAPI_Weather.php";
                    $getclass = new TC_GetAPI_Weather();
                    if (!$getclass->searchRequest($data[0])) $data = "Hà Nội";
                    else $data = $getclass->searchRequest($data[0]);
                    $arr = array(
                        "cityname" => $data
                    );
                    $getJsonCity = json_decode(get_option("Tc_setting"));
                    foreach ($getJsonCity as &$city) {
                        echo $city->name;
                    }
                    if (sizeof($getJsonCity) == 0) $getJsonCity = array($arr);
                    else {
                        $check = 0;
                        foreach ($getJsonCity as &$city) {
                            if ($city->cityname == $arr["cityname"]) {
                                $check = 1;
                                break;
                            }
                        }
                        if ($check == 0) $getJsonCity[] = $arr;
                    }
                    return json_encode($getJsonCity);
                }
                else if(isset($data[1])){
                    $arr = array(
                        "cityname" => $data[1]
                    );
                    $Json = get_option("Tc_setting");
                    $getJsonCity = json_decode($Json);
                    $newJson = array();
                    $i=0;
                    foreach ($getJsonCity as &$city) {
                        $i=0;
                        if ($city->cityname != $arr["cityname"]) {
                            $newJson[]=(array)$city;
                        }
                    }
                    return json_encode($newJson);
                }
            }
		);
	}
}
