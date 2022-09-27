<?php
function_views_count_insert($bdd, 3);

$links = function_selectlinkbyuserid($bdd,  3);
$user = function_selectinfouserbypseudo($bdd,  'baba');
$user_name = $user["name_user"];
$user_img = $user["path_img"];

$theme = function_select_parameter_current_user_by_name($bdd,  'baba');
$theme_img = $theme["template_url"];

if (!is_null($user_img)) {
    $user_img = $user_img;
} else {
    $user_img = "./asset/front/img/tonny.jpg";
}

$theme_font = $theme["police"];
$theme_description = $theme["description"];
$theme_class = ""

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - MyLinks.fans</title>
</head>
<body id="user" class="<?php echo ""  ?>">

<header class="header-user">
    <div class="img-user">
        <img src="<?php echo $user_img; ?>">
    </div>
    <div class="desc-user">
        <p>
            <?php echo $theme_description; ?>
        </p>
    </div>
</header>
    <?php
     


        foreach ($links as $link){
            echo '<a href="'.$link['url'].'">'.$link['texte'].'</a><br>';
        }

    ?>
</body>
</html>