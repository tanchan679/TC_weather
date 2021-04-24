<div style="box-shadow: 0px 0px 3px 3px #0070d0;border-radius: 5px; margin-bottom: 25px">
    <div style="background: #0077dd; width: 100%;  padding: 3px; border-radius: 5px;">
        <table class="tc_weather_tabble" style="box-shadow: 0px 0px 3px 3px #0070d0;">
            <tr>
                <td style="width: 70%; max-width: 70%">
                    <div id="tc-name-weather" style="color: #fff; line-height: 30px; font-size: 22px"><?php echo $getWeather["name"]?></div>
                    <div style="color: #ddd; font-size: 15px; line-height: 15px; font-family: serif;" ><?php echo date("Y-m-d H:i") ?></div>
                </td>
                <td style="width: 30%; max-width: 30%">
                    <select id="tc_select_city"  onchange="val()" class="tc_weather_select" style="width:100%;background: none; border: none; color: #ccc; color: #def">
                       <?php
                       if(sizeof($listCity) == 0) echo "<option value='Hà Nội'>Hà Nội</option>";
                       else{
                           foreach ($listCity as $city){
                               echo "<option style='width:100%;' value='$city->cityname'>$city->cityname</option>";
                           }
                       }
                       ?>
                    </select></td>
            </tr>
        </table>
        <table style="margin-top: 5px; border: #cde;  ">
            <tr style="background: #cde; border: #cde;">
                <td style=" border: #cde; width: 50%; text-align: center ">
                    <img id="tc-icon-weather" style="width: 100px;min-height: 100px" src="http://openweathermap.org/img/wn/<?php echo $getWeather["weather"][0]["icon"]?>@2x.png">
                </td>
                <td   id="tc-temp_max-weather" style="color:#FF6600; font-size:45px;  border: #cde;width: 50%; text-align: center">
					<?php echo (int)($getWeather["main"]["temp_max"] - 273)?>°C
                </td>
            </tr>
        </table>

        <table   class="tc_weather_tabble" style="box-shadow: 0px 0px 3px 3px #0070d0;background: #1f7fdf; color: #f8f8f8; border-radius: 2px; padding: 5px;  ">
            <tr>
                <td>Thời tiết: </td> <td  id="tc-description-weather"><?php echo $getWeather["weather"][0]["description"] ?></td>
            </tr>
            <tr>
                <td>Độ ẩm: </td> <td  id="tc-humidity-weather"><?php echo $getWeather["main"]["humidity"] ?>%</td>
            </tr>
            <tr>
                <td>Mây:</td> <td  id="tc-clouds-all-weather"><?php echo$getWeather["clouds"]["all"]?>%</td>
            </tr>
            <tr>
                <td>Áp suất khí quển:</td> <td  id="tc-pressure-weather"><?php echo$getWeather["main"]["pressure"] ?> hPa</td>
            </tr>
            <tr>
                <td>Tốc độ gió:</td> <td  id="tc-wind-speed-weather"><?php echo$getWeather["wind"]["speed"] ?> m/s</td>
            </tr>
            <tr>
                <td>Hướng gió:</td> <td  id="tc-wind-deg-weather"><?php echo$getWeather["wind"]["deg"] ?>°</td>
            </tr>
        </table>
        <div style="width: 100%; color:#CDC9C9;  text-align: center; font-size: 12px; font-family:serif">Blugin by tanchan679</div>
    </div>
</div>