<?php include mymps_tpl('inc_head');?>
<form name="form_mymps" action="?part=list" method="post">
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
    <tr class="firstr">
      <td width="40">编号</td>
      <td>名称</td>
      <td width="80">地区排序</td>
      <td>操作</td>
    </tr>

<?php 
foreach($area AS $area)
{
?>
	  <tr <?php if($area[level] == 0){?>bgcolor="#f5fbff" <?}else{?>  bgcolor="#ffffff" <?}?>>
	  <td width="40"><label><?=$area[areaid]?></label></td>
	  <td width="60%" align="left">
      <li style="margin-left:<?=$area[level]?>em;" <?php if($area['parentid'] != '0') echo 'class="son"'?>><input name="areaorder[<?=$area[areaid]?>][areaname]" value="<?=$area[areaname]?>" class="text"></li></td>
      <td width="40"><input name="areaorder[<?=$area[areaid]?>][areaorder]" value="<?=$area[areaorder]?>" class="txt" type="text"/></td>
	  <td><a href="area.php?part=edit&areaid=<?=$area[areaid]?>">编辑</a> / <a href="area.php?part=del&areaid=<?=$area[areaid]?>" onClick="if(!confirm('确定要删除吗？\n\n该操作将同时删除隶属该地区分类的子分类！'))return false;">删除</a></td>
	</tr>
<?
} 
?>
</table>
</div>
<center><input name="<?php echo CURSCRIPT; ?>_submit" type="submit" value="提交" class="mymps large"/></center>
</form>
<?php mymps_admin_tpl_global_foot();?>