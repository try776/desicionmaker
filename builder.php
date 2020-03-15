<?php
function build($page)
{
?>
    <!DOCTYPE html>
    <html>

    <head>
        <?php require_once 'head.php'; ?>
    </head>
    <body>
        <nav style="background-color:#5c6bc0;">
            <?php require_once 'navigation.php'; ?>
        </nav>
        <main>
            <?php require_once $page; ?>
        </main>
        <footer class="page-footer" style="background-color:#5c6bc0;">
            <?php require_once 'footer.php'; ?>
        </footer>
    </body>

    </html>
<?php
}
?>

//test
//test2