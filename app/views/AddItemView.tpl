{extends file="main.tpl"}
{block name=content}
        <section class="wrapper">
            <div class="inner">
                    <h3> Dodaj produkt </h3>
                                        <form method="post" action="{$conf->action_root}AddItem">  
                                            <input type="text" name="name" id="name" value="" placeholder="Nazwa" />
                                            <h5></h5>
                                            <input type="text" name="author" id="email" value="" placeholder="Autor" />
                                            <h5></h5>
                                            <input type="text" name="publisher" id="email" value="" placeholder="Wydawca" />
                                            <h5></h5>
                                            <input type="text" name="price" id="email" value="" placeholder="Cena (zł)" />
                                            <h5></h5>                                        
                                                <select name="genre" id="genre">
                                                    <option value="">-Gatunek-</option>
                                                    <option value="2">High Fantasy</option>
                                                    <option value="1">Dark Fantasy</option>
                                                    <option value="3">Sci-Fi</option>
                                                    <option value="4">Postapokalipsa</option>
                                                    <option value="5">Horror</option>
                                                    <option value="6">Historyczne</option>
                                                    <option value="7">Inne</option>
                                                </select>
                                            <h5></h5>
                                    <ul class="actions">
                                            <li><input type="submit" value="Dodaj" class="button special"/></li>
                                            <li><a href="{$conf->action_root}Home" class="button">Powrót</a></li>
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