<?php
sessionCheck()
?>

<body>
    <div class="container">
        <!--70% Breite-->
        <div class="row">
            <div class="grid-example col s4">
                <h3 class="black-text">
                    Abstimmungen
                </h3>
            </div>
            <div class="grid-example col s4 offset-s4">
                <div class="card-panel indigo lighten-1 hoverable">
                    <a class="black-text" href="voting_create">
                        + Neue Abstimmung hinzufügen
                    </a>
                </div>
            </div>
        </div>
        <!-- Hier beginnen die eigentlichen Beiträge-->
        <div class="card-panel grid-example col s4">
            <!--BaseDiv Abstimmung-->
            <div class="row">
                <div>
                    <?php
                    feedCardLister();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>