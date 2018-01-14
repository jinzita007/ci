<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/5/12
 * Time: 上午3:07
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
                    <a class="active teal item" href="<?php echo site_url("category/index"); ?>">
                        <i class="user icon"></i>所有分类
                    </a>
                    <a class="item" href="<?php echo site_url("category/create"); ?>">
                        <i class="edit icon"></i>新增分类
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
                            分类管理
                            <div class="sub header">您的分类信息</div>
                        </div>
                    </h3>
                </div>
            </div>

            <div class="dd">
                <a class="ui button positive" href="<?php echo site_url("category/create")?>"><i class="icon add user"></i>新增分类</a>
            </div>

            <table class="ui celled table">
                <thead>
                <tr><th>ID</th>
                    <th>分类名称</th>
                    <th>操作</th>
                </tr></thead>
                <tbody>
                <?php foreach($category as $value) { ?>

                    <tr>
                        <td><?php echo $value->id; ?></td>
                        <td><?php echo $value->category_name; ?></td>

                        <td>
                            <a href="<?php echo site_url().'/category/edit/'.$value->id ?>">修改</a>
                            <a href="<?php echo site_url().'/category/delete/'.$value->id ?>" onClick='return confirm("您确定要删除吗?")'>删除</a>
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



