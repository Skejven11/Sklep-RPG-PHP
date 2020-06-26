{extends file="main.tpl"}
{block name=content}
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

{/block}