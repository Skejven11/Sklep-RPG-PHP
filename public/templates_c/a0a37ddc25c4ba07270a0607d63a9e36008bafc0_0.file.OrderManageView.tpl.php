<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-27 22:52:02
  from 'C:\xampp\htdocs\SklepRPG\app\views\OrderManageView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef7b17285f1e3_90513492',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a0a37ddc25c4ba07270a0607d63a9e36008bafc0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SklepRPG\\app\\views\\OrderManageView.tpl',
      1 => 1593291121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef7b17285f1e3_90513492 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15276140735ef7b17284d6c7_77745042', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_15276140735ef7b17284d6c7_77745042 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15276140735ef7b17284d6c7_77745042',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
<section id="one" class="wrapper">                   
        <div class="inner">
            <form id="search-form" class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
OrderManage"
                <fieldset>
                <ul class="icons">
                    <li><input type="text" style="width: 30%" placeholder="id" name="order_id" value="<?php echo $_smarty_tpl->tpl_vars['search']->value->name;?>
" /></li>
                    <li><button type="submit" class="pure-button pure-button-primary" style="margin-left: 18%">Wyszukaj</button></li>
                </ul>
                </fieldset>
            </form>
                    
            <table>
                    <thead>
                            <tr>
                                    <th>Id zamówienia</th>
                                    <th>Użytkownik</th>
                                    <th>Cena</th>
                                    <th>Produkty</th>
                                    <th>Data</th>
                                    <th>Status</th>
                                    <th>Nowy status</th>
                            </tr>
                    </thead>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'o');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['o']->value) {
?>
                            <tbody>
                                    <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['o']->value['idorder'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['o']->value['login'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['o']->value['total_price'];?>
 zł</td>
                                            <td> 
                                                <ul>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
?>
                                                        <?php if ($_smarty_tpl->tpl_vars['i']->value['order_idorder'] == $_smarty_tpl->tpl_vars['o']->value['idorder']) {?>
                                                            <li><?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
 x <?php echo $_smarty_tpl->tpl_vars['i']->value['amount'];?>
</li>
                                                        <?php }?>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </ul>
                                            <td><?php echo $_smarty_tpl->tpl_vars['o']->value['date'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['o']->value['name'];?>
</td>
                                            <td><form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ChangeStatus/<?php echo $_smarty_tpl->tpl_vars['o']->value['idorder'];?>
">                                     
                                                <select name="status" id="status">
                                                    <option value="1">Aktywne</option>
                                                    <option value="2">Oczekuje zapłaty</option>
                                                    <option value="3">Zapłacono</option>
                                                    <option value="4">Wysłano</option>
                                                    <option value="5">Ukończone</option>
                                                </select>
                                            <input type="submit" value="Zmień" class="button primary small"/>
                                            </form></td>
                                    </tr> 
                            </tbody>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
                    
                    
            
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
