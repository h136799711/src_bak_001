<?php include mymps_tpl('inc_head_jq');?>
<script type="text/javascript" src="../include/colorpicker/jquery.colorpicker.js"></script>
<script language='javascript'>
function CheckSubmit()
{
	if(document.form1.title.value=="")
	{
   		document.form1.title.focus();
   		alert("请填写公告标题！");
   		return false;
	}
	if(document.form1.author.value=="")
	{
   		document.form1.author.focus();
   		alert("请填写作者！");
   		return false;
	}
	if(document.form1.content.value =="" && document.form1.redirecturl.value == "")
	{
   		document.form1.content.focus();
   		alert("请填写公告内容！");
   		return false;
	}

	return true;
}
</script>
<form method=post  name="form1" action="announce.php?part=insert" onSubmit="return CheckSubmit();">
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">

<tr class="firstr">
<td colspan="2"><b>添加网站公告</b></td>
</tr>
<tr bgcolor="#f5fbff" >
  <td width="12%" align="right">公告标题： </td>
  <td colspan="3"> <input name="title" class="text" type="text" value="" size="50"><font color="red">*</font></td>
</tr>
<tr  bgcolor="#f5fbff">
<td width="12%" align="right">标题颜色：</td>
<td colspan="3"><input id="cp1" name="titlecolor" class="text" style="width:60px" value=""></td>
</tr>
<script type="text/javascript">
 $(function() {
      
        $("#cp1").colorpicker({
            fillcolor: true
        });
        
    });
</script>
<tr bgcolor="#f5fbff" >
  <td width="12%" align="right">开始时间：</td>
  <td><input name="begintime" class="text" type="text"/> 
  无开始时间请留空（日期格式如：2011-08-08）</td>
</tr>
<tr bgcolor="#f5fbff" >
  <td width="12%" align="right">截止时间：</td>
  <td><input name="endtime" class="text" type="text"/> 
  无截止时间请留空（日期格式如：2011-08-08）</td>
</tr>
<tr bgcolor="#f5fbff" >
  <td width="12%" align="right">跳转地址：</td>
  <td>
    <input name="redirecturl" class="text" type="text" value="" size="50"> 若填写了此处，以下部分则不需填写
  </td>
</tr>
<tr bgcolor="#f5fbff" >
  <td width="12%" align="right">作者：</td>
  <td><input name="author" class="text" type="text" style="width:100px" value="<?=$admin_name?>"><font color="red">*</font></td>
</tr>
</table>
<div style="margin-top:3px;">
<?php echo $acontent?>
</div>
</div>
<center><input type="submit" value="提 交" class="mymps large"/></center>
</form>
<?php mymps_admin_tpl_global_foot();?>