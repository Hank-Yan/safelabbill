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
                <div class="col-xs-12">
                    
                    <h3 class="header smaller lighter blue">角色管理</h3>

                    <div class="clearfix">
                        <div class="pull-right tableTools-container"></div>
                    </div>
                    <div class="table-header">
                        角色列表
                    </div>

                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="center">
                                        <label class="pos-rel">
                                            <input type="checkbox" class="ace" />
                                            <span class="lbl"></span>
                                        </label>
                                    </th>
                                    <th>序号</th>
                                    <th>角色名称</th>

                                    <th>操作</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php if(is_array($list)): foreach($list as $k=>$vo): ?><tr>
                                    <td class="center">
                                        <label class="pos-rel">
                                            <input type="checkbox" class="ace" />
                                            <span class="lbl"></span>
                                        </label>
                                    </td>

                                    <td>
                                        <?php echo ($k+1); ?>
                                    </td>
                                    <td><?php echo ($vo["role_name"]); ?></td>
                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">
                                            <a class="blue" href="/safelabbill/index.php/Admin/Role/distribute/roleid/<?php echo ($vo["role_id"]); ?>">
                                                <i class="ace-icon fa fa-users bigger-130"></i>
                                            </a>

                                            <a class="green" href="#">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>

                                            <a class="red" href="#">
                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr><?php endforeach; endif; ?>
                                
<!--                                <tr>
                                    <td class="center">
                                        <label class="pos-rel">
                                            <input type="checkbox" class="ace" />
                                            <span class="lbl"></span>
                                        </label>
                                    </td>

                                    <td>
                                        1
                                    </td>
                                    <td>学生</td>
                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">
                                            <a class="blue" href="#">
                                                <i class="ace-icon fa fa-users bigger-130"></i>
                                            </a>

                                            <a class="green" href="#">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>

                                            <a class="red" href="#">
                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>-->
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- inline scripts related to this page -->
        <script type="text/javascript">
                jQuery(function ($) {
                    //initiate dataTables plugin
                    //aoColumns 控制列的排序方式
                    var oTable1 =
                            $('#dynamic-table')
                            //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                            .dataTable({
                                bAutoWidth: false,
                                "aoColumns": [
                                    {"bSortable": false},
                                    null, null,
                                    {"bSortable": false}
                                ],
                                "aaSorting": [],
                                //,
                                //"sScrollY": "200px",
                                //"bPaginate": false,

                                //"sScrollX": "100%",
                                //"sScrollXInner": "120%",
                                //"bScrollCollapse": true,
                                //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                                //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                                //"iDisplayLength": 50
                            });
                    //oTable1.fnAdjustColumnSizing();


                    //TableTools settings
                    TableTools.classes.container = "btn-group btn-overlap";
                    TableTools.classes.print = {
                        "body": "DTTT_Print",
                        "info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
                        "message": "tableTools-print-navbar"
                    }

                    //initiate TableTools extension
                    var tableTools_obj = new $.fn.dataTable.TableTools(oTable1, {
                        "sSwfPath": "/safelabbill/Public/JS/dataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf", //in Ace demo ../assets will be replaced by correct assets path

                        "sRowSelector": "td:not(:last-child)",
                        "sRowSelect": "multi",
                        "fnRowSelected": function (row) {
                            //check checkbox when row is selected
                            try {
                                $(row).find('input[type=checkbox]').get(0).checked = true
                            } catch (e) {
                            }
                        },
                        "fnRowDeselected": function (row) {
                            //uncheck checkbox
                            try {
                                $(row).find('input[type=checkbox]').get(0).checked = false
                            } catch (e) {
                            }
                        },
                        "sSelectedClass": "success",
                        "aButtons": [
//    //						导出为csv
//                            {
//                                "sExtends": "csv",
//                                "sToolTip": "Export to CSV",
//                                "sButtonClass": "btn btn-white btn-primary  btn-bold",
//                                "sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
//                            },
//    //						导出为 pdf
//                            {
//                                "sExtends": "pdf",
//                                "sToolTip": "Export to PDF",
//                                "sButtonClass": "btn btn-white btn-primary  btn-bold",
//                                "sButtonText": "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
//                            },
                        ]
                    });
                    //we put a container before our table and append TableTools element to it
                    $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));

                    //also add tooltips to table tools buttons
                    //addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
                    //so we add tooltips to the "DIV" child after it becomes inserted
                    //flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
                    setTimeout(function () {
                        $(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function () {
                            var div = $(this).find('> div');
                            if (div.length > 0)
                                div.tooltip({container: 'body'});
                            else
                                $(this).tooltip({container: 'body'});
                        });
                    }, 200);



                    //ColVis extension
