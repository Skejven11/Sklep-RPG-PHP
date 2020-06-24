<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-24 23:28:40
  from 'C:\xampp\htdocs\SklepRPG\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef3c588553528_58654550',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ddc1b1d321f0cf09d5a0fda416fc0f80884cca63' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SklepRPG\\app\\views\\LoginView.tpl',
      1 => 1593034119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef3c588553528_58654550 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
<!doctype html>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9926852805ef3c588544cf6_83833617', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_9926852805ef3c588544cf6_83833617 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_9926852805ef3c588544cf6_83833617',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section id="one" class="wrapper">
        <div class="inner">
            <h3 style="text-align: center"> Zaloguj się </h3>
                        <div class="box login inner" >
                                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post">  
                                        <div class="inner 7u">
                                            <input type="text" name="login" placeholder="Pseudonim" />
                                        </div>
                                        <h5></h5>
                                        <div class="inner 7u">
                                             <input type="password" id="id_pass" name="pass" placeholder="Hasło" />
                                        </div>
                                        <h3></h3>
                                        <ul class="actions" style="margin-left: 25%">
                                            <li><input type="submit" value="zaloguj" class="button special"/></li>
                                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
RegiShow" class="button">Zarejestruj się</a></li>
                                        </ul>
                                </form>
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
