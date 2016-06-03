<?php /* Smarty version Smarty-3.1.13, created on 2016-06-03 17:05:35
         compiled from "tpl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24135575196a0be8829-90660912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db97a3f8af80d260372ece8474eb31d980e7a586' => 
    array (
      0 => 'tpl\\index.tpl',
      1 => 1464966334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24135575196a0be8829-90660912',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_575196a0c1bb05_56253192',
  'variables' => 
  array (
    'knjige' => 0,
    'knjiga' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575196a0c1bb05_56253192')) {function content_575196a0c1bb05_56253192($_smarty_tpl) {?><!--
/*************************************************************************************************************************
 * Projekat: 	Lab 4, zadatak 1
 * Autor:		Nikola Vitanovic 14992
 * Date:		2016-06-03
 *************************************************************************************************************************/
-->
<!DOCTYPE html>
<html>
<head>
	<title>Lab 4 - zadatak 1</title>
</head>
<body>
	<?php if (isset($_smarty_tpl->tpl_vars['knjige']->value)&&!empty($_smarty_tpl->tpl_vars['knjige']->value)){?>
	<form method="post" action="index.php?func=brisi">
		<table>
			<tr>
				<th>ISBN</th>
				<th>Naslov</th>
				<th>Autor</th>
				<th>Izdanje</th>
				<th>Ocena</th>
				<th></th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['knjiga'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['knjiga']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['knjige']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['knjiga']->key => $_smarty_tpl->tpl_vars['knjiga']->value){
$_smarty_tpl->tpl_vars['knjiga']->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['knjiga']->value['isbn'];?>
</td>	
				<td><?php echo $_smarty_tpl->tpl_vars['knjiga']->value['naslov'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['knjiga']->value['autor'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['knjiga']->value['izdanje'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['knjiga']->value['ocena'];?>
</td>
				<td><input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['knjiga']->value['isbn'];?>
" value="Brisanje"></td>
			</tr>
			<?php } ?>
		</table>
	</form>
	<hr/>
	<?php }?>
	<form method="post" action="index.php?func=dodaj">
		<table>
			<tr>
				<td>ISBN:</td>
				<td><input type="text" name="isbn"></td>
			</tr>
			<tr>
				<td>Naslov:</td>
				<td><input type="text" name="naslov"></td>
			</tr>
			<tr>
				<td>Autor:</td>
				<td><input type="text" name="autor"></td>
			</tr>
			<tr>
				<td>Izdanje:</td>
				<td>
					<select name = "izdanje">
					<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
						<option><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
					<?php }} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Ocena:</td>
				<td><input type="text" name="ocena"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Dodaj">
				</td>
			</tr>
		</table>
	</form>
</body>
</html><?php }} ?>