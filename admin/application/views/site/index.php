<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/12/15
 * Time: 下午2:09
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view("template/header") ?>
<style>

    .ui.segment:first-child {
        margin-top: 1rem;
    }
</style>
<?php $this->load->view("template/sidebar") ?>


    <div class="ui container">
        <!--the content-->
        <div class="ui grid">
            <!--the vertical menu-->
            <div class="four wide column">
                <div class="verticalMenu">
                    <div class="ui vertical pointing menu fluid">
                        <a class="active item" href="http://localhost/yuyi/admin/index.php/setting/site">
                            <i class="edit icon"></i> 基本设置
                        </a>


                    </div>
                </div>
            </div>
            <div class="twelve wide column">

                <div class="ui small breadcrumb">
                    <a class="section">首页</a>
                    <i class="right chevron icon divider"></i>
                    <a class="section">站点设置</a>
                    <i class="right chevron icon divider"></i>
                    <div class="active section">基本设置</div>
                </div>

                <!--<div class="pageHeader">
                    <div class="segment">
                        <h3 class="ui dividing header">
                            <i class="large edit icon"></i>
                            <div class="content">
                                基本设置
                                <div class="sub header">您可以修改的基本设置</div>
                            </div>
                        </h3>
                    </div>
                </div>-->
                <!--the user_profile form-->
                <div class="ui pointing secondary demo menu">
                    <a class="active red item" data-tab="first">基本设置</a>
                    <a class="blue item" data-tab="second">站点状态</a>
                </div>
                <!-- 基本设置 -->
                <div class="ui active tab segment" data-tab="first">
                    <div class="ui form vertical segment">
                        <?php echo form_open('setting/site_post?tab=site_basic');?>
                            <div class="two fields">
                                <div class="field">
                                    <label>站点名称</label>
                                    <div class="ui left labeled icon input">
                                        <input type="text" id="site_name" name="site_name" value="<?php echo $site->site_name;?>">
                                        <i class="user icon"></i>

                                    </div>
                                    <span style="color: orangered"></span>
                                </div>
                            </div>

                            <div class="two fields">
                                <div class="field">
                                    <label>站点网址</label>
                                    <div class="ui left labeled icon input">
                                        <input type="text" id="site_domain" name="site_domain" value="<?php echo $site->site_domain;?>">
                                        <i class="user icon"></i>

                                    </div>
                                    <span style="color: orangered"></span>
                                </div>
                            </div>

                            <div class="two fields">
                                <div class="field">
                                    <label>站点关键字</label>
                                    <div class="ui left labeled icon input">
                                        <input type="text" id="site_keyword" name="site_keyword" value="<?php echo $site->site_keyword;?>">
                                        <i class="user icon"></i>

                                    </div>
                                    <span style="color: orangered"></span>
                                </div>
                            </div>

                            <div class="two fields">
                                <div class="field">
                                    <label>站点描述</label>
                                    <div class="ui left labeled icon input">
                                        <input type="text" id="site_description" name="site_description" value="<?php echo $site->site_description;?>">
                                        <i class="user icon"></i>

                                    </div>
                                    <span style="color: orangered"></span>
                                </div>
                            </div>


                            <div class="two fields">
                                <div class="field">
                                    <label>站点LOGO</label>
                                    <div class="ui left labeled icon input">
                                        <input type="text" id="site_logo" name="site_logo" value="<?php echo $site->site_logo;?>">
                                        <i class="user icon"></i>

                                    </div>
                                    <span style="color: orangered"></span>
                                </div>
                            </div>

                            <input class="ui small blue submit button" type="submit" value="保存">
                            <input class="ui small basic button" type="reset" value="取消">

                        <?php echo form_close(); ?>
                    </div>

                </div>
                <!-- 站点状态 -->
                <div class="ui tab segment" data-tab="second">
                    <div class="ui form vertical segment">
                        <?php echo form_open('setting/site_post?tab=site_status');?>

                            <div class="two fields">
                                <div class="field">
                                    <label>站点状态</label>
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="site_status" value="1" <?php echo $site->site_status == 1 ? 'checked="checked"' : ''; ?>>
                                        <label>开启</label>
                                    </div>

                                    <div class="ui radio checkbox">
                                        <input type="radio" name="site_status" value="0" <?php echo $site->site_status == 0 ? 'checked="checked"' : '';?>>
                                        <label>关闭</label>
                                    </div>

                                </div>
                            </div>

                            <div class="two fields">
                                <div class="field">
                                    <label>站点关闭原因</label>
                                    <div class="ui left labeled icon input">
                                        <input type="text" id="site_close_reason" name="site_close_reason" value="<?php echo $site->site_close_reason;?>">
                                        <i class="user icon"></i>

                                    </div>
                                    <span style="color: orangered"></span>
                                </div>
                            </div>

                                <input class="ui small blue submit button" type="submit" value="保存">
                                <input class="ui small basic button" type="reset" value="取消">

                            <?php echo form_close(); ?>
                    </div>
                </div>


            </div>
        </div>
    </div>



<script src="<?php echo base_url();?>public/js/jquery.min.js"></script>
<!--<script src="https://cdn.bootcss.com/jquery/1.7.1/jquery.min.js"></script>-->
<script src="<?php echo base_url();?>public/js/semantic.js"></script>
<script>
    $(document).ready(function(){
        $('.demo.menu .item').tab({history:false});
    });

</script>