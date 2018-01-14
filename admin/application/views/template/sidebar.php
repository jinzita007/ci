</head>
<body>
<div class="ui menu">
    <div class="ui container">
        <a href="<?php echo base_url(); ?>" class="header item">
            <i class="small home icon"></i>
            后台管理面板
        </a>


        <div class="ui simple dropdown item">
            文章管理 <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="<?php echo site_url('articles/index'); ?>">所有文章</a>
                <a class="item" href="<?php echo site_url('articles/create');?>">新建文章</a>

            </div>
        </div>

        <a class="item" href="<?php echo site_url('category/index'); ?>">分类管理</a>

        <div class="ui simple dropdown item">
            全局设置 <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="<?php echo site_url('setting/site'); ?>">站点设置</a>
                <a class="item" href="<?php echo site_url('setting/index'); ?>">用户设置</a>
                <a class="item" href="<?php echo site_url('carousel/index'); ?>">轮播图管理</a>

            </div>
        </div>




        <div class="right menu">
            <div class="borderless item">
                <!--<button id="userbutton" class="ui right labeled icon teal button"><i class="caret down icon"></i> Tormod
                </button>-->

                <div class="ui floating labeled icon dropdown button">
                    <i class="user icon"></i>
                    <span class="text">欢迎<?php echo $this->session->userdata('username'); ?></span>
                    <div class="menu">

                        <a class="item" href="<?php echo base_url(); ?>index.php/home"><i class="reply mail icon"></i>返回首页</a>
                        <?php if($this->session->userdata('login')){ ?>
                        <a class="item" href="<?php echo base_url(); ?>index.php/home/logout"><i class="sign out icon"></i>注销登录</a>
                        <?php }?>
                    </div>
                </div>

                </div>


            </div>
        </div>

    </div>

