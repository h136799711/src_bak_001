<?php include mymps_tpl('inc_head');?>
<div id="<?=MPS_SOFTNAME?>" style="padding-bottom:0">
	<div class="mpstopic-category">
		<div class="panel-tab">
			<ul class="clearfix tab-list">
				<li><a href="?do=user" <?php if($part == 'list'){?>class="current"<?php }?>>用户列表</a></li>
				<li><a href="?do=user&part=add" <?php if($part == 'add'){?>class="current"<?php }?>>增加用户</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
    <tr class="firstr">
    <td align="center">登录ID</td>
    <td width="100" align="center">笔名</td>
    <td width="100" align="center">真名</td>
    <td width="110" align="center">用户组</td>
    <td align="center">上次登陆</td>
    <td align="center">管理项</td>
  </tr>
    <?
foreach($admin AS $row)
{
?>
    <tr align="center" bgcolor="white">
    <td><?=$row[userid]?></td>
    <td><?=$row[uname]?></td>
    <td>&nbsp;<?=$row[tname]?></td>
    <td ><?=$row[typename]?></td>
    <td><em>时间：<?=GetTime($row[logintime])?>　IP：<?=$row[loginip]?></em></td>
    <td>
	  <a href='admin.php?do=user&part=edit&id=<?=$row[id]?>'><u>更改</u></a> |
     <a href='admin.php?do=user&part=delete&id=<?=$row[id]?>' onClick="return confirm('您确定要删除该管理员吗，如不确定请点取消')"><u>删除</u></a>　
    </td>
  </tr>

    <?
}
?>
</table>
</div>
<?php mymps_admin_tpl_global_foot();?>