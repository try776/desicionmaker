<?php
function selectData3()
{
    $db = new Mysqli("localhost", "tester", "welcome$20", "desicionmaker");
    $sql = "SELECT titel, beschreibung, id_abstimmung from abstimmung";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           echo" <div class=\"row\">
                    <div class=\"col s12\">
                        <div class=\"card\">
                            <div class=\"row\">
                                <div class=\"col s8\">
                                    <div class=\"card-content black-text\">
                                        <span class=\"card-title\"> " . $row['titel'] . " </span>
                                        <p> " . $row['beschreibung'] . " <br></p>
                                        <p>Anzahl votes: " . get_percentage( $row['id_abstimmung']) . " <br></p>
                                        <p>Abstimmung ID: " . $row['id_abstimmung'] . "<br></p>
                                     </div>
                                </div>
                            <div class=\"col s4 card-content\">
                            <img class=\"responsive-img\" src=\"https://ruinmyweek.com/wp-content/uploads/2016/09/really-funny-memes-none-of-my-business-kermit-the-frog-meme-kermit-meme-z-cocaine.jpg\">
                        </div>
                    </div>
                    <div class=\"card-action\">
                        <h4>Vote Now</h4>
                            <div class=\"progress\" style=\"background-color:red\">
                            <div class=\"determinate\" style=\"width:" . get_percentage( $row['id_abstimmung']) . "%\"></div>
                    </div>
                    <a href=\"?name=" . $row['id_abstimmung'] . " \"><i class=\"material-icons small\">thumb_down</i></a>
                    <a href=\"\"><i class=\"material-icons right small\">thumb_up</i></a>
                    <form action=\"write_vote\" method=\"post\">
                        <input type=\"hidden\" name=\"idabstimmung\" value=\" " . $row['id_abstimmung'] . " \">
                        <button type=\"submit\" name=\"submit\" value=\"0\">Like</button>
                        <button type=\"submit\" name=\"submit\" value=\"1\">Dislike</button>
                    </form>
                </div>
                <div class=\"row\">
                    <div class=\"card-action\">
                            <h4>Kommentare:</h4>
                            " .showComment( $row['id_abstimmung']) . "   
                            <div class=\"grid-example col s12\">
                            <div class=\"card-panel grey lighten-1 hoverable\">
                                <form action=\"comment_create\" method=\"post\">
                                    <div class=\"row\">
                                        <div class=\"input-field col s12\">
                                            <textarea name=\"comment\" id=\"textarea1\" class=\"materialize-textarea validate\" length=\"500\" required></textarea>
                                            <label for=\"textarea1\">Dein Kommentar</label>
                                        </div>
                                    </div>
                                <input type=\"hidden\" name=\"idabstimmung\" value=\" " . $row['id_abstimmung'] . " \">
                                <button type=\"submit\" name=\"submit\" value=\"0\">+ Neuen Kommentar hinzufügen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"card-action\">
                    <div class=\"grid-example col s12\">
                        <div class=\"card-panel grey lighten-1 hoverable\">
                            " .showComment( $row['id_abstimmung']) . "
                        </div>
                    </div>
            </div>
            </div>
            </div>
            </div>";
            
        }
    } 
}      
?>

<?php
    selectData3();
?>