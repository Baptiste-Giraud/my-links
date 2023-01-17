<?php
function get_filenames_in_dir($dir) {
    $files = scandir($dir);
    $filenames = array();
    foreach($files as $file) {
        if (!is_dir($file)) {
            $filenames[] = $file;
        }
    }
    return $filenames;
}

$current_dir = getcwd();
$filenames = get_filenames_in_dir($current_dir);
foreach($filenames as $filename) {
    echo '<a class="nav-link" href="'.$filename.'">'.$filename.'</a>';
}
?>

<style>
.nav-link {
    color: blue;
    text-decoration: none;
    font-weight: bold;
    margin: 10px 5px 15px 20px;
    padding: 5px;

}

.nav-link:hover {
    color: red;
    text-decoration: underline;
}

</style>