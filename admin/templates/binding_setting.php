<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo "绑定管理";?></h3>
      <ul class="tab-base">
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo "绑定管理";?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <table class="table tb-type2" id="prompt">
    <tbody>
      <tr class="space odd">
        <th colspan="12" class="nobg"><div class="title">
            <h5><?php echo $lang['nc_prompts'];?></h5>
            <span class="arrow"></span></div></th>
      </tr>
      <tr>
        <td><ul>
            <li></li>
          </ul></td>
      </tr>
    </tbody>
  </table>
  <table class="table tb-type2">
    <thead>
      <tr class="thead">
        <th><?php echo "平台名称";?></th>
        <th><?php echo "网址";?></th>
        <th class="align-center"><?php echo "启用";?></th>
        <th class="align-center"><?php echo "操作";?></th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($output['api_arr']) && is_array($output['api_arr'])){ foreach($output['api_arr'] as $k => $v){ ?>
      <tr class="hover">
        <td><?php echo $v['name'];?></td>
        <td><?php echo $v['url'];?></td>
        <td class="w25pre align-center">
        	<?php if($v['payment_state'] == '1'){ ?>
        		<?php echo $lang['nc_yes'];?>
        	<?php }else { ?>
        		<?php echo $lang['nc_no'];?>
        	<?php } ?></td>
        <td class="w156 align-center">
        	<?php if($v['payment_state'] == '1'){ ?>
        		<a href="javascript:void(0)" onclick="if(confirm('<?php echo $lang['payment_index_ensure_disable'];?>?')){location.href='index.php?act=gold_payment&op=set&state=2&payment_id=<?php echo $v['payment_id'];?>'}"> <?php echo $lang['payment_index_disable'];?></a>
        	<?php }else { ?>
        		<a href="index.php?act=gold_payment&op=set&state=1&payment_id=<?php echo $v['payment_id'];?>"><?php echo $lang['payment_index_enable'];?></a>
        	<?php } ?>
        	| <a href="index.php?act=gold_payment&op=edit&payment_id=<?php echo $v['payment_id']; ?>"><?php echo $lang['nc_edit']?></a></td>
      </tr>
      <?php } } ?>
    </tbody>
    <tfoot>
      <tr class="tfoot">
        <td colspan="15"></td>
      </tr>
    </tfoot>
  </table>
</div>