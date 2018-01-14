<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/12/14
 * Time: 下午5:49
 */


defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view("template/header") ?>

<?php $this->load->view("template/sidebar") ?>

<div class="ui container">

    <div class="ui container">
        <!--the content-->
        <div class="ui grid">
            <div class="wide column">

        <a class="ui button positive" href="<?php echo site_url("articles/create")?>"><i class="icon add user"></i>新增文章</a>


        <table class="ui celled table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>分类名</th>
                    <th>作者</th>
                    <th>文章标题</th>
                    <th>文章内容</th>
                    <th>发布时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($articles as $value) { ?>

                <tr>
                    <td><?php echo $value['id']; ?></td>
                    <td><?php echo $value['category_name']; ?></td>
                    <td><?php echo $this->session->userdata('username'); ?></td>
                    <td><?php echo $value['title']; ?></td>
                    <td><?php echo mb_substr($value['contents'], 0, 21, 'utf-8').'......'; ?></td>
                    <td><?php echo $value['created_at']; ?></td>


                    <td>
                        <a href="<?php echo site_url().'/articles/edit/'.$value['id']; ?>">修改</a>
                        <a href="<?php echo site_url().'/articles/delete/'.$value['id']; ?>" onClick='return confirm("您确定要删除吗?")'>删除</a>
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

</div>



