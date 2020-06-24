<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-19 20:57:09
  from 'C:\xampp\htdocs\SklepRPG\app\views\AddItemView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eed0a85c515c8_99134233',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04a7ce9dfe6d48fd61c141b88a67e2fdc2ee9868' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SklepRPG\\app\\views\\AddItemView.tpl',
      1 => 1592592904,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eed0a85c515c8_99134233 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3118877695eed0a85c413a9_87245483', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_3118877695eed0a85c413a9_87245483 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_3118877695eed0a85c413a9_87245483',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <section class="wrapper">
            <div class="inner">
                    <h3> Dodaj produkt </h3>
                                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
AddItem">  
                                            <input type="text" name="name" id="name" value="" placeholder="Nazwa" />
                                            <h5></h5>
                                            <input type="text" name="author" id="email" value="" placeholder="Autor" />
                                            <h5></h5>
                                            <input type="text" name="publisher" id="email" value="" placeholder="Wydawca" />
                                            <h5></h5>
                                            <input type="text" name="price" id="email" value="" placeholder="Cena (zł)" />
                                            <h5></h5>                                        
                                                <select name="genre" id="genre">
                                                    <option value="">-Gatunek-</option>
                                                    <option value="2">High Fantasy</option>
                                                    <option value="1">Dark Fantasy</option>
                                                    <option value="3">Sci-Fi</option>
                                                    <option value="4">Postapokalipsa</option>
                                                    <option value="5">Horror</option>
                                                    <option value="6">Historyczne</option>
                                                    <option value="7">Inne</option>
                                                </select>
                                            <h5></h5>
                                    <ul class="actions">
                                            <li><input type="submit" value="Dodaj" class="button special"/></li>
                                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
Home" class="button">Powrót</a></li>
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
