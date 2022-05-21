<!doctype html>
<html lang="en">
<head>
    <!-- Required  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
          crossorigin="anonymous">
</head>
<body class="p-3 mb-2 bg-white text-dark">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
                <li class="nav-item active">
                        <?php
    
    if(isset($_SESSION["email"]))
{
}
?>
                <a class="nav-link" href="collectorIndex.php">WELCOME COLLECTOR <?php echo '<strong><u>'.$_SESSION["email"].'</strong></u>';?> TO CITIZENS JOB STATUS INFORMATION PORTAL <span class="sr-only">(current)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="AddNewCitizen.php">Add New Citizen</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link" href="logout.php" style="color:red;">Logout</a>
        </li>
        </ul>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>

    </div>
    </div>
</nav>

</body>
</html>