<?php include mymps_tpl('inc_head');?>
<style>
label{float:left; display:block; height:20px;}
</style>
<div id="<?=MPS_SOFTNAME?>">
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
<form name="form1" action="member.php?do=group&part=update" onSubmit="return checkSubmit();" method="post">
<input type="hidden" name="id" value="<?=$group[id]?>">
  <tr class="firstr">
  <td colspan="4">会员用户组基本设置</td>
  </tr>
  <tr bgcolor="#f5fbff">
    <td width="80" height="30">用户组名称：</td>
    <td ><input name="levelname" type="text" class="text" id="levelname" size="16" style="width:200px;" value="<?=$group[levelname]?>" /></td>
  </tr>
  <tr class="firstr">
  <td colspan="4">用户组权限设置</td>
  </tr>
  <?=mymps_member_purview($purviews)?>
  <tr class="firstr">
  <td colspan="4">其它设置</td>
  </tr>
  <?php if($id == '1'){?>
  <tr bgcolor="#f5fbff">
    <td height="30">默认拥有金币数</td>
    <td ><input name="money_own" type="text" class="txt" value="<?=$group['money_own']?>"/> <img src="../member/images/mymps_icon_incomes.gif" align="absmiddle"> </td>
  </tr>
  <?php }?>
  <tr bgcolor="#f5fbff">
    <td height="30">可选择的会员模板<br />
<font color="#006acd">（只对商家会员有效）</font></td>
    <td>
    <select name="allow_tpl[]" multiple="multiple" style="width:100px; height:80px">
    <?=get_memtpl_options($group['allow_tpl'])?>
    </select>
    </td>
  </tr>
  <tr bgcolor="#f5fbff">
    <td height="30">每天至多发布信息</td>
    <td ><input name="perday_maxpost" type="text" class="text" size="16" style="width:200px;" value="<?=$group['perday_maxpost']?>"/></td>
  </tr>
  <?php if($group['id'] > 1) {?>
  <tr bgcolor="#f5fbff">
    <td height="30">升级到当前会员组扣除金币<br /><font color="red">(您至少要选择启用一个升级期限)</font></td>
    <td >
    <?php foreach(array('month'=>'一个月','halfyear'=>'半年','year'=>'一年','forever'=>'永久') as $k => $v){?>
    <div style="width:100%; margin:5px auto; line-height:25px">
<input name="settings[ifopen][<?php echo $k; ?>]" type="checkbox" class="checkbox" value="1" <?php if($settings['ifopen'][$k] == 1){?>checked="checked"<?php }?>>启用 <img src="../member/images/mymps_icon_incomes.gif" align="absmiddle"> <input name="settings[money][<?php echo $k; ?>]" class="txt" value="<?php echo $settings['money'][$k]?>"> <?php echo $v; ?>
    </div>
    <?php }?>
   </td>
  </tr>
  <?php }?>
  <tr bgcolor="#f5fbff">
    <td height="30">会员的联系方式显示<br />
<font color="#006acd">（只对商家会员有效）</font></td>
    <td><select name="member_contact">
    	<option value="0" <?php if($group['member_contact'] == 0) echo 'selected style="background-color:#6EB00C;color:white"';?>>显示为网站的联系方式</option>
        <option value="1" <?php if($group['member_contact'] == 1) echo 'selected style="background-color:#6EB00C;color:white"';?>>显示为会员自己的联系方式</option>
        </select></td>
  </tr>
  <tr bgcolor="#f5fbff">
    <td height="60">&nbsp;</td>
    <td>
    <input type="submit" name="Submit" class="mymps mini" value="确认提交"/>
    　<input type="button" onClick=history.back() class="mymps mini" value="返 回">           </td>
  </tr>  
    </form>
    </table>
</div>
<?php mymps_admin_tpl_global_foot();?>