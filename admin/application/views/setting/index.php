<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/5/12
 * Time: 上午12:23
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
                    <a class="active teal item" href="<?php echo site_url("setting/index"); ?>">
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
                            账户设置
                            <div class="sub header">您的个人账户信息</div>
                        </div>
                    </h3>
                </div>
            </div>

            <div class="dd">
               <a class="ui button positive" href="<?php echo site_url("setting/create")?>"><i class="icon add user"></i>新增用户名</a>
            </div>

            <table class="ui celled table">
                <thead>
                <tr><th>ID</th>
                    <th>用户名</th>
                    <th>电子邮箱</th>
                    <th>上次操作时间</th>
                    <th>上次登录IP</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($users as $value){
                ?>
                <tr>
                    <td><?php echo $value->id; ?></td>
                    <td><?php echo $value->username; ?></td>
                    <td><?php echo $value->email; ?></td>
                    <td><?php echo date("Y-m-d",$value->timestamp); ?></td>
                    <td><?php echo long2ip($value->ip); ?></td>

                    <td>
                            <a href="<?php echo site_url().'/setting/edit/'.$value->id ?>">修改</a>
                            <a href="<?php echo site_url().'/setting/del/'.$value->id ?>" onClick='return confirm("您确定要删除吗?")'>删除</a>
                    </td>
                </tr>
                    <?php } ?>

                </tbody>

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

<?php $this->load->view("template/footer") ?>


