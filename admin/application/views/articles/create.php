<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/12/14
 * Time: 下午5:50
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view("template/header") ?>
<link rel="stylesheet" href="<?php echo base_url();?>public/css/tab.css">
<style>
    .ui.bottom.attached.segment.ta {
        height:100%;
        font-size: 14px;
    }

    .column.editor {
        padding: 10px;
        width: 50%;
        position: absolute;
        left: 0px;
        height:60%;
    }

    .preview {
        padding: 10px;
        right: 0px;
        width: 50%;
        position: absolute;
        height:auto;
    }





</style>

<?php $this->load->view("template/sidebar") ?>

<div class="ui container">

    <div class="ui stackable grid">

        <div class="two column row">
            <div class="column editor">
                <form class="ui form segment" method="post" action="<?php echo site_url("articles/create")?>">
                    <div class="field required">
                        <label>标题</label>
                        <input type="text" name="title">
                    </div>
                    <!-- 分类 -->
                    <div class="field required">
                        <label>分类</label>
                        <select name="category" id="category" class="ui dropdown">
                            <?php foreach ($categories as $key => $value):  ?>
                                <option value="<?php echo $value['id']?>"><?php echo $value['category_name']?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="field required">
                        <label>内容</label>
                        <textarea name="content" id="text-input" oninput="this.editor.update()" rows="15"></textarea>

                    </div>
                    <input type="submit" name="submit" class="ui button" value="发布">
                </form>
            </div>

            <div class="column preview">
                <div class="ui top attached info message">预览</div>
                <div class="ui bottom attached segment ta" id="preview"></div>
            </div>

        </div>

    </div>
</div>

<script src="https://cdn.bootcss.com/markdown.js/0.5.0/markdown.min.js"></script>
<script>
    function Editor(input, preview) {
        this.update = function () {
            preview.innerHTML = markdown.toHTML(input.value);
        };
        input.editor = this;
        this.update();
    }
    var $ = function (id) { return document.getElementById(id); };
    new Editor($("text-input"), $("preview"));
</script>


<script src="https://cdn.bootcss.com/jquery/1.7.1/jquery.min.js"></script>
<script src="<?php echo base_url();?>public/js/semantic.js"></script>
<script src="<?php echo base_url();?>public/js/tab.js"></script>

<script src="<?php echo base_url();?>public/admin/js/style.js"></script>
<script>
    $(document).ready(function(){
        $('.ui.dropdown')
            .dropdown();
    });

</script>

</body>
</html>