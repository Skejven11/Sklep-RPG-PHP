{extends file="main.tpl"}
{block name=content}
    
    
<section id="one" class="wrapper">                   
        <div class="inner">
            <form id="search-form" class="pure-form pure-form-stacked" action="{$conf->action_url}UserManage"
                <fieldset>
                <ul class="icons">
                    <li><input type="text" style="width: 100%" placeholder="login" name="user_nick" value="{$search->name}" /></li>
                    <li><button type="submit" class="pure-button pure-button-primary" style="margin-left: 18%">Wyszukaj</button></li>
                </ul>
                </fieldset>
            </form>
                    
            <table>
                    <thead>
                            <tr>
                                    <th>Login</th>
                                    <th>Email</th>
                                    <th>Rola</th>
                                    <th>Nowa Rola</th>
                            </tr>
                    </thead>
                    {foreach $users as $u}
                        {if $u['iduser'] neq $id} 
                            <tbody>
                                    <tr>
                                            <td>{$u['login']}</td>
                                            <td>{$u['email']} zł</td>
                                            <td>{$u['role']}</td>
                                            <td><form method="post" action="{$conf->action_root}ChangeRole/{$u['iduser']}">                                     
                                                <select name="role" id="role">
                                                    <option value="user">user</option>
                                                    <option value="sprzedawca">sprzedawca</option>
                                                    <option value="admin">admin</option>
                                                </select>
                                            <input type="submit" value="Zmień" class="button primary small"/>
                                            </form></td>
                                    </tr> 
                            </tbody>
                        {/if}
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