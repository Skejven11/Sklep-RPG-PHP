<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-24 23:34:32
  from 'C:\xampp\htdocs\SklepRPG\app\views\AddressView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef3c6e8988542_47245416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88094da974a1b086884efad0ee9ffe73986f5ceb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SklepRPG\\app\\views\\AddressView.tpl',
      1 => 1593034470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef3c6e8988542_47245416 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_146189045ef3c6e897bb44_39511294', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_146189045ef3c6e897bb44_39511294 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_146189045ef3c6e897bb44_39511294',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <section id="one" class="wrapper">
                <div class="inner">
                    <h3 style="text-align: center"> Adres </h3>
                                <div class="box login inner" >
                                    <div class="inner">
                                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
Address">  

                                            <div class="inner 7u">
                                                    <input type="text" name="name" id="name" value="" placeholder="Imię" />
                                            </div>
                                            <h5></h5>
                                            <div class="inner 7u">
                                                    <input type="text" name="surname" id="email" value="" placeholder="Nazwisko" />
                                            </div>
                                            <h5></h5>
                                            <div class="inner 7u">
                                                    <input type="text" name="street" id="email" value="" placeholder="Ulica" />
                                            </div>
                                            <h5></h5>
                                            <div class="inner 7u">
                                                    <input type="text" name="house" id="email" value="" placeholder="Nr domu" />
                                            </div>
                                            <h5></h5>
                                            <div class="inner 7u">
                                                    <input type="text" name="apartment" id="email" value="" placeholder="Nr apartamentu" />
                                            </div>
                                            <h5></h5>
                                            <div class="inner 7u">
                                                    <input type="text" name="postal" id="email" value="" placeholder="Kod pocztowy" />
                                            </div>
                                            <h5></h5>
                                            <div class="inner 7u">
                                                    <input type="text" name="city" id="email" value="" placeholder="Miasto" />
                                            </div>
                                            <h5></h5>
                                            <div class="inner 7u">
                                                    <input type="text" name="country" id="email" value="" placeholder="Kraj" />
                                            </div>
                                            <h5></h5>

                                    <ul class="actions" style="margin-left: 30%">
                                                        <li><input type="submit" value="Dalej" class="button special"/></li>
                                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
Profile" class="button">Powrót</a></li>
                                    </ul>
                                    </form>                     		
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
                </div>

        </section>
<?php
}
}
/* {/block 'content'} */
}
