<p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __("Title:")?></label>
    <input class="widefat" id="<?php 	echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php 	echo $instance['title']; ?>" />

    <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __("Hiển thị mặc định:")?></label>
    <select class="widefat" id="<?php  	echo $this->get_field_id('maincity'); ?>" name="<?php echo $this->get_field_name('maincity'); ?>" type="text" >
        <?php
         $listCity = json_decode(get_option("Tc_setting"));
         if(sizeof($listCity) == 0) echo "<option>Vào cài đặt để thêm địa điểm mới</option>";
        foreach ($listCity as $city){
            echo "<option value='$city->cityname'"; if($city->cityname == $instance['maincity']) echo "selected";echo ">$city->cityname</option>";
        }
        ?>
    </select>
</p>

