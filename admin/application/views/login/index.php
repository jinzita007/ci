<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/5/6
 * Time: 上午9:27
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view("template/login_header") ?>


<div class="ui one column center aligned grid">


    <div class="column four wide form-holder">
        <h2 class="center aligned header form-head">羽翼</h2>


        <form action="<?php echo site_url("login/index")?>" method="post" class="ui fluid form" accept-charset="utf-8">

            <div class="field">
                <div class="ui left icon input">
                    <input type="text" name="username" placeholder="用户名" value="<?php echo set_value('username'); ?>">
                    <i class="user icon"></i>
                </div>
                <span class="" style="color: orangered"><?php echo form_error('username'); ?></span>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <input type="password" name="password" placeholder="密码" value="<?php echo set_value('password'); ?>">
                    <i class="lock icon"></i>
                </div>
                <span class="" style="color: orangered"><?php echo form_error('password'); ?></span>
            </div>
            <div class="inline field">
                <div class="ui checkbox">
                    <input type="checkbox">
                    <label>记住我</label>
                </div>
            </div>

            <div class="field">
                <input type="submit" name="submit" value="登录" class="ui button large fluid green">
            </div>

            <?php echo $this->session->flashdata('msg'); ?>

        </form>

    </div>
</div>
</body>