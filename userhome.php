<?php
function sessionCheckLocal()
{
  if (!isset($_SESSION['login'])) {
    header("Location: login");
    exit;
  }
}
$u_username = $_SESSION['username'];

?>
<div class="container center-align">
  <div class="row">
    <div class="col s12">
      <h3>Hallo <?php echo $u_username; ?> , hier ist dein Profil:</h3>
      <div class="col s12 ">
        <div class="card horizontal">
          <div class="card-stacked">
            <div class="card-content">
              <table>
                <tbody>
                  <tr>
                    <th>Anzahl Abstimmungen Teilgenommen</th>
                    <td>
                      <?php
                      get_number_vote_user();
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Positiv abgestimmt</th>
                    <td>
                      <?php
                      get_number_vote_user_pro();
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Negativ abgestimmt</th>
                    <td>
                      <?php
                      get_number_vote_user_con();
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Anzahl Kommentare verfasst</th>
                    <td>
                      <?php
                      get_number_comment_user();
                      ?>
                    </td>
                  </tr>
              </table>
              <div class="row">
                <div class="center-align">
                  <a class="waves-effect waves-light btn-large" href="password_change">Passwort ändern</a>
                  <a class="waves-effect waves-light btn-large" href="account_create">Account Löschen</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>