<?php $this->extends('master', ['title' => $title])?>

<h2>Contas</h2>


<?php
$str = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore fugiat nemo, excepturi laudantium voluptate earum fugit enim corporis maxime labore nisi? Quibusdam asperiores cumque, reiciendis ullam sequi perferendis maxime maiores!";

echo "<p id='teste'>".$this->resume($str, 150)."</p>";
?>


<?php $this->start('menu')?>
    <ul style="margin-left: 10px">
        <li><a href="#" class="active"><i data-feather="home"></i> Contas a pagar </a></li>
    </ul>    
<?php $this->stop()?>


<?php $this->start('css')?>
    <style>
        #teste {
            color: fuchsia;
            font-size: 3em;
        }
    </style>   
<?php $this->stop()?>
