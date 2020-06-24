<!doctype html>
{extends file="main.tpl"}
{block name=content}
<section id="one" class="wrapper">
        <div class="inner">
            <h3 style="text-align: center"> Zaloguj się </h3>
                        <div class="box login inner" >
                                <form action="{$conf->action_root}login" method="post">  
                                        <div class="inner 7u">
                                            <input type="text" name="login" placeholder="Pseudonim" />
                                        </div>
                                        <h5></h5>
                                        <div class="inner 7u">
                                             <input type="password" id="id_pass" name="pass" placeholder="Hasło" />
                                        </div>
                                        <h3></h3>
                                        <ul class="actions" style="margin-left: 25%">
                                            <li><input type="submit" value="zaloguj" class="button special"/></li>
                                            <li><a href="{$conf->action_root}RegiShow" class="button">Zarejestruj się</a></li>
                                        </ul>
                                </form>
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