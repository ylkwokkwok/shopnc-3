<?php defined('InShopNC') or exit('Access Invalid!');?><div class="home-standard-layout wrapper style-<?php echo $output['style_name'];?>"><div class="left-sidebar"><div class="title"><div class="pic-type"><?php if (!empty($output['code_tit']['code_info']['url'])) { ?><a href="<?php echo $output['code_tit']['code_info']['url'];?>" target="_blank"><img border=0 src="<?php  echo SiteUrl.'/'.$output['code_tit']['code_info']['pic'];?>" ></a><?php }else { ?><img border=0 src="<?php  echo SiteUrl.'/'.$output['code_tit']['code_info']['pic'];?>" ><?php } ?></div></div>	<div class="left-ads"><?php if($output['code_act']['code_info']['type'] == 'adv' && $output['code_act']['code_info']['ap_id']>0){ ?><script type="text/javascript" src="<?php echo SiteUrl;?>/api.php?act=adv&op=advshow&ap_id=<?php echo $output['code_act']['code_info']['ap_id'];?>"></script><?php }else { ?><a href="<?php echo $output['code_act']['code_info']['url'];?>" target="_blank"><img class="scrollLoading" border=0 src="" data-url="<?php  echo SiteUrl.'/'.$output['code_act']['code_info']['pic'];?>"></a><?php } ?></div><div class="recommend-classes"><ul><?php if (!empty($output['code_category_list']['code_info']) && is_array($output['code_category_list']['code_info'])) {?><?php foreach ($output['code_category_list']['code_info'] as $key => $val) { ?><?php if (!empty($val['goods_class']) && is_array($val['goods_class'])) { ?><?php foreach ($val['goods_class'] as $k => $v) {?><li><a href="index.php?act=search&cate_id=<?php echo $v['gc_id'];?>" title="<?php echo $v['gc_name'];?>" target="_blank"><?php echo $v['gc_name'];?></a></li><?php }}}} ?></ul></div></div><div class="middle-layout"><ul class="tabs-nav">	<?php if (!empty($output['code_recommend_list']['code_info']) && is_array($output['code_recommend_list']['code_info'])) {?><?php foreach ($output['code_recommend_list']['code_info'] as $key => $val) {?><li class="<?php echo $key==1 ? 'tabs-selected':'';?>"><i class="arrow"></i><h3><?php echo $val['recommend']['name'];?></h3></li><?php }} ?></ul>	<?php if (!empty($output['code_recommend_list']['code_info']) && is_array($output['code_recommend_list']['code_info'])) { ?><?php foreach ($output['code_recommend_list']['code_info'] as $key => $val) { ?><?php if($key == 1){?><div class="tabs-panel middle-banner-style01 fade-img <?php echo $key==1 ? '':'tabs-hide';?>"><li class="a1"><script type="text/javascript" src="<?php echo SiteUrl;?>/index.php?act=adv&op=advshow&ap_id=<?php echo $output['code_adv']['code_info']['ap_id']+1;?>"></script></li><li class="a2"><script type="text/javascript" src="<?php echo SiteUrl;?>/index.php?act=adv&op=advshow&ap_id=<?php echo $output['code_adv']['code_info']['ap_id']+2;?>"></script></li><li class="b1"><script type="text/javascript" src="<?php echo SiteUrl;?>/index.php?act=adv&op=advshow&ap_id=<?php echo $output['code_adv']['code_info']['ap_id']+3;?>"></script></li><li class="c1"><script type="text/javascript" src="<?php echo SiteUrl;?>/index.php?act=adv&op=advshow&ap_id=<?php echo $output['code_adv']['code_info']['ap_id']+4;?>"></script></li><li class="c2"><script type="text/javascript" src="<?php echo SiteUrl;?>/index.php?act=adv&op=advshow&ap_id=<?php echo $output['code_adv']['code_info']['ap_id']+5;?>"></script></li><li class="d1"><script type="text/javascript" src="<?php echo SiteUrl;?>/index.php?act=adv&op=advshow&ap_id=<?php echo $output['code_adv']['code_info']['ap_id']+6;?>"></script></li><li class="d2"><script type="text/javascript" src="<?php echo SiteUrl;?>/index.php?act=adv&op=advshow&ap_id=<?php echo $output['code_adv']['code_info']['ap_id']+7;?>"></script></li><li class="d3"><script type="text/javascript" src="<?php echo SiteUrl;?>/index.php?act=adv&op=advshow&ap_id=<?php echo $output['code_adv']['code_info']['ap_id']+9;?>"></script></li><li class="d4"><script type="text/javascript" src="<?php echo SiteUrl;?>/index.php?act=adv&op=advshow&ap_id=<?php echo $output['code_adv']['code_info']['ap_id']+9;?>"></script></li></div><?php } else{?><div class="tabs-panel middle-goods-list <?php echo $key==1 ? '':'tabs-hide';?>"><ul><?php if(!empty($val['goods_list']) && is_array($val['goods_list'])){ ?><?php foreach($val['goods_list'] as $k => $v){ ?><li><dl><dt class="goods-name"><a target="_blank" href="<?php echo ncUrl(array('act'=>'goods','goods_id'=>$v['goods_id']),'goods'); ?>" title="<?php echo $v['goods_name']; ?>"><?php echo $v['goods_name']; ?></a></dt><dd class="goods-thumb"><a target="_blank" href="<?php echo ncUrl(array('act'=>'goods','goods_id'=>$v['goods_id'],'id'=>$v['store_id']),'goods'); ?>"><img class="scrollLoading"src="" data-url="<?php echo strpos($v['goods_pic'],'http')===0 ? $v['goods_pic']:SiteUrl."/".$v['goods_pic'];?>" alt="<?php echo $v['goods_name']; ?>"/></a></span></dd><dd class="goods-price"><?php echo $lang['index_index_store_goods_price'].$lang['nc_colon'];?><em><?php echo $lang['currency'];?><?php echo $v['goods_price']; ?></em></dd></dl></li><?php }} ?></ul></div><?php }}}?></div><div class="right-sidebar"><div class="title"></div><div class="recommend-brand"><ul><?php if (!empty($output['code_brand_list']['code_info']) && is_array($output['code_brand_list']['code_info'])) { ?><?php foreach ($output['code_brand_list']['code_info'] as $key => $val) { ?><li><a href="<?php echo ncUrl(array('act'=>'brand','op'=>'list','brand'=>$val['brand_id'])); ?>" target="_blank"><img src="<?php  echo SiteUrl.'/'.$val['brand_pic'];?>" alt="<?php echo $val['brand_name']; ?>"  onload="javascript:DrawImage(this,96,32);"></a></li><?php }} ?></ul></div><div class="right-side-focus"><ul><script type="text/javascript" src="<?php echo SiteUrl;?>/index.php?act=adv&op=advshow&ap_id=<?php echo $output['code_adv']['code_info']['ap_id'];?>"></script></ul></div></div></div>
