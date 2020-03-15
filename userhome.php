<?php
function sessionCheckLocal()
{
  if (!isset($_SESSION['login'])) {
    header("Location: login");
    exit;
  }
}
?>
<?php
sessionCheckLocal();
?>
<div class="row">
  <div class="col s9">
    <h1>Dein Profil</h1>
    <div class="col s12 m7">
      <div class="card horizontal">
        <tr>
          <td>userid:</td>
          <td><?php echo $_SESSION['userid'] ?></td>
          <br>
        </tr>
        <td>logged in:</td>
        <td><?php echo $_SESSION['login'] ?></td>
        <br>
        </tr>
      </div>
    </div>
  </div>
</div>


</div>