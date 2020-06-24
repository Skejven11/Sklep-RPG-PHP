<!DOCTYPE HTML>
<!--
	Theory by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
		<title>Szczurołap - Sklep z grami RPG</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
                <link rel="stylesheet" href="{$conf->app_url}/css/main.css" />
</head>
<body>

<header id="header">
	<div class="inner">
		<nav id="nav">
			<a href="{$conf->action_root}Home">Strona Główna</a>
                        {if count($conf->roles)<=0}
                        <a href="{$conf->action_root}LoginShow">Zaloguj</a>
                        {else}	
                        <a href="{$conf->action_root}Order">Koszyk</a>
                        <a href="{$conf->action_root}Profile">Profil</a>
                        <a href="{$conf->action_root}Logout">Wyloguj</a>
                        {/if}
		</nav>
                <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
	</div>
</header>

<section id="banner">
	<h1>Witaj w Szczurołapie</h1>
	<p>Sklep z grami RPG</p>
</section>
                        
{block name=content} {/block}

<footer id="footer">
	<div class="inner">
		<div class="flex">
                        <div class="copyright">
                            &copy; Bartosz Zysk. | Design: <a href="https://templated.co" style="color:#5385c1">TEMPLATED</a>.| Banner: <a href="https://twitter.com/Jack_Burton27" style="color:#5385c1">Daniel K</a>
                        </div>
                        <ul class="icons">
                                <li><a href="https://twitter.com/ApSklep" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                        </ul>
		</div>
</footer>

</body>

</html>