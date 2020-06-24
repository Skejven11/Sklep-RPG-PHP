{extends file="main.tpl"}
{block name=content}
        <section id="one" class="wrapper">
                <div class="inner">
                    <h3 style="text-align: center"> Zarejestruj się </h3>
                                <div class="box login inner" >
                                    <div class="inner">
                                        <form method="post" action="{$conf->action_root}RegiSave">  

                                            <div class="inner 7u">
                                                    <input type="text" name="login" id="name" value="" placeholder="Pseudonim" />
                                            </div>
                                            <h5 style="text-align: center">Pseudonim powinien składać się z x do y znaków</h5>

                                            <div class="inner 7u">
                                                    <input type="email" name="email" id="email" value="" placeholder="Email" />
                                            </div>
                                            <h5></h5>

                                            <div class="inner 7u">
                                                    <input type="password" name="password" id="email" value="" placeholder="Hasło" />
                                            </div>
                                            <h5 style="text-align: center">Hasło powinno składać się z x do y znaków</h5>

                                            <div class="inner 7u">
                                                <input type="checkbox" id="copy" name="copy">
                                                <label for="copy">Zgadzam się na coś</label>
                                            </div>

                                    <ul class="actions" style="margin-left: 32%">
                                                        <li><input type="submit" value="Dalej" class="button special"/></li>
                                                        <li><a href="{$conf->action_root}login" class="button">Powrót</a></li>
                                    </ul>
                                    </form>                     		
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