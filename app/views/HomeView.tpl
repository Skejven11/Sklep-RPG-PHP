{extends file="main.tpl"}
{block name=content}
    
    
<section id="one" class="wrapper">
    
    {if core\RoleUtils::inRole("sprzedawca")}
        <form action="{$conf->action_root}AddItem" method="post"> 
                <input type="submit" value="Dodaj nowy produkt" class="button special"/>
        </form>
    {/if}
    
    <form id="search-form" class="pure-form pure-form-stacked" action="{$conf->action_url}Home"
	<fieldset>
		<input type="text" placeholder="nazwa" name="item_name" value="{$search->name}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Wyszukaj</button>
	</fieldset>
    </form>
    
    <div class="row">
        <div class="2u" style="margin-left: 2% ">
            <div class="box" style="margin-right:20%" >
                 <h3> Gatunki: </h3>
                <ul class="alt">
                    <li></li>
                    {foreach $genres as $gen}
                        <li>{$gen["Genname"]}</li>
                    {/foreach}
                    <li></li>
                </ul>
            </div>
         </div>
                        
        <div class="inner">
            <div class="row">
                {foreach $rpg as $rypyg }
                    <div class="box 3u " style="margin-left:2%">
                        <p>{$rypyg["name"]} | Wydawca: {$rypyg["publisher"]} | Autor: {$rypyg["author"]} | Cena: {$rypyg['price']}</p>
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
</section>



{/block}