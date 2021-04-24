(function($) {
$(document).ready(function () {
    $("#Tc_setting").on( "change keyup paste click",function () {
        var $city = $("#Tc_setting").val();
            $.ajax({
                url: tc.url,
                type: 'POST',

                data: {
                    'action': 'search_city_ajax',
                    'cityname':$city,

                },
                beforeSend: function () {
                    $('#timkiem').html("Đang tìm kiếm...");
                },
                success: function (data) {

                    $('#timkiem').html(data);

                },
                error: function (e) {
                    $('#timkiem').html("Lỗi tìm kiếm...");
                }
            });
    })

    $("#tc_select_city").on( "change",function (){
        var $city = $("#tc_select_city").val();
        $.ajax({
            url: tc.url,
            type: 'POST',
            dataType : 'json',
            data: {
                'action': 'get_weather_by_city',
                'cityname':$city,

            },
            beforeSend: function () {
                $('#tc-name-weather').html("Đang lấy");
                $('#tc-temp_max-weather').html("Đọc dữ liệu");
                $('#tc-description-weather').html("Đọc dữ liệu");
                $('#tc-humidity-weather').html("Đọc dữ liệu");
                $('#tc-clouds-all-weather').html("Đọc dữ liệu");
                $('#tc-pressure-weather').html("Đọc dữ liệu");
                $('#tc-wind-speed-weather').html("Đọc dữ liệu");
                $('#tc-wind-deg-weather').html("Đọc dữ liệu");
            },
            success: function (data) {
                $('#tc-name-weather').html(data.data.name);
                $('#tc-icon-weather').html(data.data.weather);
                $('#tc-temp_max-weather').html(parseInt( (data.data["main"]["temp_max"] - 273))+"°C");
                $('#tc-description-weather').html(data.data["weather"][0]["description"]);
                $('#tc-humidity-weather').html(data.data["main"]["humidity"]+"%");
                $('#tc-clouds-all-weather').html(data.data["clouds"]["all"]+"%");
                $('#tc-pressure-weather').html(data.data["main"]["pressure"] +" hPa");
                $('#tc-wind-speed-weather').html(data.data["wind"]["speed"]+" m/s");
                $('#tc-wind-deg-weather').html(data.data["wind"]["deg"]+" °");
            },
            error: function (e) {
                $('#timkiem').html("Lỗi tìm kiếm...");
            }
        });
    });

})
})(jQuery);