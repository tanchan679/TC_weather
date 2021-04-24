<h1>Cài đặt</h1>
<h2>Thêm địa điểm mới</h2>
<form method="post" action="options.php" novalidate="novalidate">
    <input type='hidden' name="option_page" value="<?php echo $this->option_group?>" />
    <input type="hidden" name="action" value="update" />
    <?php wp_nonce_field($this->option_group . '-options'); ?>
    <table class="form-table" role="presentation">

        <tr>
            <th scope="row"><label for="Tc_setting">Tên địa điểm</label></th>
            <td><input name="Tc_setting[0]" type="text" id="Tc_setting" class="regular-text"/></td>
        </tr>
        <tr class="" >
            <th scope="row"><label for="timkiem">Tìm kiếm</label></th>
            <td><p id="timkiem" name="timkiem">Không tìm thấy</p></td>
        </tr>
    </table>
 <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Thêm mới"  /></p>    </form>


<h2 style="margin-top: 100px">Xóa địa điểm</h2>
<form method="post" action="options.php" novalidate="novalidate">
    <input type='hidden' name="option_page" value="<?php echo $this->option_group?>" />
    <input type="hidden" name="action" value="update" />
    <?php wp_nonce_field($this->option_group . '-options'); ?>
    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="Tc_setting">Chọn địa điểm</label></th>
            <td>
                <select name="Tc_setting[1]" type="text" id="Tc_setting[1]" class="regular-text">
                    <?php
                        $listCity = json_decode(get_option("Tc_setting"));
                        foreach ($listCity as $city)
                        {
                            echo "<option value='$city->cityname'>$city->cityname</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
    </table>
    <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Xóa địa điểm"  /></p>    </form>
