<?php
function_views_count_insert($bdd, 7);

$links = function_selectlinkbyuserid($bdd,  7);

$user = function_selectinfouserbypseudo($bdd,  'edman');
$user_name = $user["name_user"];
$user_img = $user["path_img"];
$user_description = $user["description"];

if (!is_null($user_img)) {
    $user_img = $user_img;
} else {
    $user_img = "./assets/front/img/mylinks.png";
}

$style = function_select_parameter_current_user_by_name($bdd,  $user_name);
$style_compo = $style["type_composition"];
$style_themeId = $style["theme_id"];
$style_font = $style["police"];
$style_colorPage = $style["color_page"];

$theme = function_background_theme_user_by_page_parameter($bdd, $style_themeId);
$theme_type = $theme["type"];
$theme_slug = $theme["slug"];
$theme_class = $theme["slug"] . " " . $theme_type . " " . $style_compo;

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/front/css/style.css">
    <title><?php echo $user_name; ?> - MyLinks.fans</title>

    
    <style>
        body.<?php echo $theme_slug; if($style_compo == "bg-top") { echo ":before"; } ?> {
            <?php if($theme_type == "svg") { ?>
                background-image: url('./assets/template/svg/<?php echo $theme_slug; ?>.svg');
            <?php } else if($theme_type == "color") { ?>
                background-color: <?php echo $style_colorPage; ?>
            <?php } ?>
        }
    </style>
</head>

<body id="user" class="<?php echo $theme_class;  ?>">
    <main class="user-container">
        <header class="header-user">
            <div class="img-user">
                <img src="<?php echo $user_img; ?>">
            </div>
            <div class="desc-user">
                <p>
                    <?php echo $user_description; ?>
                </p>
            </div>
        </header>
        <?php



        foreach ($links as $link) {
            echo '<a href="' . $link['url'] . '">' . $link['texte'] . '</a><br>';
        }

        ?>
    </main>
</body>

</html>