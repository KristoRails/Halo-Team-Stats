<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demonica Halo Team Stats</title>

    <!-- CDN via jsDelivr Bootstrap 5.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <!-- Local CSS files -->
    <link rel="stylesheet" href="../Halo-Team-Stats/css/header.css">
    <link rel="stylesheet" href="../Halo-Team-Stats/css/main.css">
    <link rel="stylesheet" href="../Halo-Team-Stats/css/player-pictures-profile.css">
    <link rel="stylesheet" href="../Halo-Team-Stats/css/player-stats.css">
    <link rel="stylesheet" href="../Halo-Team-Stats/css/footer.css">
    
    <!-- PHP files -->
    <?php 
    include '../Halo-Team-Stats/php_tags/header.php';
    include '../halo-team-stats/php_tags/player_stats.php';
    ?>

</head>
<body>

    <?php echo callHeader();?>

    <div class="container-fluid">
    <ul class="nav player-pictures-container d-flex justify-content-center">
        <a href="#0"><li class="nav-item player-picture-profile-item">
            <img src="../Halo-Team-Stats/images/profile-picture-mike.jpg">
            <h4>Viable Manatee</h4>
        </li></a>
        <a href="#1"><li class="nav-item player-picture-profile-item">
            <img src="../Halo-Team-Stats/images/profile-picture-avo.jpg">
            <h4>Avo_JT</h4>
        </li></a>
        <a href="#2"><li class="nav-item player-picture-profile-item">
            <img src="../Halo-Team-Stats/images/calvin_profile_picture.png">
            <h4>ShadownintheHood</h4>
        </li></a>
        <a href="#3"><li class="nav-item player-picture-profile-item">
            <img src="../Halo-Team-Stats/images/profile-picture.jpg">
            <h4>Kristo Rails</h4>
        </li></a>
    </ul>
</div>
    
    <div class="container-fluid">
    <?php inputDataFromXML(); ?>
    <?php outputPlayerStats(); ?>
    </div>

    <div class="container-fluid">
        <div class="container footer d-flex justify-content-center">
            <ul class="nav">
                <li class="nav-item">
                    <h6>Powered by PHP 7.4</h6>
                </li>
                <li class="nav-item">
                    <h6>Made by Vass Krisztian 'Kristo'</h6>
                </li>
            </ul>
        </div>
    </div>

    
    
</body>
</html>
