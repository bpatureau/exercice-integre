<?php require("config.php");?>
<?php include("header.php");?>
<?php     
?>
<?php if ( isset($_GET['view']) ):
    switch ($_GET['view']) :
        case "form" :
            include("form.php");
            break;
            case "etiquette" :
                include("etiquette.php");
            break;
            case "sortie" :
                include("sortie.php");
            break;
        default :
            include("home.php");
    endswitch;
else :
    include("home.php");
endif;?>

<?php include("footer.php");?>
<?php include "debug.php";?>
