<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['goods_class_index_class'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=goods_class&op=goods_class"><span><?php echo $lang['nc_manage'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_new'];?></span></a></li>
        <li><a href="index.php?act=goods_class&op=goods_class_export" ><span><?php echo $lang['goods_class_index_export'];?></span></a></li>
        <li><a href="index.php?act=goods_class&op=goods_class_import" ><span><?php echo $lang['goods_class_index_import'];?></span></a></li>
        <li><a href="index.php?act=goods_class&op=goods_class_tag" ><span><?php echo $lang['goods_class_index_tag'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="goods_class_form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="gc_name"><?php echo $lang['goods_class_index_name'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="gc_name" id="gc_name" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="parent_id"><?php echo $lang['goods_class_add_sup_class'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><select name="gc_parent_id" id="gc_parent_id">
              <option value="0"><?php echo $lang['nc_please_choose'];?>...</option>
              <?php if(!empty($output['parent_list']) && is_array($output['parent_list'])){ ?>
              <?php foreach($output['parent_list'] as $k => $v){ ?>
              <option <?php if($output['gc_parent_id'] == $v['gc_id']){ ?>selected='selected'<?php } ?> value="<?php echo $v['gc_id'];?>"><?php echo $v['gc_name'];?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
          <td class="vatop tips"><?php echo $lang['goods_class_add_sup_class_notice'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label for="gc_name"><?php echo $lang['goods_class_add_type'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="hidden" name="t_name" id="t_name" value="" />
            <select name="t_id" id="t_id">
              <option value="0"><?php echo $lang['nc_please_choose'];?>...</option>
              <?php if(is_array($output['type_list']) && !empty($output['type_list'])){?>
              <?php foreach($output['type_list'] as $val){?>
              <option value="<?php echo $val['type_id'];?>"><?php echo $val['type_name'];?></option>
              <?php }?>
              <?php }?>
            </select></td>
          <td class="vatop tips"><?php echo $lang['goods_class_add_type_desc_one'];?><a onclick="window.parent.openItem('type,type,goods')" href="JavaScript:void(0);"><?php echo $lang['nc_type_manage'];?></a><?php echo $lang['goods_class_add_type_desc_two'];?></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label><?php echo $lang['nc_display'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff"><label for="gc_show1" class="cb-enable selected"><span><?php echo $lang['nc_yes'];?></span></label>
            <label for="gc_show0" class="cb-disable"><span><?php echo $lang['nc_no'];?></span></label>
            <input id="gc_show1" name="gc_show" checked="checked" value="1" type="radio">
            <input id="gc_show0" name="gc_show" value="0" type="radio"></td>
          <td class="vatop tips"></td>
        </tr>
              <tr>
          <td colspan="2" class="required">分类图标:
            </td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php if(!empty($output['class_array']['gc_pic'])){ ?>
            <span class="type-file-show"><img class="show_image" src="<?php echo TEMPLATES_PATH;?>/images/preview.png">
            <div class="type-file-preview"><img src="<?php echo SiteUrl.'/'.ATTACH_BRAND.'/'.$output['class_array']['gc_pic']; ?>"></div>
            </span>
            <?php } ?>
            <span class="type-file-box">
            <input name="gc_pic" id="gc_pic" type="file" class="type-file-file" size="30">
            </span></td>
          <td class="vatop tips">支持格式 gif,jpg,jpeg,png</td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label><?php echo $lang['nc_sort'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="0" name="gc_sort" id="gc_sort" class="txt"></td>
          <td class="vatop tips"><?php echo $lang['goods_class_add_update_sort'];?></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script>
//按钮先执行验证再提交表单
$(function(){

	$("#submitBtn").click(function(){
		if($("#goods_class_form").valid()){
			$("#goods_class_form").submit();
		}
	});
	
	$('#t_id').change(function(){
		if($(this).val() == '0'){
			$('#t_name').val('');
		}else{
			$('#t_name').val($(this).find('option:selected').text());
		}
	});
	
	$('#goods_class_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        success: function(label){
            label.addClass('valid');
        },
        rules : {
            gc_name : {
                required : true,
                remote   : {                
                url :'index.php?act=goods_class&op=ajax&branch=check_class_name',
                type:'get',
                data:{
                    gc_name : function(){
                        return $('#gc_name').val();
                    },
                    gc_parent_id : function() {
                        return $('#gc_parent_id').val();
                    },
                    gc_id : ''
                  }
                }
            },
            gc_sort : {
                number   : true
            }
        },
        messages : {
            gc_name : {
                required : '<?php echo $lang['goods_class_add_name_null'];?>',
                remote   : '<?php echo $lang['goods_class_add_name_exists'];?>'
            },
            gc_sort  : {
                number   : '<?php echo $lang['goods_class_add_sort_int'];?>'
            }
        }
    });
});
$(function(){
    var textButton="<input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='' class='type-file-button' />"
		$(textButton).insertBefore("#gc_pic");
		$("#gc_pic").change(function(){
		$("#textfield1").val($("#gc_pic").val());
	});
});
</script>