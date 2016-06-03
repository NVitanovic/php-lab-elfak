<?php /* Smarty version Smarty-3.1.13, created on 2016-06-03 17:54:29
         compiled from "tpl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24135575196a0be8829-90660912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db97a3f8af80d260372ece8474eb31d980e7a586' => 
    array (
      0 => 'tpl\\index.tpl',
      1 => 1464969267,
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
    'racuni' => 0,
    'racun' => 0,
    'izmena' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575196a0c1bb05_56253192')) {function content_575196a0c1bb05_56253192($_smarty_tpl) {?><!--
/*************************************************************************************************************************
 * Projekat: 	Lab 4, zadatak 2
 * Autor:		Nikola Vitanovic 14992
 * Date:		2016-06-03
 *************************************************************************************************************************/
-->
<!DOCTYPE html>
<html>
<head>
	<title>Lab 4 - zadatak 2</title>
</head>
<body>
	<?php if (isset($_smarty_tpl->tpl_vars['racuni']->value)&&!empty($_smarty_tpl->tpl_vars['racuni']->value)){?>
	<form method="post" action="index.php?func=izmena">
		<table>
			<tr>
				<th>jmbg</th>
				<th>ime</th>
				<th>prezime</th>
				<th>valuta</th>
				<th>iznos</th>
				<th></th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['racun'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['racun']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['racuni']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['racun']->key => $_smarty_tpl->tpl_vars['racun']->value){
$_smarty_tpl->tpl_vars['racun']->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['racun']->value['jmbg'];?>
</td>	
				<td><?php echo $_smarty_tpl->tpl_vars['racun']->value['ime'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['racun']->value['prezime'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['racun']->value['valuta'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['racun']->value['iznos'];?>
</td>
				<td><input type="submit" name="<?php echo $_smarty_tpl->tpl_vars['racun']->value['jmbg'];?>
" value="Izmena"></td>
			</tr>
			<?php } ?>
		</table>
	</form>
	<hr/>
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['izmena']->value)&&!empty($_smarty_tpl->tpl_vars['izmena']->value)){?>
	<form method="post" action="index.php?func=potvrdiizmenu">
		<table>
			<tr>
				<td>JMBG:</td>
				<td><?php echo $_smarty_tpl->tpl_vars['izmena']->value['jmbg'];?>
 <input type="hidden" name="jmbg" value="<?php echo $_smarty_tpl->tpl_vars['izmena']->value['jmbg'];?>
"></td>
			</tr>
			<tr>
				<td>Ime:</td>
				<td><input type="text" name="ime" value="<?php echo $_smarty_tpl->tpl_vars['izmena']->value['ime'];?>
"></td>
			</tr>
			<tr>
				<td>Prezime:</td>
				<td><input type="text" name="prezime" value="<?php echo $_smarty_tpl->tpl_vars['izmena']->value['prezime'];?>
"></td>
			</tr>
			<tr>
				<td>Valuta:</td>
				<td>
					RSD <input type="radio" name="valuta" <?php if ($_smarty_tpl->tpl_vars['izmena']->value['valuta']=='RSD'){?> checked <?php }?> value="RSD"> 
					EUR <input type="radio" name="valuta" <?php if ($_smarty_tpl->tpl_vars['izmena']->value['valuta']=='EUR'){?> checked <?php }?> value="EUR"> 
					CHF <input type="radio" name="valuta" <?php if ($_smarty_tpl->tpl_vars['izmena']->value['valuta']=='CHF'){?> checked <?php }?> value="CHF">
					USD <input type="radio" name="valuta" <?php if ($_smarty_tpl->tpl_vars['izmena']->value['valuta']=='USD'){?> checked <?php }?> value="USD">  
				</td>
			</tr>
			<tr>
				<td>Iznos:</td>
				<td><input type="text" name="iznos" value="<?php echo $_smarty_tpl->tpl_vars['izmena']->value['iznos'];?>
"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Dodaj">
				</td>
			</tr>
		</table>
	</form>
	<?php }?>
</body>
</html><?php }} ?>