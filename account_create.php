<?php
?>
<div class="container">
    <div class="row center-align">
        <div class="col s12">
            <h1 class="center-align">Account erstellen</h1>
            <div class="col s12 center-align">
                <div class="card-panel grey lighten-5 z-depth-1">
                    <div class="row valign-wrapper">
                        <div class="col s10 center-align">
                            <form action="account_write" method="post">
                                <input type="text" id="username" name="username" placeholder="Username" required><br>
                                <input type="password" id="password" name="pw" placeholder="Passwort" required><br>
                                <input type="password" name="pw2" oninput="check(this)" placeholder="Passwort wiederholen" required><br>
                                <button class="btn waves-effect waves-light" type="submit" name="submit">Account erstellen<i class="material-icons right">send</i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- überprüft ob passwörter übereinstimmen -->
<script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('password').value) {
            input.setCustomValidity('Die Passwörter stimmen nicht über ein Blyat');
        } else {
            input.setCustomValidity('');
        }
    }
</script>