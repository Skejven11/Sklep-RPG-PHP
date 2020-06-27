<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-27 20:13:39
  from 'C:\xampp\htdocs\SklepRPG\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef78c534fc711_61354996',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3aa38327820f66a8627e6e6571acde26fa5e4929' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SklepRPG\\app\\views\\templates\\main.tpl',
      1 => 1593281617,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef78c534fc711_61354996 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<!--
	Theory by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
		<title>Szczurołap - Sklep z grami RPG</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
                <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/main.css" />
</head>
<body>

<header id="header">
	<div class="inner">
		<nav id="nav">
			<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
Home">Strona Główna</a>
                        <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) <= 0) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
LoginShow">Zaloguj</a>
                        <?php } else { ?>	
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
Order">Koszyk</a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
Profile">Profil</a>
                        <?php if (core\RoleUtils::inRole("sprzedawca")) {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
OrderManage">Zamówienia</a>
                        <?php }?>
                        <?php if (core\RoleUtils::inRole("admin")) {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
UserManage">Użytkownicy</a>
                        <?php }?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
Logout">Wyloguj</a>
                        <?php }?>
		</nav>
                <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
	</div>
</header>

<section id="banner">
	<h1>Witaj w Szczurołapie</h1>
	<p>Sklep z grami RPG</p>
</section>
                        
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14344440075ef78c534fbe98_15610720', 'content');
?>


<footer id="footer">
	<div class="inner">
		<div class="flex">
                        <div class="copyright">
                            &copy; Bartosz Zysk. | Design: <a href="https://templated.co" style="color:#5385c1">TEMPLATED</a>.| Banner: <a href="https://twitter.com/Jack_Burton27" style="color:#5385c1">Daniel K</a>
                        </div>
                        <ul class="icons">
                                <li><a href="https://twitter.com/ApSklep" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                        </ul>
		</div>
</footer>

</body>

</html><?php }
/* {block 'content'} */
class Block_14344440075ef78c534fbe98_15610720 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14344440075ef78c534fbe98_15610720',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'content'} */
}
