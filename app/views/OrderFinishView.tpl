{extends file="main.tpl"}
{block name=content}
<section id="one" class="wrapper">
    <div class="inner">
        <h2 class="centre"> Dziękujemy za złożenie zamówienia!</h2>
        <h3> Dane do przelewu: </h3>
        <p> Nr konta: XXXXXXXXXXXXXXXXXXXXXXXXXXXXX
         <br>Tytuł przelewu: Zamówienie {$order['idorder']}
         <br>Nazwa i adres: Szczurołap s.a. Katowice ul. Jakaś 10 Polska
         <br>Kwota: {$order['total_price']} zł
        </p>
        <p>Prosimy o jak najszybszą wpłatę na konto 
        <br>Status przesyłki można śledzić za pomocą zakładki "Koszyk" i dedykowanego wyszukiwania zamówienia po statusie 
        </p>
        <a href="{$conf->action_root}Order" class="button special">Powrót</a>
    </div>
</section>

{/block}