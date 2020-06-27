<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-27 21:45:10
  from 'C:\xampp\htdocs\SklepRPG\app\views\UserManageView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef7a1c6e8e875_24682375',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '131f55e8c4cd22c1f46bf3cb57cbec25750c89f8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SklepRPG\\app\\views\\UserManageView.tpl',
      1 => 1593286991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef7a1c6e8e875_24682375 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19492178945ef7a1c6e7ed04_68784386', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_19492178945ef7a1c6e7ed04_68784386 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19492178945ef7a1c6e7ed04_68784386',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    
<section id="one" class="wrapper">                   
        <div class="inner">
            <form id="search-form" class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
UserManage"
                <fieldset>
                <ul class="icons">
                    <li><input type="text" style="width: 100%" placeholder="login" name="user_nick" value="<?php echo $_smarty_tpl->tpl_vars['search']->value->name;?>
" /></li>
                    <li><button type="submit" class="pure-button pure-button-primary" style="margin-left: 18%">Wyszukaj</button></li>
                </ul>
                </fieldset>
            </form>
                    
            <table>
                    <thead>
                            <tr>
                                    <th>Login</th>
                                    <th>Email</th>
                                    <th>Rola</th>
                                    <th>Nowa Rola</th>
                            </tr>
                    </thead>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'u');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['u']->value['iduser'] != $_smarty_tpl->tpl_vars['id']->value) {?> 
                            <tbody>
                                    <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['u']->value['login'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['u']->value['email'];?>
 zł</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['u']->value['role'];?>
</td>
                                            <td><form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
ChangeRole/<?php echo $_smarty_tpl->tpl_vars['u']->value['iduser'];?>
">                                     
                                                <select name="role" id="role">
                                                    <option value="user">user</option>
                                                    <option value="sprzedawca">sprzedawca</option>
                                                    <option value="admin">admin</option>
                                                </select>
                                            <input type="submit" value="Zmień" class="button primary small"/>
                                            </form></td>
                                    </tr> 
                            </tbody>
                        <?php }?>
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
