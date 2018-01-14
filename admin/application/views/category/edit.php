<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/12/14
 * Time: 下午3:15
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
                    <a class="item" href="<?php echo site_url("category/index"); ?>">
                        <i class="edit icon"></i> 所有分类
                    </a>

                    <a class="active teal item" href="<?php echo site_url("category/create")?>">
                        <i class="lock icon"></i> 新建分类
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
                            修改分类
                            <div class="sub header">您可以更新的分类</div>
                        </div>
                    </h3>
                </div>
            </div>
            <!--the user_profile form-->
            <div class="ui form vertical segment">
                <form action="<?php echo site_url("category/edit")?>" name="form" method="post">
                    <div class="two fields">
                        <input type="hidden" name="id" value="<?php echo $category['id']; ?>"/>
                        <div class="field">
                            <label>分类名</label>
                            <div class="ui left labeled icon input">
                                <input type="text" id="category" name="category" value="<?php echo $category['category_name']; ?>">
                                <i class="user icon"></i>

                            </div>
                            <span style="color: orangered"><?php echo form_error('category'); ?></span>
                        </div>
                    </div>

                    <input name="update" class="ui small blue submit button" type="submit" value="保存">
                    <input class="ui small basic button" type="reset" value="取消">

                </form>

                <?php echo $this->session->flashdata('msg'); ?>

            </div>
        </div>
    </div>
</div>


