{extends file="main.tpl"}
{block name=content}
<section class="wrapper">
    
        <div class="inner">
            <div class='row'>
                <div style="margin-left: 20% ">
                    <h4>Dane użytkownika:</h4>
                    <div class="20u 12u">
                        <ul class="alt">
                            <li></li>
                            <li>Pseudonim: {$profile['login']}</li>
                            <li>email: {$profile['email']} </li>
                            <li>Uprawnienia: {$profile['role']}</li>
                            <li></li>
                        </ul>
                    </div>

                    {if {$exists eq '0'}}
                        <form action="{$conf->action_root}Addinit" method="post"> 
                                <input type="submit" value="Dodaj adres" class="pure-button pure-button-primary"/>
                        </form>
                    {else}
                        <form action="{$conf->action_root}Addinit" method="post"> 
                                <input type="submit" value="Edytuj adres" class="pure-button pure-button-primary"/>
                        </form>
                    {/if}
                </div>
                
                <div style="margin-left: 20% ">
                    <h4>Adres:</h4>
                    <div class="20u 12u" >
                        <ul class="alt">
                            <li></li>
                            <li>Imię: {$address['first_name']}</li>
                            <li>Nazwisko: {$address['last_name']} </li>
                            <li>Ulica: {$address['street']}</li>
                            <li>Nr Domu: {$address['house']}</li>
                            <li>Nr Mieszkania: {$address['apartment']}</li>
                            <li>Kod pocztowy: {$address['postal_code']}</li>
                            <li>Miasto: {$address['city']}</li>
                            <li>Kraj: {$address['country']}</li>
                            <li></li>
                        </ul>
                    </div>
                </div>
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