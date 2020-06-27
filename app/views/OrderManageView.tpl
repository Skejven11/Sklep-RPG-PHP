{extends file="main.tpl"}
{block name=content}
    
<section id="one" class="wrapper">                   
        <div class="inner">
            <form id="search-form" class="pure-form pure-form-stacked" action="{$conf->action_url}OrderManage"
                <fieldset>
                <ul class="icons">
                    <li><input type="text" style="width: 30%" placeholder="id" name="order_id" value="{$search->name}" /></li>
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
                    {foreach $orders as $o}
                            <tbody>
                                    <tr>
                                            <td>{$o['idorder']}</td>
                                            <td>{$o['login']}</td>
                                            <td>{$o['total_price']} zł</td>
                                            <td> 
                                                <ul>
                                                    {foreach $items as $i}
                                                        {if $i['order_idorder'] eq $o['idorder']}
                                                            <li>{$i['name']} x {$i['amount']}</li>
                                                        {/if}
                                                    {/foreach}
                                                </ul>
                                            <td>{$o['date']}</td>
                                            <td>{$o['name']}</td>
                                            <td><form method="post" action="{$conf->action_root}ChangeStatus/{$o['idorder']}">                                     
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
                    {/foreach}
            </table>
                    
                    
            
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
</section>



{/block}