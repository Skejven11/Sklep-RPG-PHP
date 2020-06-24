<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-15 13:56:58
  from 'C:\xampp\htdocs\SklepRPG\app\views\ProfileView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee7620a4a4575_42147674',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4563c6b9333d13467a640aa5a2a5c57a0d0251b0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SklepRPG\\app\\views\\ProfileView.tpl',
      1 => 1592222202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee7620a4a4575_42147674 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2310399145ee7620a497bd8_63952861', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_2310399145ee7620a497bd8_63952861 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2310399145ee7620a497bd8_63952861',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section class="wrapper">
        <div class="inner">
            <h4>Dane użytkownika:</h4>
            <div class="4u 12u">
                <ul class="alt">
                    <li></li>
                    <li>Pseudonim: <?php echo $_smarty_tpl->tpl_vars['profile']->value['login'];?>
</li>
                    <li>email: <?php echo $_smarty_tpl->tpl_vars['profile']->value['email'];?>
 </li>
                    <li>Uprawnienia: <?php echo $_smarty_tpl->tpl_vars['profile']->value['role'];?>
</li>
                    <li></li>
                </ul>
            </div>
               
            <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
               <div class="messages bottom-margin">
                       <ul>
                       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
                       <li class="msg <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>info<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
                       <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                       </ul>
               </div>
               <?php }?>    
        </div>
</section>

<?php
}
}
/* {/block 'content'} */
}
