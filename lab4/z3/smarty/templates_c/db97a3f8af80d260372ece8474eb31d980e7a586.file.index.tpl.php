<?php /* Smarty version Smarty-3.1.13, created on 2016-06-03 18:50:17
         compiled from "tpl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24135575196a0be8829-90660912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db97a3f8af80d260372ece8474eb31d980e7a586' => 
    array (
      0 => 'tpl\\index.tpl',
      1 => 1464972604,
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
    'knjiga' => 0,
    'dugme_nazad' => 0,
    'dugme_napred' => 0,
    'broj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575196a0c1bb05_56253192')) {function content_575196a0c1bb05_56253192($_smarty_tpl) {?><!--
/*************************************************************************************************************************
 * Projekat: 	Lab 4, zadatak 3
 * Autor:		Nikola Vitanovic 14992
 * Date:		2016-06-03
 *************************************************************************************************************************/
-->
<!DOCTYPE html>
<html>
<head>
	<title>Lab 4 - zadatak 3</title>
</head>
<body>
	<form method="post">
		<table>
			<tr>
				<td>ISBN:</td>
				<td><?php echo $_smarty_tpl->tpl_vars['knjiga']->value['isbn'];?>
</td>
			</tr>
			<tr>
				<td>Naslov:</td>
				<td><?php echo $_smarty_tpl->tpl_vars['knjiga']->value['naslov'];?>
</td>
			</tr>
			<tr>
				<td>Autor:</td>
				<td><?php echo $_smarty_tpl->tpl_vars['knjiga']->value['autor'];?>
</td>
			</tr>
			<tr>
				<td>Cena:</td>
				<td><?php echo $_smarty_tpl->tpl_vars['knjiga']->value['cena'];?>
 <?php echo $_smarty_tpl->tpl_vars['knjiga']->value['valuta'];?>
</td>
			</tr>
			<tr>
				<td colspan="2">
					<?php if (isset($_smarty_tpl->tpl_vars['dugme_nazad']->value)&&!empty($_smarty_tpl->tpl_vars['dugme_nazad']->value)){?>
					<input type="submit" name="nazad" value="<< Nazad">
					<?php }?>
					<input type="submit" name="brisanje" value="Brisanje">
					<?php if (isset($_smarty_tpl->tpl_vars['dugme_napred']->value)&&!empty($_smarty_tpl->tpl_vars['dugme_napred']->value)){?>
					<input type="submit" name="napred" value="Napred >>">
					<?php }?>
					<input type="hidden" name="isbn" value="<?php echo $_smarty_tpl->tpl_vars['knjiga']->value['isbn'];?>
">
					<input type="hidden" name="broj" value="<?php echo $_smarty_tpl->tpl_vars['broj']->value;?>
">
				</td>
			</tr>
		</table>
	</form>
</body>
</html><?php }} ?>