<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/5/5
 * Time: 上午10:27
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view("template/header") ?>
<?php $this->load->view("template/sidebar") ?>


<div class="ui container">
    <!--the content-->
    <div class="ui grid">
        <!--the vertical menu-->
        <div class="four wide column">
            <div class="verticalMenu">
                <div class="ui vertical pointing menu fluid">
                    <a class="item" href="<?php echo site_url("setting/index"); ?>">
                        <i class="user icon"></i>所有账户
                    </a>
                    <a class="item" href="<?php echo site_url("setting/create"); ?>">
                        <i class="edit icon"></i>新增账户
                    </a>

                </div>
            </div>
        </div>
        <div class="twelve wide column">
            <div class="pageHeader">
                <div class="segment">
                    <h3 class="ui dividing header">
                        <i class="large edit icon"></i>
                        <div class="content">
                            修改账户
                            <div class="sub header">您可以修改个人账户信息</div>
                        </div>
                    </h3>
                </div>
            </div>

            <!--the user_profile form-->
            <div class="ui form vertical segment">
                <form action="<?php echo site_url("setting/edit/").$users['id']; ?>" name="form" method="post">

                    <input type="hidden" name="id" value="<?php echo $users['id']; ?>">

                    <div class="two fields">
                        <div class="field">
                            <label>用户名</label>
                            <div class="ui left labeled icon input">
                                <input type="text" id="username" name="username" value="<?php echo $users['username']; ?>">
                                <i class="user icon"></i>

                            </div>
                            <span style="color: orangered"><?php echo form_error('username'); ?></span>

                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>密码</label>
                            <div class="ui left labeled icon input">
                                <input type="password" id="password" name="password" value="<?php echo $users['password']; ?>">
                                <i class="key icon"></i>
                            </div>
                            <span style="color: orangered"><?php echo form_error('password'); ?></span>

                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>电子邮箱</label>
                            <div class="ui left labeled icon input">
                                <input type="email" id="email" name="email" value="<?php echo $users['email']; ?>">
                                <i class="mail icon"></i>
                            </div>

                            <span style="color: orangered"><?php echo form_error('email'); ?></span>

                        </div>
                    </div>

                    <input class="ui small blue submit button" type="submit" value="保存">
                    <input class="ui small basic button" type="reset" value="取消">
                </form>
            </div>

        </div>
    </div>
</div>

<?php $this->load->view("template/footer") ?>