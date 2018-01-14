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
<style>

    .dd{

        padding-top: 20px;
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
                    <a class="active teal item" href="<?php echo site_url("carousel/index"); ?>">
                        <i class="user icon"></i>所有轮播图
                    </a>
                    <a class="item" href="<?php echo site_url("carousel/create"); ?>">
                        <i class="edit icon"></i>新增轮播图
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
                            轮播图管理
                            <div class="sub header">您的轮播图信息</div>
                        </div>
                    </h3>
                </div>
            </div>

            <div class="dd">
                <a class="ui button positive" href="<?php echo site_url("carousel/create")?>"><i class="icon add user"></i>新增轮播图</a>
            </div>

            <table class="ui celled table">
                <thead>
                <tr><th>ID</th>

                    <th>图像地址</th>
                    <th>活动</th>
                    <th>操作</th>
                </tr></thead>
                <tbody>
                <?php foreach($carousel as $value) { ?>

                    <tr>
                        <td><?php echo $value->id; ?></td>
                        <td><a href="<?php echo $value->path;?>"><img style="width: 50px;height: 50px" src="<?php echo $value->path; ?>"></a></td>
                        <td><?php echo $value->status; ?></td>
                        <td>
                            <a href="<?php echo site_url().'/carousel/update/'.$value->id ?>">修改</a>
                            <a href="<?php echo site_url().'/carousel/delete/'.$value->id ?>" onClick='return confirm("您确定要删除吗?")'>删除</a>
                        </td>
                    </tr>
                <?php } ?>

                </tbody>

                <!-- Insert data using modal end-->

            </table>
            <div class="ui right floated pagination menu">
                <?php
                if(!empty($pagination)){
                    echo $pagination;
                }
                ?>
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

function updateModel(){
    $('.ui.modal')

        .modal('show')
    ;
}

    //设置超时时间为3秒钟
    var timeout = 3;
    if (timeout >= 1) {
        timeout -= 1;
        setTimeout(function() {
            $('.auto_message').hide();
        }, 1000);
    }

</script>

