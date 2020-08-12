<?php include mymps_tpl('inc_head');?>
<script language=javascript>
function chkform(){
	if(document.form.areaname.value==""){
		alert('请输入地区名称！');
		document.form.areaname.focus();
		return false;
	}
}
</script>
<form method=post onSubmit="return chkform()" name="form" action="?part=edit">
<div id="<?=MPS_SOFTNAME?>">
<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="vbm">
<input name="part" value="update" type="hidden">
<input type="hidden" name="areaid" value="<?=$area[areaid]?>">
<tr bgcolor="#f5fbff">
  <td>地区名称</td>
  <td> 
  <input name="areaname" class="text" type="text" id="areaname" value="<?=$area[areaname]?>" size="30">
   <font color="red">*</font></td>
</tr>
<tr bgcolor="#f5fbff">
  <td>隶属分类</td>
  <td><select name="parentid" id="parentid" >
    	<option value="0">作为根分类...</option>
  </select>
  </td>
</tr>
<tr bgcolor="#f5fbff">
  <td>地区排序</td>
  <td><input name="areaorder" class="text" type="text" id="areaorder" value="<?=$area[areaorder]?>" size="30"></td>
</tr>
</table>
</div>
<center>
<input type="submit" name="<?php echo CURSCRIPT; ?>_submit" value="提交保存" class="mymps mini"/>
&nbsp;&nbsp;
<input type="button" onClick=history.back() value="返 回" class="mymps mini">
</center>
</form>
<?php mymps_admin_tpl_global_foot();?>