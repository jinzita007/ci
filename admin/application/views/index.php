<?php
/**
 * Created by PhpStorm.
 * User: zhouyulong
 * Date: 2017/5/3
 * Time: 下午2:00
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台管理</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/js/treeview/jquery.treeview.css">

    <!--<link rel="stylesheet" type="text/css" href="/public/css/demo.css">-->


    <link href="https://cdn.bootcss.com/semantic-ui/2.2.13/semantic.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/admin/css/style.css">
    <script src="https://img.hcharts.cn/jquery/jquery-1.8.3.min.js"></script>
    <script src="https://img.hcharts.cn/highcharts/highcharts.js"></script>
    <script src="https://img.hcharts.cn/highcharts/modules/exporting.js"></script>
    <script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
    <style>
        #i-have-a-tooltip {
            font-family:Helvetica,Arial,sans-serif;
            font-weight:100;
            font-size:20px;
            text-align:center;
            padding:50px;
            /*margin:20px auto;*/
            background:white;
            position:relative;
            border: 1px solid #eee;
            border-radius:5px;
            box-shadow:10px 10px 0px rgba(0,0,0,.05);
        }

        #i-have-a-tooltip:before {
            content:attr(data-description);
            box-sizing:border-box;
            display:block;
            background:rgba(0,0,0,.7);
            color:white;
            padding:20px;
            position:absolute;
            left:50%;
            top:-30px;
            margin-left:-100px;
            width:200px;
            height:65px;
            line-height:25px;
            border-radius:5px;
            opacity:0;
            transition:.25s ease-in-out;
        }

        #i-have-a-tooltip:after {
            content:'';
            display:block;
            position:absolute;
            top:35px;
            left:50%;
            margin-left:-8px;
            height:0;
            width:0;
            border-left:8px solid transparent;
            border-right:8px solid transparent;
            border-top:8px solid rgba(0,0,0,.7);
            transition:.25s ease-in-out;
            opacity:0;
        }

        /*#i-have-a-tooltip:hover:before {
            opacity:1;
            top:-50px;
        }

        #i-have-a-tooltip:hover:after {
            opacity:1;
            top:15px;
        }*/

        #maincontent {
            margin-top: 0em;
            margin-bottom: -7em;
        }
        #footer{position:absolute;bottom:0;width:100%;height:50px;background-color: #ffc0cb;}

    </style>

    </head>
<body>
<?php $this->load->view("template/sidebar") ?>

<div id="maincontent" class="ui main container">

    <div class="ui stackable grid">

        <!-- 用户数量 -->
        <div class="five wide column">

            <div id="i-have-a-tooltip">
                用户数量: <br><br>
                <h1><?php echo $user_num_rows;?>个</h1>
            </div>

        </div>

        <!-- 文章数量 -->
        <div class="five wide column">

            <div id="i-have-a-tooltip">
                文章数量: <br><br>
                <h1><?php echo $num_rows;?>个</h1>
            </div>
        </div>

        <!-- 文章数量 -->
        <div class="five wide column">

            <div id="i-have-a-tooltip">
                分类数量: <br><br>
                <h1><?php echo $category_num_rows;?>个</h1>
            </div>
        </div>


        <div class="nine wide right floated column">


                <table class="ui small very compact unstackable selectable olive table">
                    <thead>
                    <tr>
                        <th colspan="2">
                            文章分类统计图
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>
                            <div id="container" style="min-width:500px;height:400px"></div>

                        </td>
                    </tr>

                    </tbody>
                </table>


            <script>
                $(function () {
                    $('#container').highcharts({
                        chart: {
                            type: 'bar'
                        },
                        title: {
                            text: '文章分类统计图'
                        },
                        subtitle: {
                            text: '数据来源: iiiciii.com'
                        },
                        xAxis: {
                            categories: ['编程', '产品', '设计', '漫画', '随笔'],
                            title: {
                                text: null
                            }
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: '分类',
                                align: 'high'
                            },
                            labels: {
                                overflow: 'justify'
                            }
                        },
                        tooltip: {
                            valueSuffix: ' 个'
                        },
                        plotOptions: {
                            bar: {
                                dataLabels: {
                                    enabled: true,
                                    allowOverlap: true
                                }
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'top',
                            x: -40,
                            y: 100,
                            floating: true,
                            borderWidth: 1,
                            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                            shadow: true
                        },
                        credits: {
                            enabled: false
                        },
                        series: [{
                            name: '2017年',
                            data: [<?php echo $bianchen_num_rows ;?>, <?php echo $chanpin_num_rows ;?>, <?php echo $sheji_num_rows; ?>, <?php echo $manhua_num_rows; ?>, <?php echo $suibi_num_rows; ?>]
                        }]
                    });
                });
            </script>
        </div>


            <!--<div class="ui hidden divider"></div>-->



        <div class="seven wide column">

            <table class="ui small very compact unstackable selectable olive table">
                <thead>
                <tr>
                    <th colspan="2">
                        系统信息
                    </th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>YuyiPHP版本</td>
                    <td class="right aligned">1.0.0</td>
                </tr>
                <tr>
                    <td>服务器操作系统</td>
                    <td class="right aligned"><?php echo PHP_OS;?></td>
                </tr>

                <tr>
                    <td>CodeIgniter版本</td>
                    <td class="right aligned">3.1.6</td>
                </tr>
                <tr>
                    <td>运行环境</td>
                    <td class="right aligned"><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
                </tr>
                <tr>
                    <td>MYSQL类型</td>
                    <td class="right aligned"><?php echo $this->db->platform();?></td>
                </tr>

                <tr>
                    <td>MYSQL版本</td>
                    <td class="right aligned"><?php echo $this->db->version();?></td>
                </tr>
                <tr>
                    <td>上传限制</td>
                    <td class="right aligned"><?php $max_upload = ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled"; echo $max_upload;?></td>
                </tr>
                </tbody>
            </table>

            <table class="ui small very compact unstackable selectable orange table">
                <thead>
                <tr>
                    <th colspan="2">
                        产品团队
                    </th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>总策划</td>
                    <td class="right aligned">周玉龙</td>
                </tr>
                <tr>
                    <td>UI界面及用户体验</td>
                    <td class="right aligned">周玉龙</td>
                </tr>
                <tr>
                    <td>官方网址</td>
                    <td class="right aligned">http://www.iiiciii.com</td>
                </tr>
                <tr>
                    <td>Github</td>
                    <td class="right aligned">https://github.com/jinzita007</td>
                </tr>
                <tr>
                    <td>BUG反馈</td>
                    <td class="right aligned">woaitianwen</td>
                </tr>

                </tbody>
            </table>

        </div>
    </div>



    </div>



</div>


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
