<?php $this->extends('master', ['title' => $title]); ?>

<h2>Dashboard</h2>

<?php $this->start('cssHome');?>
<style>
   #psDaHome p {
    margin-top: 1%;
    margin-bottom: 1.5%;
    color: #4def21;
   } 
</style>

<?php $this->stop();?>

<div id="psDaHome">
    <p>Estou injetando um CSS através do método section da Engine</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, nulla. Deleniti veritatis distinctio dolor quod error quos fugiat asperiores qui beatae molestiae delectus rerum natus ratione soluta, neque eligendi enim.</p>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse animi, sit voluptas, quo laudantium, quisquam eligendi fugit iure aut doloribus voluptatem omnis repellendus eos voluptate. Ducimus incidunt praesentium corrupti natus?</p>
</div>