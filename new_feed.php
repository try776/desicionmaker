
<?php
function selectData3()
{
    $db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
    $sql = "SELECT titel, beschreibung, id_abstimmung from abstimmung";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           echo" <div class=\"container\">
                    <div class=\"row\">
                    <div class=\"col s9 push-s1\">
                        <div class=\"card blue-grey darken-1\">
                            <div class=\"card-content white-text\">
                                <span class=\"card-title\"> " . $row['titel'] . "</span>
                                <p> " . $row['beschreibung'] . " <br></p>
                                <p>Anzahl votes: " . get_percentage( $row['id_abstimmung']) . " <br></p>
                                <p>Abstimmung ID: " . $row['id_abstimmung'] . "<br></p>
                            </div>
                            <div class=\"card-content white-text\">
                                <span class=\"card-title\">Vote Now</span>
                            </div>
                            <div class=\"progress\" style=\"background-color:red\">
                                <div class=\"determinate\" style=\"width:" . get_percentage( $row['id_abstimmung']) . "%\">
                                </div>
                            </div>
                            <form action=\"write_vote\" method=\"post\">
                                <input type=\"hidden\" name=\"idabstimmung\" value=\" " . $row['id_abstimmung'] . " \">
                                <button type=\"submit\" name=\"submit\" value=\"0\">Like</button>
                                <button type=\"submit\" class=\"right\" name=\"submit\" value=\"1\">Dislike</button>
                            </form>
                            <div class=\"row\">
                                <div class=\"card-content white-text\">
                                    <span class=\"card-title\">Kommentare:</span>
                                    " .showComment( $row['id_abstimmung']) . "
                                </div>
                            </div>
                            <div class=\"card-content white-text\">
                                <form action=\"comment_create\" method=\"post\">
                                    <div class=\"row\">
                                        <div class=\"input-field col s12\">
                                            <textarea name=\"comment\" id=\"textarea1\" class=\"materialize-textarea validate\" length=\"500\" required></textarea>
                                            <label for=\"textarea1\">Dein Kommentar</label>
                                        </div>
                                    </div>
                                    <input type=\"hidden\" name=\"idabstimmung\" value=\" 1 \">
                                    <button class=\"red\" type=\"submit\" name=\"submit\" value=\"0\">+ Neuen Kommentar hinzufügen</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
        }}}
?>