{extends file="main.tpl"}
{block name=content}
<section class="wrapper">
        <div class="inner">
            <h4>Dane użytkownika:</h4>
            <div class="4u 12u">
                <ul class="alt">
                    <li></li>
                    <li>Pseudonim: {$profile['login']}</li>
                    <li>email: {$profile['email']} </li>
                    <li>Uprawnienia: {$profile['role']}</li>
                    <li></li>
                </ul>
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