<?php
class TC_WidgetWeather  extends WP_Widget{
	public function __construct()
	{
		parent::__construct( 'tc_weatherr', "TC WEATHER WIDGET",array(
		'classname' => 'TC_WidgetWeather',
		'description' => 'Hiển thị thời tiết một số địa điểm',
	));
		add_action('widgets_init', function ()
		{
			register_widget("TC_WidgetWeather");
		});
		add_action('wp_enqueue_scripts',function (){
			wp_register_style('tc_css', TC_WEATHER_PLUGIN_URL.'script/css/mycss1.css');
			wp_enqueue_style("tc_css");

            wp_register_script('tc_jss', TC_WEATHER_PLUGIN_URL.'script/js/tc_functions.js', ['jquery']);
            wp_localize_script('tc_jss', 'tc', [
                'url' => admin_url('admin-ajax.php')
            ]);
            wp_enqueue_script("tc_jss");
		});

        add_action('wp_ajax_get_weather_by_city',  function (){
            require_once TC_WEATHER_PLUGIN_DIR . "include/TC_GetAPI_Weather.php";
            $getdata = new TC_GetAPI_Weather();
            $city="Hà Nội";
            if(isset($_POST['cityname'])) {
                $temp=$_POST['cityname'];
                if($getdata->searchRequest($temp)){
                    $city=$_POST['cityname'];
                }
            }
            $dataJson=$getdata->getDataWeather($city);
            wp_send_json_success($dataJson);
            wp_die();
        });
	}
	public function form( $instance ) {
		$title = (isset($instance['title']) && !empty($instance['title'])) ? $instance['title'] : "null";
        $maincity = (isset($instance['maincity']) && !empty($instance['maincity'])) ? $instance['maincity'] : 'celsius';
		include TC_WEATHER_PLUGIN_DIR .'view/TC_form.php';
	}

	public function widget( $args, $instance ) {
        require_once TC_WEATHER_PLUGIN_DIR . "include/TC_GetAPI_Weather.php";
		$getdata = new TC_GetAPI_Weather();
		$listCity = json_decode(get_option('TC_setting'));
        $title = (isset($instance['title']) && !empty($instance['title'])) ? $instance['title'] : "null";
        $maincity = (isset($instance['maincity']) && !empty($instance['maincity']) &&$instance['maincity']!= "Vào cài đặt để thêm địa điểm mới") ? $instance['maincity'] : 'Hà Nội';
        $getWeather = $getdata->getDataWeather($maincity);
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		require TC_WEATHER_PLUGIN_DIR.'view/TC_widget.php';
		return "noreturn";
	}
	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}



}