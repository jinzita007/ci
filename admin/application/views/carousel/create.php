<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/12/14
 * Time: 下午8:20
 */


defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view("template/header") ?>
<?php $this->load->view("template/sidebar") ?>
<style>
    .ui.action.input input[type="file"] {
        display: none;
    }

</style>

<div class="ui container">
    <!--the content-->
    <div class="ui grid">
        <!--the vertical menu-->
        <div class="four wide column">
            <div class="verticalMenu">
                <div class="ui vertical pointing menu fluid">
                    <a class="item" href="<?php echo site_url("carousel/index"); ?>">
                        <i class="edit icon"></i> 所有轮播图
                    </a>

                    <a class="active teal item" href="<?php echo site_url("carousel/add")?>">
                        <i class="lock icon"></i> 新建轮播图
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
                            新建轮播图
                            <div class="sub header">您可以建立新的轮播图</div>
                        </div>
                    </h3>
                </div>
            </div>
            <!--the user_profile form-->

            <span class="auto_message" style="color: #f56100"><?php echo $this->session->flashdata('success_msg'); ?></span>
            <span class="auto_message" style="color: #f56100"><?php echo $this->session->flashdata('error_msg'); ?></span>


            <div class="ui form vertical segment">
                <form action="" name="form" method="post" enctype="multipart/form-data" />


                <div class="two fields">
                    <div class="field">
                        <label>图片地址</label>
                        <div class="ui action input">
                            <input type="text" placeholder="File" readonly>
                            <input type="file" name="picture">
                            <div class="ui icon button">
                                <i class="attach icon"></i>
                            </div>

                        </div>
                    </div>
                </div>

                <input class="ui small blue submit button" type="submit" name="imgSubmit" value="保存">
                <input class="ui small basic button" type="reset" value="取消">
                </from>

            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url();?>public/js/jquery.min.js"></script>
<!--<script src="https://cdn.bootcss.com/jquery/1.7.1/jquery.min.js"></script>-->
<script src="<?php echo base_url();?>public/js/semantic.js"></script>
<script>
    $("input:text").click(function() {
        $(this).parent().find("input:file").click();
    });

    $('input:file', '.ui.action.input')
        .on('change', function(e) {
            var name = e.target.files[0].name;
            $('input:text', $(e.target).parent()).val(name);
        });

    $('.message .close')
        .on('click', function() {
            $(this)
                .closest('.message')
                .transition('fade')
            ;
        });
    //设置超时时间为3秒钟
    var timeout = 3;
    if (timeout >= 1) {
        timeout -= 1;
        setTimeout(function() {
            $('.auto_message').hide();
        }, 1000);
    }

</script>
