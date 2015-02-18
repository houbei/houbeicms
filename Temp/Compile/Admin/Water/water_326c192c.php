<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<?php if (!defined('HDPHP_PATH')) exit(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HDCMS永久免费 - <?php echo $hd['config']['webname'];?> - by HDCMS</title>
    <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/hdjs/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.css"/>
    <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.min.js"></script>
    <script type='text/javascript'>
HOST = 'http://127.0.0.1';
ROOT = 'http://127.0.0.1/houbeicms';
WEB = 'http://127.0.0.1/houbeicms/index.php';
URL = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Water&a=water';
APP = 'http://127.0.0.1/houbeicms/HDCMS';
COMMON = 'http://127.0.0.1/houbeicms/HDCMS/Common';
HDPHP = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP';
HDPHP_DATA = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Data';
HDPHP_EXTEND = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Extend';
MODULE = 'http://127.0.0.1/houbeicms/index.php?m=Admin';
CONTROLLER = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Water';
ACTION = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Water&a=water';
STATIC = 'http://127.0.0.1/houbeicms/Static';
HDPHP_TPL = 'http://127.0.0.1/houbeicms/HDCMS/HDPHP/Lib/Tpl';
VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View';
PUBLIC = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public';
CONTROLLER_VIEW = 'http://127.0.0.1/houbeicms/HDCMS/Admin/View/Water';
HISTORY = 'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Water&a=water';
</script>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Admin/View/Public/common.css"/>
</head>
<body>
<div class="hd-title-header">温馨提示</div>
<div class="help">
    图片类型为jpg或png格式，图片不存在使用文字水印
</div>
<form class="hd-form" onsubmit="return hd_submit(this,'http://127.0.0.1/houbeicms/index.php?m=Admin&c=Water&a=water','http://127.0.0.1/houbeicms/index.php?m=Admin&c=Water&a=water')">
    <table class="hd-table hd-table-form">
        <thead>
        <tr style="background: #E6E6E6;">
            <td class="hd-w200">标题</td>
            <td>配置</th>
            <td class="hd-w300">变量</td>
        </tr>
        </thead>
        <?php foreach ($config as $key=>$val){?>
                <?php if($key=='WATER_ON'){ ?>
                <tr>
                    <td><?php echo $val['title'];?></td>
                    <td>
                        <label><input type="radio" name="<?php echo $val['name'];?>" value="1"     <?php if($val['value']==1){ ?>checked=""<?php } ?>/> 开启</label>
                        <label><input type="radio" name="<?php echo $val['name'];?>" value="0"     <?php if($val['value']==0){ ?>checked=""<?php } ?>/> 关闭</label>
                        <?php echo $var['message'];?>
                    </td>
                    <td><?php echo $val['name'];?></td>
                </tr>
            <?php }else if($key<>'WATER_POS'){ ?>
                <tr>
                    <td><?php echo $val['title'];?></td>
                    <td>
                        <input type="text" name="<?php echo $val['name'];?>" value="<?php echo $val['value'];?>" class="hd-w200"/>
                        <span class="hd-validate-notice"><?php echo $val['message'];?></span>
                    </td>
                    <td><?php echo $val['name'];?></td>
                </tr>
            <?php }else{ ?>
                <tr>
                    <td><?php echo $val['title'];?></td>
                    <td>
                        <table class="hd-w300">
                            <tr>
                                <td>
                                    <label><input type="radio" name="WATER_POS" value="1"
                                                  <?php if ($val['value'] == 1){ ?>checked="checked"<?php } ?>/>
                                        左上</label>
                                </td>
                                <td>
                                    <label><input type="radio" name="WATER_POS" value="2"
                                                  <?php if ($val['value'] == 2){ ?>checked="checked"<?php } ?>/>
                                        上中</label>
                                </td>
                                <td>
                                    <label><input type="radio" name="WATER_POS" value="3"
                                                  <?php if ($val['value'] == 3){ ?>checked="checked"<?php } ?>/>
                                        上右</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><input type="radio" name="WATER_POS" value="4"
                                                  <?php if ($val['value'] == 4){ ?>checked="checked"<?php } ?>/>
                                        中左</label>
                                </td>
                                <td>
                                    <label><input type="radio" name="WATER_POS" value="5"
                                                  <?php if ($val['value'] == 5){ ?>checked="checked"<?php } ?>/>
                                        中间</label>
                                </td>
                                <td>
                                    <label><input type="radio" name="WATER_POS" value="6"
                                                  <?php if ($val['value'] == 6){ ?>checked="checked"<?php } ?>/>
                                        中右</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><input type="radio" name="WATER_POS" value="7"
                                                  <?php if ($val['value'] == 7){ ?>checked="checked"<?php } ?>/>
                                        下左</label>
                                </td>
                                <td>
                                    <label><input type="radio" name="WATER_POS" value="8"
                                                  <?php if ($val['value'] == 8){ ?>checked="checked"<?php } ?>/>
                                        下中</label>
                                </td>
                                <td>
                                    <label><input type="radio" name="WATER_POS" value="9"
                                                  <?php if ($val['value'] == 9){ ?>checked="checked"<?php } ?>/>
                                        下右</label>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td><?php echo $val['name'];?></td>
                    <td><?php echo $val['message'];?></td>
                </tr>
            <?php } ?>
        <?php }?>
    </table>

    <input type="submit" class="hd-btn" value="确定"/>
</form>
</body>
</html>