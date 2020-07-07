<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-07 16:45:02
  from 'C:\xampp\htdocs\SklepRPG\app\views\OrderView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f048a6e69ca76_38803338',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11d6129f4ace532c3ac6ce816ccfe7902c9abc10' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SklepRPG\\app\\views\\OrderView.tpl',
      1 => 1594133074,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f048a6e69ca76_38803338 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17331618835f048a6e6855b5_73527205', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_17331618835f048a6e6855b5_73527205 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17331618835f048a6e6855b5_73527205',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section id="one" class="wrapper">
    <div class="inner">
        <div class="table-wrapper">
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
Order">                                     
                    <select name="status" id="status">
                        <option value="">-Status-</option>
                        <option value="1">Aktywne</option>
                        <option value="2">Oczekuje zapłaty</option>
                        <option value="3">Zapłacono</option>
                        <option value="4">Wysłano</option>
                        <option value="5">Ukończone</option>
                    </select>
                    <h3></h3>
                    <input type="submit" value="Wyszukaj" class="button primary small"/>
            </form>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
                <table>
                        <thead>
                                <tr>
                                        <th>Produkt</th>
                                        <th>Cena</th>
                                        <th>Ilość</th>
                                </tr>
                        </thead>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
?>
                            <?php if ($_smarty_tpl->tpl_vars['i']->value['order_idorder'] == $_smarty_tpl->tpl_vars['p']->value['idorder']) {?>
                        <tbody>
                                <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['i']->value['price'];?>
 zł</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['i']->value['amount'];?>
</td>
                                        <?php if ($_smarty_tpl->tpl_vars['p']->value['name'] == 'Aktywne') {?>
                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
Order/DeleteI/<?php echo $_smarty_tpl->tpl_vars['i']->value['RPG_idRPG'];?>
/<?php echo $_smarty_tpl->tpl_vars['i']->value['price'];?>
" class="button special small">Usuń</a></td>
                                        <?php }?>
                                </tr> 
                        </tbody>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <tfoot>
                                <tr>                                        
                                        <td>Status: <?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['p']->value['total_price'];?>
 zł</td>
                                        <td>Data: <?php echo $_smarty_tpl->tpl_vars['p']->value['date'];?>
</td>
                                </tr>
                        </tfoot>
                </table>
            <?php if ($_smarty_tpl->tpl_vars['p']->value['name'] == 'Aktywne') {?>
                <ul class="icons">
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
OrderFinish/<?php echo $_smarty_tpl->tpl_vars['p']->value['idorder'];?>
" class="button special small">Zamawiam!</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
Order/DeleteO" class="button special small">Usuń!</a></li>
                </ul>
            <?php }?>
            <?php
}
} else {
?> <h3> Brak zamówień </h3>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            
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
