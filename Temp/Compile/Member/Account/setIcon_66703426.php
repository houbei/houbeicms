<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <link type="text/css" rel="stylesheet" href="http://127.0.0.1/houbeicms/HDCMS/Member/View/Public/static/css/common.css"/>
    
            <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/hdjs/jquery-1.8.2.min.js"></script>
            <link rel="stylesheet" href="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.css"/>
            <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/hdjs/hdjs.min.js"></script>
        

    <link rel="stylesheet" type="text/css" href="http://127.0.0.1/houbeicms/HDCMS/Member/View/Account/css/user.css?ver=1.0"/>
    <script type="text/javascript" src="http://127.0.0.1/houbeicms/HDCMS/Member/View/Account/js/cropFace.js"></script>
    <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/jcrop/js/jquery.Jcrop.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1/houbeicms/Static/jcrop/css/jquery.Jcrop.min.css"/>

    <script type="text/javascript" src="http://127.0.0.1/houbeicms/Static/uploadify/jquery.uploadify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1/houbeicms/Static/uploadify/uploadify.css"/>
</head>
<body>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<div class="top">
    <div class="top_warp">
        <div class="logo">
            <a href="<?php echo U('Member/Index/index');?>">
                <img src="http://127.0.0.1/houbeicms/HDCMS/Member/View/Public/images/member.png" alt=""/>
            </a>
        </div>
        <div class="top_menu">
            <a href="<?php echo U('Member/Index/index');?>">会员中心</a>
            <a href="<?php echo U('Space/index',array('uid'=>$_SESSION['user']['uid']));?>">个人空间</a>
            <a href="http://127.0.0.1/houbeicms">网站首页</a>
            <a href="<?php echo U('Index/index');?>" class="login">
                <img src="<?php echo $hd['session']['user']['icon'];?>" class="user"/>
                <?php echo $hd['session']['user']['username'];?>
            </a>
        </div>
    </div>
</div>

<div class="wrap">
    <div class="menu">
        <?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<dl>
    <dt>文章管理</dt>
    <?php foreach(S('model') as $m):?>
        <?php if($m['enable']==0 ||$m['contribute']==0)continue;?>
    <dd><a href="<?php echo U('Content/content',array('mid'=>$m['mid']));?>"     <?php if($hd['get']['mid']==$m['mid']){ ?>class="cur"<?php } ?>><?php echo $m['model_name'];?></a></dd>
    <?php endforeach;?>
<!--    <dd><a href="<?php echo U('Content/add');?>"     <?php if(ACTION=='add'){ ?>class="cur"<?php } ?>>发表文章</a></dd>-->
<!--    <dd><a href="<?php echo U('Content/collect');?>"     <?php if(ACTION=='collect'){ ?>class="cur"<?php } ?>>我的收藏</a></dd>-->
</dl>
<dl>
    <dt>帐号管理</dt>
    <dd><a href="<?php echo U('Account/personal');?>"     <?php if(ACTION=='personal'){ ?>class="cur"<?php } ?>>个人资料</a></dd>
    <dd><a href="<?php echo U('Account/setPassword');?>"     <?php if(ACTION=='setPassword'){ ?>class="cur"<?php } ?>>修改密码</a></dd>
    <dd><a href="<?php echo U('Account/setIcon');?>"     <?php if(ACTION=='setIcon'){ ?>class="cur"<?php } ?>>修改头像</a></dd>
    <dd><a href="<?php echo U('Login/out');?>">退出登录</a></dd>
