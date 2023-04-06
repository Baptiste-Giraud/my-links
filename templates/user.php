<?php
function_views_count_insert($bdd, $user['id_user']);
$links = function_selectlinkbyuserid($bdd, $user['id_user']);

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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

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
            <div class="name-user">
                <h1><?php echo $user_name; ?></h1>
            </div>
            <?php if(!empty($user_description)) { ?>
            <div class="desc-user">
                <p>
                    <?php echo $user_description; ?>
                </p>
            </div>
            <?php } ?>
        </header>
        <section class="my-links">
            <style>
            <?php
            foreach ($links as $link) {
                $link_url = $link['url'];
                $link_id = $link['id'];
                $link_bgColor = $link['couleur_card'];
                $link_textColor = $link['text_color_link'];
                echo '#link-'.$link_id.'{ background: '. $link_bgColor .' !important; color: ' . $link_textColor . ' !important; } #link-'. $link_id .':before { border-color: '. $link_bgColor .' !important; } #link-'.$link_id.':hover { color: ' . $link_bgColor . ' !important;}';
            }
            ?>
            </style>
        <?php
            foreach ($links as $link) {
                $link_url = $link['url'];
                $link_id = $link['id'];
                $link_text = $link['texte'];
                $link_type = $link['type'];
                $link_forme = $link['forme'];
                $link_bgColor = $link['couleur_card'];
                $link_textColor = $link['text_color_link'];
                echo '<a href="' . $link_url . '" id="link-'. $link_id .'" class="' . $link_type . " " . $link_forme . '"><span>' . $link_text . '</span></a>';
            }
            //function_add_form_newsletter();
        ?>
        </section>
    </main>
</body>

</html>
<script>
$(document).ready(function() {
  $('a').click(function(e) {
    console.log('rrr')
    e.preventDefault();
    var linkId = $(this).attr('id').split('-')[1];
    $.ajax({
      type: 'POST',
      url: '../my-links/function.php',
      data: { link_id: linkId },
      success: function() {
        console.log('Clic enregistré avec succès !');
      }
    });
    window.location.href = $(this).attr('href');
  });
});
</script>
