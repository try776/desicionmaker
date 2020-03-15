<?php
if(!isset($_SESSION['login'])){
  header("Location: login");
  exit;
}
?>

<h1>abtimmung erstellen</h1>

<div class="row">
    <div class="col s12">
        <div class="container center-align">
            <div class="col s12 m4 l8 ">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">
                        <div class="col s10">
                            <form action="abstimmung_erstellen" method="post">
                                <label>Dein Abstimmungsthema?</label>
                                <div class="ui dropdown" name="dropdown">
                                    <select name="themaid" type="number" required>
                                        <option value="" disabled selected>Theam auswählen</option>
                                        <?php
                                        get_topics();
                                        ?>
                                    </select>
                                </div>
                                <input type="text" name="titel" class="validate" minlength="1" maxlength="20" placeholder="Titel" required><br>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea name="beschreibung" id="textarea1" class="materialize-textarea validate" minlength="3" length="500" required></textarea>
                                        <label for="textarea1">Abstimmungs Beschreibung</label>
                                    </div>
                                </div>
                                <input class="waves-effect waves-light btn-small" name="submit" type="submit" value="Absenden">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>