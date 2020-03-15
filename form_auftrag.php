<?php

function selectData2()
{
    $db = new Mysqli("localhost", "tester", "welcome$20", "forms");
    $sql = "SELECT produkt from produkte";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo "<option " . "value='" . $row['produkt'] . "'>" . $row['produkt'] . "</option>";
        }
    }
}
?>



<div class="row">
    <div class="col s12">
        <h1 class="center-align">Form_Auftrag</h1>
        <div class="container center-align">
            <div class="col s12 m4 l8 ">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">
                        <div class="col s10">
                            <form action="frage_add" method="post">
                                <label>Dein Problemprodukt?</label>
                                <div class="ui dropdown" name="dropdown">
                                    <select name="produkt" required>
                                        <option value="" disabled selected>Problemprodukt wählen</option>
                                        <?php
                                        selectData2();
                                        ?>
                                    </select>

                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea name="frage" id="textarea1" class="materialize-textarea validate" minlength="3" length="500" required></textarea>
                                        <label for="textarea1">Abstimmungs beschreibung</label>
                                    </div>
                                </div>
                                <input type="text" name="username" pattern="^[a-zA-Z]+$" class="validate" minlength="1" maxlength="20" placeholder="Username" required><br>
                                <input id="email" type="email" class="validate" name="email" placeholder="E-Mail" required><br>
                                <input class="waves-effect waves-light btn-small" name="submit" type="submit" value="Absenden">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>