<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-26 13:16:12
  from 'C:\xampp\htdocs\SklepRPG\app\views\HomeView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef5d8fcb357d0_07583725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e3018d67f50922f1c3ab4c5ecf3b0b80b91b0db' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SklepRPG\\app\\views\\HomeView.tpl',
      1 => 1593170169,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef5d8fcb357d0_07583725 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11871143815ef5d8fcb20036_59467290', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_11871143815ef5d8fcb20036_59467290 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11871143815ef5d8fcb20036_59467290',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    
<section id="one" class="wrapper">
    
    <?php if (core\RoleUtils::inRole("sprzedawca")) {?>
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
AddItem" method="post"> 
                <input type="submit" value="Dodaj nowy produkt" class="button special"/>
        </form>
    <?php }?>
    
    <form id="search-form" class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
Home"
	<fieldset>
		<input type="text" placeholder="nazwa" name="item_name" value="<?php echo $_smarty_tpl->tpl_vars['search']->value->name;?>
" /><br />
		<button type="submit" class="pure-button pure-button-primary">Wyszukaj</button>
	</fieldset>
    </form>
    
    <div class="row">
        <div class="2u" style="margin-left: 2% ">
            <div class="box" style="margin-right:20%" >
                 <h3> Gatunki: </h3>
                <ul class="alt">
                    <li></li>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['genres']->value, 'gen');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gen']->value) {
?>
                        <li><?php echo $_smarty_tpl->tpl_vars['gen']->value["Genname"];?>
</li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <li></li>
                </ul>
            </div>
         </div>
                        
        <div class="inner">
            <div class="row">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rpg']->value, 'rypyg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rypyg']->value) {
?>
                    <div class="box 3u " style="margin-left:2%">
                        <p><?php echo $_smarty_tpl->tpl_vars['rypyg']->value["name"];?>
 | Wydawca: <?php echo $_smarty_tpl->tpl_vars['rypyg']->value["publisher"];?>
 | Autor: <?php echo $_smarty_tpl->tpl_vars['rypyg']->value["author"];?>
 | Cena: <?php echo $_smarty_tpl->tpl_vars['rypyg']->value['price'];?>
</p>
                        <a class="button special small" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
HomeOrder/<?php echo $_smarty_tpl->tpl_vars['rypyg']->value['idRPG'];?>
/<?php echo $_smarty_tpl->tpl_vars['rypyg']->value['price'];?>
">Do koszyka</a>
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>     
            </div>
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