</dl>
    </div>
    <div class="content">
        <div class="list">
            <div class="message">
                <h1>使用帮助</h1>

                <p>
                    （1）请选择图片清晰的png,jpg图像文件
                </p>
            </div>
            <div class="header">
                设置会员头像
            </div>
            <div class="article">
                <div class="form">
                        <div class="source-face">
                            <div
                                style="position:relative;border:solid 1px #999;width: 250px;height: 250px;overflow: hidden;margin-bottom:10px;float:left;margin-right:20px;">
                                <!--上传头像按钮 Start-->
                                <script>
                                    $(function () {
                                        $('#file_upload').uploadify({
                                            'swf': 'http://127.0.0.1/houbeicms/HDCMS/Member/View/Account/uploadify/uploadify.swf',
                                            'uploader': '<?php echo U("uploadFace");?>',
                                            'removeCompleted': false,
                                            'buttonImage': 'http://127.0.0.1/houbeicms/HDCMS/Member/View/Account/uploadify/select_face.png',
                                            'fileTypeExts': '*.jpg; *.png',
                                            'multi': false,
                                            'fileSizeLimit': '2MB',
                                            'uploadLimit': 1000,
                                            'width': 250,
                                            'height': 250,
                                            'removeCompleted': true,
                                            'formData': {'<?php echo session_name();?>': '<?php echo session_id();?>'},
                                            'onUploadSuccess': function (file, data, response) {
                                                eval('data=' + data);
                                                if (data.status == 1) {
                                                    var img = data.url;
                                                    $("#target").attr("src", img);
                                                    $("div.jcrop-holder img").attr("src", img);
                                                    $("#preview150").attr("src", img);
                                                    $("#preview100").attr("src", img);
                                                    $("#preview50").attr("src", img);
                                                    $("input[name=img_face]").val(data.path);
                                                    $("#buttons").show();
                                                    $("#face_upload").hide();
                                                    $("#SWFUpload_0_0").remove();
                                                } else {
                                                    alert(data.error);
                                                }
                                            }
                                        });
                                    });
                                    //重新上传头像
                                    function reset_upload() {
                                        $("#buttons").hide();
                                        $("#face_upload").show();
                                    }
                                </script>
                                <div id="face_upload">
                                    <input type="file" name="file_upload" id="file_upload"/>
                                </div>
                                <!--上传头像按钮 End-->
                                <img src="http://127.0.0.1/houbeicms/HDCMS/Member/View/Account/images/select_face.png" id="target"
                                     style="display: none"/>
                            </div>
                            <div id="buttons" style="display: none">
                                <form action="" method="post" onsubmit="return hd_submit(this,'http://127.0.0.1/houbeicms/index.php?m=Member&c=Account&a=setIcon','http://127.0.0.1/houbeicms/index.php?m=Member&c=Account&a=setIcon')">
                                        <button type="submit" class="btn btn-primary btn-xs">保存</button>
                                        <button onclick="reset_upload();" type="button" class="btn btn-default btn-xs">重新上传</button>
                                    <input type="hidden" name="img_face" value=""/>
                                    <input type="hidden" size="4" id="x1" name="x1" value="0"/>
                                    <input type="hidden" size="4" id="y1" name="y1" value="0"/>
                                    <input type="hidden" size="4" id="x2" name="x2" value="249"/>
                                    <input type="hidden" size="4" id="y2" name="y2" value="249"/>
                                    <input type="hidden" size="4" id="w" name="w" value="250"/>
                                    <input type="hidden" size="4" id="h" name="h" value="250"/>
                                </form>
                            </div>
                        </div>
                        <div class="face-preview">
                            <h2>头像预览</h2>

                            <div class="help">
                                请注意中小尺寸的头像是否清晰
                            </div>

                            <div class="face">
                                <div style="width:150px;height:150px;overflow:hidden;">
                                    <img src="<?php echo $hd['session']['user']['icon'];?>" id="preview150" alt="Preview"
                                         style="width:150px;">
                                </div>
                                <p>
                                    头像尺寸150X150
                                </p>
                            </div>
                            <div class="face">
                                <div style="width:100px;height:100px;overflow:hidden;">
                                    <img src="<?php echo $hd['session']['user']['icon'];?>" id="preview100" alt="Preview"
                                         style="width:100px;">
                                </div>
                                <p>
                                    头像尺寸100X100
                                </p>
                            </div>
                            <div class="face">
                                <div style="width:50px;height:50px;overflow:hidden;">
                                    <img src="<?php echo $hd['session']['user']['icon'];?>" id="preview50" alt="Preview"
                                         style="width:50px;">
                                </div>
                                <p>
                                    头像尺寸50X50
                                </p>
                            </div>
                        </div>


                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>