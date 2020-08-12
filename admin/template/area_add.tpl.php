<?php include mymps_tpl('inc_head');?>
<script language=javascript>
function chkform(){
	if(document.form.areaname.value==""){
		alert('请输入地区名称，多个地区以 | 隔开！');
		document.form.areaname.focus();
		return false;
	}
}
</script>
<form method=post onSubmit="return chkform()" name="form" action="?part=add">
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
<tr bgcolor="#f5fbff">
  <td >地区名称： </td>
  <td>
  <textarea rows="5" name="areaname" cols="50"></textarea><br />
<div style="margin-top:3px">支持地区批量添加，多个地区以 | 隔开 <br />
<font color="red">范例：地区1|地区2|地区3|地区4|地区5</font></div></td>
</tr>
<tr bgcolor="#f5fbff">
  <td >分类选择： </td>
  <td><select name="parentid" id="parentid" >
    <option value="0">作为根分类...</option>
	<!--<?=cat_list('area',0,0,true,1)?>-->
  </select>  </td>
</tr>
<tr bgcolor="#f5fbff">
  <td >地区排序： </td>
  <td><input name="areaorder" class="text" type="text" id="areaorder" value="<?=$maxorder?>" size="14"></td>
</tr>
</table>
</div>
<center>
<input type="submit" name="<?php echo CURSCRIPT; ?>_submit" value="提交保存" class="mymps mini"/>
&nbsp;&nbsp;
<input type="button" onClick=history.back() value="返 回" class="mymps mini"></center>
</form>
<?php mymps_admin_tpl_global_foot();?>