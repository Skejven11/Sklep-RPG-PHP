{extends file="main.tpl"}
{block name=content}
        <section id="one" class="wrapper">
                <div class="inner">
                    <h3 style="text-align: center"> Adres </h3>
                                <div class="box login inner" >
                                    <div class="inner">
                                        <form method="post" action="{$conf->action_root}Address">  

                                            <div class="inner 7u">
                                                    <input type="text" name="name" id="name" value="" placeholder="Imię" />
                                            </div>
                                            <h5></h5>
                                            <div class="inner 7u">
                                                    <input type="text" name="surname" id="email" value="" placeholder="Nazwisko" />
                                            </div>
                                            <h5></h5>
                                            <div class="inner 7u">
                                                    <input type="text" name="street" id="email" value="" placeholder="Ulica" />
                                            </div>
                                            <h5></h5>
                                            <div class="inner 7u">
                                                    <input type="text" name="house" id="email" value="" placeholder="Nr domu" />
                                            </div>
                                            <h5></h5>
                                            <div class="inner 7u">
                                                    <input type="text" name="apartment" id="email" value="" placeholder="Nr apartamentu" />
                                            </div>
                                            <h5></h5>
                                            <div class="inner 7u">
                                                    <input type="text" name="postal" id="email" value="" placeholder="Kod pocztowy" />
                                            </div>
                                            <h5></h5>
                                            <div class="inner 7u">
                                                    <input type="text" name="city" id="email" value="" placeholder="Miasto" />
                                            </div>
                                            <h5></h5>
                                            <div class="inner 7u">
                                                    <input type="text" name="country" id="email" value="" placeholder="Kraj" />
                                            </div>
                                            <h5></h5>

                                    <ul class="actions" style="margin-left: 30%">
                                                        <li><input type="submit" value="Dalej" class="button special"/></li>
                                                        <li><a href="{$conf->action_root}Profile" class="button">Powrót</a></li>
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
                </div>

        </section>
{/block}