<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-25 23:35:46
  from 'C:\xampp\htdocs\SklepRPG\app\views\OrderView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef518b26c7960_98120604',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11d6129f4ace532c3ac6ce816ccfe7902c9abc10' => 
    array (
      0 => 'C:\\xampp\\htdocs\\SklepRPG\\app\\views\\OrderView.tpl',
      1 => 1593120945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef518b26c7960_98120604 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8869201385ef518b26c6d81_87775779', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_8869201385ef518b26c6d81_87775779 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8869201385ef518b26c6d81_87775779',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section id="one" class="wrapper">
    <div class="inner">
        <div class="table-wrapper">
                <table>
                        <thead>
                                <tr>
                                        <th>Nazwa</th>
                                        <th>Price</th>
                                </tr>
                        </thead>
                        <tbody>
                                <tr>
                                        <td>Item 1</td>
                                        <td>29.99</td>
                                </tr> 
                        </tbody>
                        <tfoot>
                                <tr>
                                        <td colspan="1"></td>
                                        <td>100.00</td>
                                </tr>
                        </tfoot>
                </table>
        </div>
    </div>
</section>

<?php
}
}
/* {/block 'content'} */
}
