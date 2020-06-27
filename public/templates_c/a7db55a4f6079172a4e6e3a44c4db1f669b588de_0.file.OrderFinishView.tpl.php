<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-27 15:08:00
  from 'C:\xampp\htdocs\SklepRPG\app\views\OrderFinishView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef744b0c953f8_26996638',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7db55a4f6079172a4e6e3a44c4db1f669b588de' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SklepRPG\\app\\views\\OrderFinishView.tpl',
      1 => 1593263280,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef744b0c953f8_26996638 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2391631015ef744b0c90ed5_48052002', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_2391631015ef744b0c90ed5_48052002 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2391631015ef744b0c90ed5_48052002',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section id="one" class="wrapper">
    <div class="inner">
        <h2 class="centre"> Dziękujemy za złożenie zamówienia!</h2>
        <h3> Dane do przelewu: </h3>
        <p> Nr konta: XXXXXXXXXXXXXXXXXXXXXXXXXXXXX
         <br>Tytuł przelewu: Zamówienie <?php echo $_smarty_tpl->tpl_vars['order']->value['idorder'];?>

         <br>Nazwa i adres: Szczurołap s.a. Katowice ul. Jakaś 10 Polska
         <br>Kwota: <?php echo $_smarty_tpl->tpl_vars['order']->value['total_price'];?>
 zł
        </p>
        <p>Prosimy o jak najszybszą wpłatę na konto 
        <br>Status przesyłki można śledzić za pomocą zakładki "Koszyk" i dedykowanego wyszukiwania zamówienia po statusie 
        </p>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
OrderEnd" class="button special">Powrót</a>
    </div>
</section>

<?php
}
}
/* {/block 'content'} */
}
