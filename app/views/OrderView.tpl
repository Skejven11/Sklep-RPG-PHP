{extends file="main.tpl"}
{block name=content}
<section id="one" class="wrapper">
    <div class="inner">
        <div class="table-wrapper">
            <form method="post" action="{$conf->action_root}Order">                                     
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
            {foreach $orders as $p}
                <table>
                        <thead>
                                <tr>
                                        <th>Produkt</th>
                                        <th>Cena</th>
                                        <th>Ilość</th>
                                </tr>
                        </thead>
                        {foreach $items as $i}
                            {if $i['order_idorder'] eq $p['idorder']}
                        <tbody>
                                <tr>
                                        <td>{$i['name']}</td>
                                        <td>{$i['price']} zł</td>
                                        <td>{$i['amount']}</td>
                                        {if $p['name'] eq 'Aktywne'}
                                        <td><a href="{$conf->action_root}Order/DeleteI/{$i['RPG_idRPG']}/{$i['price']}" class="button special small">Usuń</a></td>
                                        {/if}
                                </tr> 
                        </tbody>
                            {/if}
                        {/foreach}
                        <tfoot>
                                <tr>                                        
                                        <td>Status: {$p['name']}</td>
                                        <td>{$p['total_price']} zł</td>
                                        <td>Data: {$p['date']}</td>
                                </tr>
                        </tfoot>
                </table>
            {if $p['name'] eq 'Aktywne'}
                <ul class="icons">
                    <li><a href="{$conf->action_root}OrderFinish" class="button special small">Zamawiam!</a></li>
                    <li><a href="{$conf->action_root}Order/DeleteO" class="button special small">Usuń!</a></li>
                </ul>
            {/if}
            {foreachelse} <h3> Brak zamówień </h3>
            {/foreach}
            
            {if $msgs->isMessage()}
                <div class="messages bottom-margin">
                        <ul>
                        {foreach $msgs->getMessages() as $msg}
                        {strip}
                                <li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
                        {/strip}
                        {/foreach}
                        </ul>
                </div>
             {/if}    
        </div>
    </div>
</section>

{/block}