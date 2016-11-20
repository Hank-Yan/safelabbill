<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>后台管理</title>
        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="/safelabbill/Public/CSS/bootstrap.css" />
        <link rel="stylesheet" href="/safelabbill/Public/CSS/font-awesome.css" />
        <!-- ace styles -->
        <link rel="stylesheet" href="/safelabbill/Public/CSS/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--必须的，jQuery用的,版本要大于 1.9-->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='/safelabbill/Public/JS/jquery-1.12.3.min.js'>" + "<" + "/script>");
        </script>
        <script src="/safelabbill/Public/JS/bootstrap.js"></script>
        <script src="/safelabbill/Public/JS/ace/ace.js"></script>
        <script src="/safelabbill/Public/JS/ace/ace.sidebar.js"></script>
    </head>
    <body style="background-color: white;margin-top: 20px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form action="" method="post">
                        <input type="hidden" name="roleid" value="<?php echo ($roleinfo["role_id"]); ?>" />
                        <table  class="table ">
                            <?php if(is_array($auth_parent)): foreach($auth_parent as $k=>$vop): ?><tr>
                                    <td><?php echo ($k + 1); ?></td>
                                    <td class="center" style="width: 30%">
                                        <label class="pos-rel">
                                            <input type="checkbox" class="ace" name="auth_id[]"/>
                                            <span class="lbl"></span>
                                        </label>
                                        <span style="font-weight: bold"> <?php echo ($vop["auth_name"]); ?></span>
                                    </td>
                                <?php if(is_array($auth_child)): foreach($auth_child as $kk=>$voc): if($voc['auth_pid'] == $vop['auth_id']): ?><td class="center" >
                                            <div style="width: 200px;float: left">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" name="auth_id[]" value="<?php echo ($voc["auth_id"]); ?>"/>
                                                    <span class="lbl"></span>
                                                </label>
                                                <?php echo ($voc["auth_name"]); ?>
                                            </div>
                                        </td><?php endif; endforeach; endif; ?>
                                </tr><?php endforeach; endif; ?>
                        </table>
                        <input type="submit" class="btn btn-primary" value="提交" style="float: right"/>
                    </form>
                </div><!-- /.col -->


            </div><!-- /.row -->
        </div>

    </body>
</html>