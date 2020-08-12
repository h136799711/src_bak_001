<?php include mymps_tpl('inc_head');?>
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
  <tr class="firstr">
  	<td colspan="2">相关说明</td>
  </tr>
  <tr bgcolor="#ffffff">
    <td id="menu_tip">
 <li>生活百宝箱显示在首页的第一屏右侧，显示最新的24个文字链接，每个连接文字建议5个汉字以内</li>
 <li>链接类型选为直接跳转，当打开页面时将至将跳转到该链接地址</li>
 <li>填写站外链接，请确认链接地址包含http://</li>
    </td>
  </tr>
</table>
</div>
<form action="?part=service" method="post">
<input name="forward_url" value="<?=GetUrl()?>" type="hidden"/>
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
    <tr style="font-weight:bold; background-color:#dff6ff">
      <td><input class="checkbox" name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)"/> 删?</td>
      <td>链接文字</td>
      <td>类型</td>
      <td>链接URL地址</td>
      <td>显示顺序</td>
      <td>启用状态</td>
    </tr>
    <?php foreach($lifebox as $k =>$value){?>
        <tr bgcolor="white">
          <td><input class="checkbox" type='checkbox' name='delids[]' value='<?=$value[id]?>' id="<?=$value[id]?>"></td>
          <td><input class="text" name="edit[<?=$value[id]?>][lifename]" value="<?=$value[lifename]?>" /> <a href="../lifebox.php?id=<?=$value['id']?>" target="_blank">预览 &raquo;</a></td>
          <td><select name="edit[<?=$value[id]?>][typeid]">
      <?php echo get_servtype_options($value[typeid]);?>
      </select></td>
          <td><input class="text" value="<?=$value[lifeurl]?>" name="edit[<?=$value[id]?>][lifeurl]"/></td>
          <td ><input name="edit[<?=$value[id]?>][displayorder]" value="<?=$value[displayorder]?>" type="text" class="txt"/></td>
          <td><select name="edit[<?=$value[id]?>][if_view]"><?=get_ifview_options($value[if_view])?></select></td>
        </tr>
    <?}?>
    <tr bgcolor="#f5fbff">
      <td align="center"><b>新增</b></td>
      <td><input name="add[lifename]" value="" type="text" class="text"/></td>
      <td><select name="add[typeid]"><?php echo get_servtype_options($typeid);?></select></td>
      <td><input name="add[lifeurl]" value="" type="text" class="text"/></td>
      <td><input name="add[displayorder]" value="0" type="text" class="txt"/></td>
      <td><select name="add[if_view]">
      <?=get_ifview_options(2)?>
      </select></td>
    </tr>
</table>
</div>
<center>
<input class="mymps large" value="提 交" name="<?php echo CURSCRIPT; ?>_submit" type="submit"> &nbsp;
</center>
</form>
<?php mymps_admin_tpl_global_foot();?>