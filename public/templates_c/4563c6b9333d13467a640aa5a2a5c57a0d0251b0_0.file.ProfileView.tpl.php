<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-25 11:12:36
  from 'C:\xampp\htdocs\SklepRPG\app\views\ProfileView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef46a849a9630_65192902',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4563c6b9333d13467a640aa5a2a5c57a0d0251b0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SklepRPG\\app\\views\\ProfileView.tpl',
      1 => 1593076355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef46a849a9630_65192902 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17519510125ef46a84994518_88976279', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_17519510125ef46a84994518_88976279 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17519510125ef46a84994518_88976279',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section class="wrapper">
    
        <div class="inner">
            <div class='row'>
                <div style="margin-left: 22% ">
                    <h4>Dane użytkownika:</h4>
                    <div class="20u 12u">
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

                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['exists']->value == '0';
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1) {?>
                        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
Addinit" method="post"> 
                                <input type="submit" value="Dodaj adres" class="pure-button pure-button-primary"/>
                        </form>
                    <?php } else { ?>
                        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
Addinit" method="post"> 
                                <input type="submit" value="Edytuj adres" class="pure-button pure-button-primary"/>
                        </form>
                    <?php }?>
                </div>
                
                <div style="margin-left: 20% ">
                    <h4>Adres:</h4>
                    <div class="20u 12u" >
                        <ul class="alt">
                            <li></li>
                            <li>Imię: <?php echo $_smarty_tpl->tpl_vars['address']->value['first_name'];?>
</li>
                            <li>Nazwisko: <?php echo $_smarty_tpl->tpl_vars['address']->value['last_name'];?>
 </li>
                            <li>Ulica: <?php echo $_smarty_tpl->tpl_vars['address']->value['street'];?>
</li>
                            <li>Nr Domu: <?php echo $_smarty_tpl->tpl_vars['address']->value['house'];?>
</li>
                            <li>Nr Mieszkania: <?php echo $_smarty_tpl->tpl_vars['address']->value['apartment'];?>
</li>
                            <li>Kod pocztowy: <?php echo $_smarty_tpl->tpl_vars['address']->value['postal_code'];?>
</li>
                            <li>Miasto: <?php echo $_smarty_tpl->tpl_vars['address']->value['city'];?>
</li>
                            <li>Kraj: <?php echo $_smarty_tpl->tpl_vars['address']->value['country'];?>
</li>
                            <li></li>
                        </ul>
                    </div>
                </div>
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
