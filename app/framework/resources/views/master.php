<!doctype html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/css/global.css"> <!-- Referência do CSS Global -->
    <script src="https://unpkg.com/feather-icons"></script> <!-- Biblioteca do Feather Icons -->
</head>

<body>
    <section class="container-dashboard">
        <aside class="container-aside" id="container-aside">
            <?php require 'partials/sidebar.php'?>        
        </aside>    

        <section class="container-section-principal">
            <i data-feather="menu" id="menuMobile"></i>
            <article class="container-section-principal-header">
                <?php require 'partials/header.php'?>    
            </article>

            <main class="container-section-principal-content">

                <?= $this->load(); ?>

            </main>

        </section>
    </section>

    <script src="../assets/js/scriptPrincipal.js"></script>
</body>

</html>