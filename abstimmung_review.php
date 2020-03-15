<?php
sessionCheck()
?>
<div class="col s12 m7">
    <h2 class="header">Danke für Ihre Eingabe folgender Daten</h2>
    <div class="card horizontal">
        <tr>
            <td>themaid:</td>
            <td><?php echo $_SESSION['themaid'] ?></td>
            <br>
        </tr>
        <tr>
            <td>titel:</td>
            <td><?php echo $_SESSION['titel'] ?></td>
            <br>
        </tr>
        <tr>
            <td>beschreibung:</td>
            <td><?php echo $_SESSION['beschreibung'] ?></td>
            <br>
        </tr>
    </div>
</div>
</div>