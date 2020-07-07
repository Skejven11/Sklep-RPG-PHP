{extends file="main.tpl"}
{block name=content}
    
    
<section id="one" class="wrapper">
    <h3 style="margin-left: 50%"> Strona {$page} </h3>
    <div class="row">
        <div class="2u" style="margin-left: 2% ">
            {if core\RoleUtils::inRole("sprzedawca")}
                <form action="{$conf->action_root}AddItem" method="post"> 
                        <input type="submit" value="Dodaj nowy produkt" class="button special" style="margin-left: 2%"/>
                </form>
            {/if}

            <form id="search-form" class="pure-form pure-form-stacked" action="{$conf->action_url}Home">
                <fieldset>
                        <input type="text" style="width: 80%" placeholder="nazwa" name="item_name" value="{$search->name}" /><br />
                        <button type="submit" class="pure-button pure-button-primary" style="margin-left: 18%">Wyszukaj</button>
                </fieldset>
            </form>
 
            <div class="box" style="margin-right:20%" >
                 <h3> Gatunki: </h3>
                <ul class="alt">
                    <li></li>
                    {foreach $genres as $gen}
                    <li> <a href="{$conf->action_url}Home/1?genre={$gen["idGenre"]}">{$gen["Genname"]}</a></li>
                    {/foreach}
                    <li></li>
                </ul>
            </div>
         </div>
                        
        <div class="inner">
            <div class="row">
                {foreach $rpg as $rypyg }
                    <div class="box 3u" style="margin-left:2%">
                        <p>{$rypyg["name"]} |<br> Wydawca: {$rypyg["publisher"]} | Autor: {$rypyg["author"]} | <br> Cena: {$rypyg['price']} zł <br> Gatunek: {$rypyg['Genname']}</p>
                        <a class="button special small" href="{$conf->action_url}HomeOrder/{$rypyg['idRPG']}/{$rypyg['price']}">Do koszyka</a>
                    </div>
                {/foreach}     
            </div>
        </div>
            
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
    <div class="inner">
            <ul class="icons" style="margin-left: 50%">
                {if $page != 1}
                <li> <a href="{$conf->action_url}Home/{$page-1}?item_name={$search->name}"><</a></li>
                {/if}
                {for $temp = $minpage to $maxpage}
                        <li><a href="{$conf->action_url}Home/{$temp}?item_name={$search->name}&genre={$genre}">{$temp}</a></li>
                {/for}
                {if $page != $maxpage}
                <li> <a href="{$conf->action_url}Home/{$page+1}?item_name={$search->name}">></a></li>
                {/if}
            </ul>
    </div>
</section>



{/block}