//                    var colvis = new $.fn.dataTable.ColVis(oTable1, {
//                        "buttonText": "<i class='fa fa-search'></i>",
//                        "aiExclude": [0, 3],
//                        "bShowAll": true,
//                        //"bRestore": true,
//                        "sAlign": "right",
//                        "fnLabel": function (i, title, th) {
//                            return $(th).text();//remove icons, etc
//                        }
//
//                    });
//
//                    //style it
//                    $(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')
//
//                    //and append it to our table tools btn-group, also add tooltip
//                    $(colvis.button())
//                            .prependTo('.tableTools-container .btn-group')
//                            .attr('title', 'Show/hide columns').tooltip({container: 'body'});
//
//                    //and make the list, buttons and checkboxed Ace-like
//                    $(colvis.dom.collection)
//                            .addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
//                            .find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
//                            .find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');



                    /////////////////////////////////
                    //table checkboxes
                    $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

                    //select/deselect all rows according to table header checkbox
                    $('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function () {
                        var th_checked = this.checked;//checkbox inside "TH" table header

                        $(this).closest('table').find('tbody > tr').each(function () {
                            var row = this;
                            if (th_checked)
                                tableTools_obj.fnSelect(row);
                            else
                                tableTools_obj.fnDeselect(row);
                        });
                    });

                    //select/deselect a row when the checkbox is checked/unchecked
                    $('#dynamic-table').on('click', 'td input[type=checkbox]', function () {
                        var row = $(this).closest('tr').get(0);
                        if (!this.checked)
                            tableTools_obj.fnSelect(row);
                        else
                            tableTools_obj.fnDeselect($(this).closest('tr').get(0));
                    });




                    $(document).on('click', '#dynamic-table .dropdown-toggle', function (e) {
                        e.stopImmediatePropagation();
                        e.stopPropagation();
                        e.preventDefault();
                    });


                    //And for the first simple table, which doesn't have TableTools or dataTables
                    //select/deselect all rows according to table header checkbox
                    var active_class = 'active';
                    $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function () {
                        var th_checked = this.checked;//checkbox inside "TH" table header

                        $(this).closest('table').find('tbody > tr').each(function () {
                            var row = this;
                            if (th_checked)
                                $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                            else
                                $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
                        });
                    });

                    //select/deselect a row when the checkbox is checked/unchecked
                    $('#simple-table').on('click', 'td input[type=checkbox]', function () {
                        var $row = $(this).closest('tr');
                        if (this.checked)
                            $row.addClass(active_class);
                        else
                            $row.removeClass(active_class);
                    });



                    /********************************/
                    //add tooltip for small view action buttons in dropdown menu
                    $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

                    //tooltip placement on right or left
                    function tooltip_placement(context, source) {
                        var $source = $(source);
                        var $parent = $source.closest('table')
                        var off1 = $parent.offset();
                        var w1 = $parent.width();

                        var off2 = $source.offset();
                        //var w2 = $source.width();

                        if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
                            return 'right';
                        return 'left';
                    }

                })
        </script>



        <script src="/safelabbill/Public/JS/dataTables/jquery.dataTables.js"></script>
        <script src="/safelabbill/Public/JS/dataTables/jquery.dataTables.bootstrap.js"></script>
        <!--tableTools.js 包含打印表格，excel -->
        <script src="/safelabbill/Public/JS/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
        <!--动态改变table列可见性的代码，保留-->
        <script src="/safelabbill/Public/JS/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>
    </body>
</html>