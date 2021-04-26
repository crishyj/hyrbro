<?

include("config.php");
include(SOKVAG_CLASSES."classCommon.php");
include(SOKVAG_CLASSES."classDatabas.php");
include(SOKVAG_CLASSES."classWeb.php");

$web = new web();

if (!isset($_REQUEST['pid'])) { $_REQUEST['pid'] = ""; }
if (empty($_REQUEST['pid'])) {
    die("Produkt saknas (1)");
}

$arrArticle = $web->GetProductWithSEOName($_REQUEST['pid']);
if (empty($arrArticle['ArticleID'])) {
    die("Produkt saknas (2)");
}

$arrCat = $web->GetCat($arrArticle['CategoryID']);


$arrImage = array();
$arrImage['Url'] = "default.png";
$rsImages = $web->GetProductImages($arrArticle['ArticleID']);
while ($arrImg = databas::getFetch($rsImages)) {
    $arrImage['Url'] = $arrImg['FilenameImg2'];
}


?>
<!doctype html>
<html lang="sv">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Hyr <?=$arrArticle['Name'];?> | Hyrbro AB</title>
    <meta name="description" content="<?=$arrArticle['Description'];?>" />


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?=SOKVAG_WWW;?>/assets/css/styles.css" />
    <link rel="stylesheet" href="<?=SOKVAG_WWW;?>/assets/css/navigation.css" />
    <link rel="stylesheet" href="<?=SOKVAG_WWW;?>/assets/css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />

    <link rel="apple-touch-icon" sizes="180x180" href="<?=SOKVAG_WWW;?>/assets/manifest/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?=SOKVAG_WWW;?>/assets/manifest/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?=SOKVAG_WWW;?>/assets/manifest/favicon-16x16.png" />
    <link rel="manifest" href="<?=SOKVAG_WWW;?>/assets/manifest/site.webmanifest" />
    <link rel="mask-icon" href="<?=SOKVAG_WWW;?>/assets/manifest/safari-pinned-tab.svg" color="#f3b934" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#f3b934" />

    <meta property="og:url" content="<?=SOKVAG_WWW;?>/_produkt.php?pid=<?=$arrArticle['SEOName'];?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Hyr <?=$arrArticle['Name'];?>" />
    <meta property="og:description" content="<?=$arrArticle['Description'];?>" />
    <meta property="og:image" content="https://hyrbro.se/v1/admin/img/<?=$arrImage['Url'];?>" />

    <link rel="stylesheet" href="<?=SOKVAG_WWW;?>/assets/css/jquery.calendar.css" />
    <link rel="stylesheet" href="<?=SOKVAG_WWW;?>/assets/css/hotel-datepicker.css" />

    

</head>

<body>
    <section class="topbar sticky-top">
        <? require("../include/includeStickybar.php");?>
    </section>

    <section class="menu">
        <? require("../include/includeMenu.php");?>
    </section>

    <section class="search_box">
        <? require("../include/includeSearch.php");?>
    </section>

    <section class="content">

        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="mobile_navOnly">
                        <div class="product_nav">
                            <span class="parent">Start</span>
                            <span class="divider"> / </span>
                            <span class="parent">Övriga verktyg</span>
                            <span class="divider"> / </span>
                            <span class="parent">Borrmaskiner</span>
                            <span class="divider"> / </span>
                            <span class="child">Hilti SF 2-A</span>
                        </div>
                    </div>
                    <div class="product_header">
                        <div class="product_title">
                            <?=$arrArticle['Name']; ?>
                        </div>
                        <? /*
                        <div class="">
                            <button class="product_filter">
                                Fråga om produkt
                            </button>
                        </div>
                        */ ?>

                    </div>

                    <? 
                    /*if (strlen($arrArticle['Description'])>0) { ?>
                    <div class="product_text">             
                        <?=$arrArticle['Description'];?>
                    </div>
                    <? } */ ?>
                    <? /*
                    <div>
                        <svg width="277" height="40" viewbox="0 0 277 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle r="19" transform="matrix(-1 0 0 1 20 20)" stroke="#F6C143" stroke-width="2"></circle>
                            <path d="M28 16H25V12H11C9.9 12 9 12.9 9 14V25H11C11 26.66 12.34 28 14 28C15.66 28 17 26.66 17 25H23C23 26.66 24.34 28 26 28C27.66 28 29 26.66 29 25H31V20L28 16ZM14 26.5C13.17 26.5 12.5 25.83 12.5 25C12.5 24.17 13.17 23.5 14 23.5C14.83 23.5 15.5 24.17 15.5 25C15.5 25.83 14.83 26.5 14 26.5ZM27.5 17.5L29.46 20H25V17.5H27.5ZM26 26.5C25.17 26.5 24.5 25.83 24.5 25C24.5 24.17 25.17 23.5 26 23.5C26.83 23.5 27.5 24.17 27.5 25C27.5 25.83 26.83 26.5 26 26.5Z" fill="#333333"></path>
                            <path d="M46.995 25.075C46.765 25.075 46.58 25.005 46.44 24.865C46.3 24.715 46.23 24.525 46.23 24.295V15.175C46.23 14.945 46.295 14.765 46.425 14.635C46.565 14.495 46.755 14.425 46.995 14.425H52.365C52.845 14.425 53.085 14.635 53.085 15.055C53.085 15.475 52.845 15.685 52.365 15.685H47.76V19H52.065C52.545 19 52.785 19.21 52.785 19.63C52.785 20.05 52.545 20.26 52.065 20.26H47.76V24.295C47.76 24.535 47.69 24.725 47.55 24.865C47.42 25.005 47.235 25.075 46.995 25.075ZM58.1517 17.53C58.6317 17.5 58.8717 17.705 58.8717 18.145C58.8717 18.365 58.8167 18.53 58.7067 18.64C58.5967 18.75 58.4067 18.815 58.1367 18.835L57.6867 18.88C57.0567 18.94 56.5867 19.16 56.2767 19.54C55.9767 19.92 55.8267 20.38 55.8267 20.92V24.355C55.8267 24.595 55.7567 24.775 55.6167 24.895C55.4767 25.015 55.2967 25.075 55.0767 25.075C54.8567 25.075 54.6717 25.015 54.5217 24.895C54.3817 24.775 54.3117 24.595 54.3117 24.355V18.25C54.3117 18.02 54.3817 17.845 54.5217 17.725C54.6717 17.595 54.8567 17.53 55.0767 17.53C55.2767 17.53 55.4417 17.595 55.5717 17.725C55.7117 17.845 55.7817 18.015 55.7817 18.235V18.955C55.9817 18.515 56.2717 18.18 56.6517 17.95C57.0317 17.72 57.4617 17.585 57.9417 17.545L58.1517 17.53ZM62.8359 17.5C63.8059 17.5 64.5259 17.745 64.9959 18.235C65.4759 18.725 65.7159 19.47 65.7159 20.47V24.355C65.7159 24.585 65.6509 24.765 65.5209 24.895C65.3909 25.015 65.2109 25.075 64.9809 25.075C64.7609 25.075 64.5859 25.01 64.4559 24.88C64.3259 24.75 64.2609 24.575 64.2609 24.355V23.8C64.0709 24.22 63.7859 24.545 63.4059 24.775C63.0359 24.995 62.6009 25.105 62.1009 25.105C61.6209 25.105 61.1809 25.01 60.7809 24.82C60.3909 24.62 60.0809 24.35 59.8509 24.01C59.6209 23.67 59.5059 23.285 59.5059 22.855C59.4959 22.315 59.6309 21.895 59.9109 21.595C60.1909 21.285 60.6459 21.065 61.2759 20.935C61.9059 20.795 62.7809 20.725 63.9009 20.725H64.2459V20.29C64.2459 19.73 64.1309 19.325 63.9009 19.075C63.6709 18.825 63.3009 18.7 62.7909 18.7C62.4409 18.7 62.1109 18.745 61.8009 18.835C61.4909 18.925 61.1509 19.055 60.7809 19.225C60.5109 19.375 60.3209 19.45 60.2109 19.45C60.0609 19.45 59.9359 19.395 59.8359 19.285C59.7459 19.175 59.7009 19.035 59.7009 18.865C59.7009 18.715 59.7409 18.585 59.8209 18.475C59.9109 18.355 60.0509 18.24 60.2409 18.13C60.5909 17.94 61.0009 17.79 61.4709 17.68C61.9409 17.56 62.3959 17.5 62.8359 17.5ZM62.3709 23.98C62.9209 23.98 63.3709 23.795 63.7209 23.425C64.0709 23.045 64.2459 22.56 64.2459 21.97V21.58H63.9759C63.1959 21.58 62.5959 21.615 62.1759 21.685C61.7559 21.755 61.4559 21.875 61.2759 22.045C61.0959 22.205 61.0059 22.44 61.0059 22.75C61.0059 23.11 61.1359 23.405 61.3959 23.635C61.6559 23.865 61.9809 23.98 62.3709 23.98ZM73.9383 23.815C74.1183 23.965 74.2083 24.15 74.2083 24.37C74.2083 24.56 74.1433 24.725 74.0133 24.865C73.8833 25.005 73.7283 25.075 73.5483 25.075C73.3583 25.075 73.1883 25.005 73.0383 24.865L69.3033 21.565V24.34C69.3033 24.58 69.2333 24.765 69.0933 24.895C68.9533 25.015 68.7733 25.075 68.5533 25.075C68.3333 25.075 68.1483 25.015 67.9983 24.895C67.8583 24.765 67.7883 24.58 67.7883 24.34V15.085C67.7883 14.845 67.8583 14.665 67.9983 14.545C68.1483 14.415 68.3333 14.35 68.5533 14.35C68.7733 14.35 68.9533 14.415 69.0933 14.545C69.2333 14.665 69.3033 14.845 69.3033 15.085V20.965L72.7233 17.77C72.8933 17.62 73.0583 17.545 73.2183 17.545C73.4083 17.545 73.5733 17.615 73.7133 17.755C73.8533 17.895 73.9233 18.06 73.9233 18.25C73.9233 18.44 73.8383 18.615 73.6683 18.775L70.9983 21.22L73.9383 23.815ZM79.0784 23.92C79.2984 23.94 79.4534 24 79.5434 24.1C79.6434 24.19 79.6934 24.32 79.6934 24.49C79.6934 24.69 79.6134 24.845 79.4534 24.955C79.3034 25.055 79.0784 25.095 78.7784 25.075L78.3734 25.045C77.5634 24.985 76.9584 24.74 76.5584 24.31C76.1584 23.87 75.9584 23.225 75.9584 22.375V18.85H75.0584C74.6184 18.85 74.3984 18.655 74.3984 18.265C74.3984 18.085 74.4534 17.945 74.5634 17.845C74.6834 17.735 74.8484 17.68 75.0584 17.68H75.9584V16.135C75.9584 15.905 76.0234 15.725 76.1534 15.595C76.2934 15.465 76.4784 15.4 76.7084 15.4C76.9384 15.4 77.1234 15.465 77.2634 15.595C77.4034 15.725 77.4734 15.905 77.4734 16.135V17.68H78.9584C79.1684 17.68 79.3284 17.735 79.4384 17.845C79.5584 17.945 79.6184 18.085 79.6184 18.265C79.6184 18.455 79.5584 18.6 79.4384 18.7C79.3284 18.8 79.1684 18.85 78.9584 18.85H77.4734V22.48C77.4734 22.95 77.5684 23.295 77.7584 23.515C77.9584 23.735 78.2584 23.86 78.6584 23.89L79.0784 23.92ZM93.1365 17.5C94.7765 17.5 95.5965 18.485 95.5965 20.455V24.355C95.5965 24.585 95.5265 24.765 95.3865 24.895C95.2465 25.015 95.0615 25.075 94.8315 25.075C94.6115 25.075 94.4315 25.015 94.2915 24.895C94.1515 24.765 94.0815 24.585 94.0815 24.355V20.47C94.0815 19.86 93.9715 19.42 93.7515 19.15C93.5315 18.87 93.1865 18.73 92.7165 18.73C92.1665 18.73 91.7315 18.92 91.4115 19.3C91.0915 19.67 90.9315 20.18 90.9315 20.83V24.355C90.9315 24.585 90.8615 24.765 90.7215 24.895C90.5815 25.015 90.3965 25.075 90.1665 25.075C89.9465 25.075 89.7665 25.015 89.6265 24.895C89.4865 24.765 89.4165 24.585 89.4165 24.355V20.47C89.4165 19.86 89.3065 19.42 89.0865 19.15C88.8665 18.87 88.5215 18.73 88.0515 18.73C87.5015 18.73 87.0615 18.92 86.7315 19.3C86.4115 19.67 86.2515 20.18 86.2515 20.83V24.355C86.2515 24.585 86.1815 24.765 86.0415 24.895C85.9015 25.015 85.7215 25.075 85.5015 25.075C85.2815 25.075 85.0965 25.015 84.9465 24.895C84.8065 24.765 84.7365 24.585 84.7365 24.355V18.25C84.7365 18.03 84.8115 17.855 84.9615 17.725C85.1115 17.595 85.2915 17.53 85.5015 17.53C85.7115 17.53 85.8815 17.595 86.0115 17.725C86.1515 17.845 86.2215 18.015 86.2215 18.235V18.79C86.4415 18.37 86.7465 18.05 87.1365 17.83C87.5265 17.61 87.9765 17.5 88.4865 17.5C89.0465 17.5 89.5065 17.615 89.8665 17.845C90.2365 18.075 90.5115 18.43 90.6915 18.91C90.9115 18.48 91.2365 18.14 91.6665 17.89C92.0965 17.63 92.5865 17.5 93.1365 17.5ZM103.401 23.155C103.541 23.155 103.656 23.21 103.746 23.32C103.836 23.43 103.881 23.57 103.881 23.74C103.881 24.03 103.701 24.275 103.341 24.475C102.991 24.675 102.606 24.83 102.186 24.94C101.776 25.05 101.381 25.105 101.001 25.105C99.8411 25.105 98.9261 24.77 98.2561 24.1C97.5861 23.42 97.2511 22.495 97.2511 21.325C97.2511 20.575 97.3961 19.91 97.6861 19.33C97.9861 18.75 98.4011 18.3 98.9311 17.98C99.4711 17.66 100.081 17.5 100.761 17.5C101.741 17.5 102.516 17.815 103.086 18.445C103.656 19.075 103.941 19.925 103.941 20.995C103.941 21.395 103.761 21.595 103.401 21.595H98.7661C98.8661 23.145 99.6111 23.92 101.001 23.92C101.371 23.92 101.691 23.87 101.961 23.77C102.231 23.67 102.516 23.54 102.816 23.38C102.846 23.36 102.926 23.32 103.056 23.26C103.196 23.19 103.311 23.155 103.401 23.155ZM100.791 18.61C100.211 18.61 99.7461 18.795 99.3961 19.165C99.0461 19.535 98.8361 20.055 98.7661 20.725H102.636C102.606 20.045 102.431 19.525 102.111 19.165C101.801 18.795 101.361 18.61 100.791 18.61ZM111.596 14.35C111.826 14.35 112.011 14.415 112.151 14.545C112.291 14.675 112.361 14.85 112.361 15.07V24.34C112.361 24.57 112.291 24.75 112.151 24.88C112.021 25.01 111.841 25.075 111.611 25.075C111.381 25.075 111.196 25.01 111.056 24.88C110.926 24.75 110.861 24.57 110.861 24.34V23.74C110.641 24.18 110.321 24.52 109.901 24.76C109.481 24.99 108.996 25.105 108.446 25.105C107.816 25.105 107.251 24.945 106.751 24.625C106.261 24.305 105.876 23.855 105.596 23.275C105.326 22.695 105.191 22.03 105.191 21.28C105.191 20.52 105.326 19.855 105.596 19.285C105.876 18.715 106.261 18.275 106.751 17.965C107.241 17.655 107.806 17.5 108.446 17.5C108.996 17.5 109.476 17.62 109.886 17.86C110.306 18.09 110.626 18.42 110.846 18.85V15.04C110.846 14.83 110.911 14.665 111.041 14.545C111.181 14.415 111.366 14.35 111.596 14.35ZM108.806 23.905C109.456 23.905 109.961 23.68 110.321 23.23C110.681 22.78 110.861 22.14 110.861 21.31C110.861 20.48 110.681 19.84 110.321 19.39C109.971 18.94 109.466 18.715 108.806 18.715C108.146 18.715 107.631 18.94 107.261 19.39C106.901 19.83 106.721 20.46 106.721 21.28C106.721 22.1 106.906 22.745 107.276 23.215C107.646 23.675 108.156 23.905 108.806 23.905ZM119.193 25.075C118.973 25.075 118.788 25.015 118.638 24.895C118.498 24.775 118.428 24.595 118.428 24.355V15.085C118.428 14.845 118.498 14.665 118.638 14.545C118.788 14.415 118.973 14.35 119.193 14.35C119.413 14.35 119.593 14.415 119.733 14.545C119.873 14.665 119.943 14.845 119.943 15.085V24.355C119.943 24.595 119.873 24.775 119.733 24.895C119.593 25.015 119.413 25.075 119.193 25.075ZM125.136 17.5C126.106 17.5 126.826 17.745 127.296 18.235C127.776 18.725 128.016 19.47 128.016 20.47V24.355C128.016 24.585 127.951 24.765 127.821 24.895C127.691 25.015 127.511 25.075 127.281 25.075C127.061 25.075 126.886 25.01 126.756 24.88C126.626 24.75 126.561 24.575 126.561 24.355V23.8C126.371 24.22 126.086 24.545 125.706 24.775C125.336 24.995 124.901 25.105 124.401 25.105C123.921 25.105 123.481 25.01 123.081 24.82C122.691 24.62 122.381 24.35 122.151 24.01C121.921 23.67 121.806 23.285 121.806 22.855C121.796 22.315 121.931 21.895 122.211 21.595C122.491 21.285 122.946 21.065 123.576 20.935C124.206 20.795 125.081 20.725 126.201 20.725H126.546V20.29C126.546 19.73 126.431 19.325 126.201 19.075C125.971 18.825 125.601 18.7 125.091 18.7C124.741 18.7 124.411 18.745 124.101 18.835C123.791 18.925 123.451 19.055 123.081 19.225C122.811 19.375 122.621 19.45 122.511 19.45C122.361 19.45 122.236 19.395 122.136 19.285C122.046 19.175 122.001 19.035 122.001 18.865C122.001 18.715 122.041 18.585 122.121 18.475C122.211 18.355 122.351 18.24 122.541 18.13C122.891 17.94 123.301 17.79 123.771 17.68C124.241 17.56 124.696 17.5 125.136 17.5ZM124.671 23.98C125.221 23.98 125.671 23.795 126.021 23.425C126.371 23.045 126.546 22.56 126.546 21.97V21.58H126.276C125.496 21.58 124.896 21.615 124.476 21.685C124.056 21.755 123.756 21.875 123.576 22.045C123.396 22.205 123.306 22.44 123.306 22.75C123.306 23.11 123.436 23.405 123.696 23.635C123.956 23.865 124.281 23.98 124.671 23.98ZM132.638 25.105C131.618 25.105 130.783 24.895 130.133 24.475C129.953 24.365 129.823 24.25 129.743 24.13C129.673 24.01 129.638 23.875 129.638 23.725C129.638 23.565 129.683 23.43 129.773 23.32C129.863 23.21 129.978 23.155 130.118 23.155C130.248 23.155 130.453 23.235 130.733 23.395C131.033 23.555 131.323 23.685 131.603 23.785C131.893 23.885 132.253 23.935 132.683 23.935C133.163 23.935 133.538 23.85 133.808 23.68C134.078 23.51 134.213 23.27 134.213 22.96C134.213 22.76 134.158 22.6 134.048 22.48C133.948 22.36 133.768 22.255 133.508 22.165C133.248 22.065 132.863 21.96 132.353 21.85C131.473 21.66 130.838 21.405 130.448 21.085C130.068 20.755 129.878 20.31 129.878 19.75C129.878 19.32 130.003 18.935 130.253 18.595C130.503 18.245 130.848 17.975 131.288 17.785C131.728 17.595 132.228 17.5 132.788 17.5C133.188 17.5 133.578 17.555 133.958 17.665C134.338 17.765 134.673 17.915 134.963 18.115C135.293 18.335 135.458 18.59 135.458 18.88C135.458 19.04 135.408 19.175 135.308 19.285C135.218 19.395 135.108 19.45 134.978 19.45C134.888 19.45 134.798 19.43 134.708 19.39C134.618 19.35 134.498 19.285 134.348 19.195C134.078 19.035 133.823 18.91 133.583 18.82C133.353 18.73 133.063 18.685 132.713 18.685C132.293 18.685 131.953 18.775 131.693 18.955C131.443 19.135 131.318 19.38 131.318 19.69C131.318 19.97 131.433 20.19 131.663 20.35C131.903 20.5 132.348 20.645 132.998 20.785C133.668 20.925 134.193 21.085 134.573 21.265C134.953 21.445 135.223 21.67 135.383 21.94C135.553 22.2 135.638 22.535 135.638 22.945C135.638 23.595 135.363 24.12 134.813 24.52C134.273 24.91 133.548 25.105 132.638 25.105ZM140.836 23.92C141.056 23.94 141.211 24 141.301 24.1C141.401 24.19 141.451 24.32 141.451 24.49C141.451 24.69 141.371 24.845 141.211 24.955C141.061 25.055 140.836 25.095 140.536 25.075L140.131 25.045C139.321 24.985 138.716 24.74 138.316 24.31C137.916 23.87 137.716 23.225 137.716 22.375V18.85H136.816C136.376 18.85 136.156 18.655 136.156 18.265C136.156 18.085 136.211 17.945 136.321 17.845C136.441 17.735 136.606 17.68 136.816 17.68H137.716V16.135C137.716 15.905 137.781 15.725 137.911 15.595C138.051 15.465 138.236 15.4 138.466 15.4C138.696 15.4 138.881 15.465 139.021 15.595C139.161 15.725 139.231 15.905 139.231 16.135V17.68H140.716C140.926 17.68 141.086 17.735 141.196 17.845C141.316 17.945 141.376 18.085 141.376 18.265C141.376 18.455 141.316 18.6 141.196 18.7C141.086 18.8 140.926 18.85 140.716 18.85H139.231V22.48C139.231 22.95 139.326 23.295 139.516 23.515C139.716 23.735 140.016 23.86 140.416 23.89L140.836 23.92ZM146.469 17.5C147.109 17.5 147.674 17.655 148.164 17.965C148.654 18.275 149.034 18.715 149.304 19.285C149.584 19.855 149.724 20.52 149.724 21.28C149.724 22.03 149.584 22.695 149.304 23.275C149.034 23.855 148.649 24.305 148.149 24.625C147.659 24.945 147.099 25.105 146.469 25.105C145.919 25.105 145.434 24.99 145.014 24.76C144.594 24.52 144.274 24.18 144.054 23.74V24.34C144.054 24.56 143.984 24.74 143.844 24.88C143.714 25.01 143.534 25.075 143.304 25.075C143.074 25.075 142.889 25.01 142.749 24.88C142.609 24.74 142.539 24.56 142.539 24.34V15.07C142.539 14.85 142.609 14.675 142.749 14.545C142.899 14.415 143.089 14.35 143.319 14.35C143.539 14.35 143.714 14.415 143.844 14.545C143.984 14.665 144.054 14.83 144.054 15.04V18.88C144.274 18.44 144.594 18.1 145.014 17.86C145.434 17.62 145.919 17.5 146.469 17.5ZM146.109 23.905C146.759 23.905 147.264 23.675 147.624 23.215C147.994 22.755 148.179 22.11 148.179 21.28C148.179 20.46 147.999 19.83 147.639 19.39C147.279 18.94 146.769 18.715 146.109 18.715C145.449 18.715 144.939 18.94 144.579 19.39C144.229 19.84 144.054 20.48 144.054 21.31C144.054 22.14 144.229 22.78 144.579 23.23C144.939 23.68 145.449 23.905 146.109 23.905ZM152.167 25.075C151.947 25.075 151.762 25.015 151.612 24.895C151.472 24.775 151.402 24.595 151.402 24.355V18.265C151.402 18.025 151.472 17.845 151.612 17.725C151.762 17.595 151.947 17.53 152.167 17.53C152.387 17.53 152.567 17.595 152.707 17.725C152.847 17.845 152.917 18.025 152.917 18.265V24.355C152.917 24.595 152.847 24.775 152.707 24.895C152.567 25.015 152.387 25.075 152.167 25.075ZM152.167 16.06C151.877 16.06 151.647 15.98 151.477 15.82C151.307 15.66 151.222 15.45 151.222 15.19C151.222 14.93 151.307 14.725 151.477 14.575C151.647 14.415 151.877 14.335 152.167 14.335C152.447 14.335 152.672 14.415 152.842 14.575C153.022 14.725 153.112 14.93 153.112 15.19C153.112 15.45 153.027 15.66 152.857 15.82C152.687 15.98 152.457 16.06 152.167 16.06ZM155.799 25.075C155.579 25.075 155.394 25.015 155.244 24.895C155.104 24.775 155.034 24.595 155.034 24.355V15.085C155.034 14.845 155.104 14.665 155.244 14.545C155.394 14.415 155.579 14.35 155.799 14.35C156.019 14.35 156.199 14.415 156.339 14.545C156.479 14.665 156.549 14.845 156.549 15.085V24.355C156.549 24.595 156.479 24.775 156.339 24.895C156.199 25.015 156.019 25.075 155.799 25.075Z" fill="#333333"></path>
                        </svg>
                    </div>
                    */ ?>

                    <div style="padding-bottom:10px;"></div>

                    <div id="product_carousel" class="carousel slide" data-ride="carousel">

                        <ul class="carousel-indicators">
                            <?
                            $index = 0;
                            $rsImages = $web->GetProductImages($arrArticle['ArticleID']);
                            while ($arrImg = databas::getFetch($rsImages)) {
                            ?>
                            <li data-target="#product_carousel" data-slide-to="<?=$index;?>" <?if ($index==0) { echo 'class="active"'; } ?>></li>
                            <? 
                                $index++;
                            } 
                            ?>
                        </ul>

                        <div class="carousel-inner">

                            <?
                            $rsImages = $web->GetProductImages($arrArticle['ArticleID']);
                            $index = 0;
                            while ($arrImg = databas::getFetch($rsImages)) {
                            ?>

                            <div class="carousel-item <?if ($index==0) { echo 'active'; } ?>">
                                <img src="https://hyrbro.se/v1/admin/img/<?=$arrImg['FilenameImg1'];?>" />
                            </div>

                            <?
                                $index++;
                            }
                            ?>
                           
                        </div>

                        <a class="carousel-control-prev" href="#product_carousel" data-slide="prev">
                            <svg width="40" height="40" viewbox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle r="19" transform="matrix(-1 0 0 1 20 20)" fill="white" stroke="#333333" stroke-width="2"></circle>
                                <path d="M14.7825 18.7825C14.1967 19.3683 14.1967 20.318 14.7825 20.9038L20.4393 26.5607C21.0251 27.1464 21.9749 27.1464 22.5606 26.5607C23.1464 25.9749 23.1464 25.0251 22.5606 24.4393L16.9038 18.7825C16.318 18.1967 15.3683 18.1967 14.7825 18.7825Z" fill="#333333"></path>
                                <path d="M14.7825 20.9038C15.3683 21.4896 16.318 21.4896 16.9038 20.9038L22.5607 15.247C23.1464 14.6612 23.1464 13.7114 22.5607 13.1257C21.9749 12.5399 21.0251 12.5399 20.4393 13.1257L14.7825 18.7825C14.1967 19.3683 14.1967 20.318 14.7825 20.9038Z" fill="#333333"></path>
                            </svg>
                        </a>
                        <a class="carousel-control-next" href="#product_carousel" data-slide="next">
                            <svg width="40" height="40" viewbox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="20" cy="20" r="19" fill="white" stroke="#333333" stroke-width="2"></circle>
                                <path d="M25.2175 18.7825C25.8033 19.3683 25.8033 20.318 25.2175 20.9038L19.5607 26.5607C18.9749 27.1464 18.0251 27.1464 17.4394 26.5607C16.8536 25.9749 16.8536 25.0251 17.4394 24.4393L23.0962 18.7825C23.682 18.1967 24.6317 18.1967 25.2175 18.7825Z" fill="#333333"></path>
                                <path d="M25.2175 20.9038C24.6317 21.4896 23.682 21.4896 23.0962 20.9038L17.4393 15.247C16.8536 14.6612 16.8536 13.7114 17.4393 13.1257C18.0251 12.5399 18.9749 12.5399 19.5607 13.1257L25.2175 18.7825C25.8033 19.3683 25.8033 20.318 25.2175 20.9038Z" fill="#333333"></path>
                            </svg>
                        </a>

                    </div>

                    <div class="product_desc" id="product_desc">
                        
                        <?
                         $rsProperty = $web->GetProductPropertys($arrArticle['ArticleID']);

                        if ((strlen($arrArticle['Description'])>0) || (databas::getNumberOfRows($rsProperty)>0) || (strlen($arrArticle['DescriptionTechnical'])>0) ) { ?>
                        
                        <? /*
                        <div class="pDesc_title">
                            Beskrivning
                        </div>
                        */ ?>

                        <div class="accordion" id="faq">
                            
                            <? if (strlen($arrArticle['Description'])>0) { ?>
                            <div class="card">
                                <div class="card-header" id="faqhead1">
                                    <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1"
                                        aria-expanded="true" aria-controls="faq1">
                                        Produktbeskrivning
                                    </a>
                                </div>

                                <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                                    <div class="card-body">
                                        <?=nl2br($arrArticle['Description']);?>
                                    </div>
                                </div>
                            </div>
                            <? } ?>

                            <?
                           
                            if (databas::getNumberOfRows($rsProperty)>0) {
                            ?>
                            <div class="card">
                                <div class="card-header" id="faqhead2">
                                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2"
                                        aria-expanded="true" aria-controls="faq2">
                                        Produktdetaljer
                                    </a>
                                </div>

                                <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                                    <div class="card-body">
                                        <table class="table table-striped">

                                            <tbody>
                                              
                                                <? while ($arrProp = databas::getFetch($rsProperty)) { ?>
                                                <tr>
                                                    <td class=""><?=$arrProp['Property']; ?></td>
                                                    <td class="text-right"><?=$arrProp['Value']; ?> <?=$arrProp['Unit']; ?></td>
                                                </tr>
                                                <? } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <? } ?>

                                                        
                            <? if (strlen($arrArticle['DescriptionTechnical'])>0) { ?>
                            <div class="card">
                                <div class="card-header" id="faqhead3">
                                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3"
                                        aria-expanded="true" aria-controls="faq3">
                                        Teknisk information
                                    </a>
                                </div>

                                <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                                    <div class="card-body">
                                        <?=nl2br($arrArticle['DescriptionTechnical']);?>
                                    </div>
                                </div>
                            </div>
                            <? } ?>

                            <?
                            /*
                            <div class="card">
                                <div class="card-header" id="faqhead4">
                                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq4"
                                        aria-expanded="true" aria-controls="faq4">
                                        Produktblad
                                    </a>
                                </div>

                                <div id="faq4" class="collapse" aria-labelledby="faqhead4" data-parent="#faq">
                                    <div class="card-body">
                                        blablabla
                                    </div>
                                </div>
                            </div>
                            */
                            ?>
                        </div>
                        <div class="mobile_navOnly">
                            <div class="rend_header ">
                                <div class="rend_title">
                                    Hyresförfrågan
                                </div>

                            </div>

                            <div style="clear:both; padding-top:20px;"></div>

                            <div style="background-color:aqua; height:300px;">
                                calender

                            </div>

                            <div class="rend_table ">
                                <div class="rend_first">
                                    <div class="rend_tcol">
                                        <div class="rend_tHead">
                                            Hämtas
                                        </div>
                                        <div class="rend_time">
                                            2020-03-10 (idag)
                                        </div>
                                    </div>
                                    <div class="rend_tcol">
                                        <div class="rend_tHead">
                                            Lämnas
                                        </div>
                                        <div class="rend_time">
                                            2020-03-12
                                        </div>
                                    </div>
                                </div>

                                <div class="rend_tcol rend_second">
                                    <div class="rend_sHead">
                                        Pris per dag
                                    </div>
                                    <div class="rend_sText">
                                        995 kr
                                    </div>
                                </div>

                                <div class="rend_tcol rend_second">
                                    <div class="rend_sHead">
                                        Totalt (2 dagar)
                                    </div>
                                    <div class="rend_sText active">
                                        1990 kr
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="rend_btn">
                                    Lägg i Lista
                                </button>
                            </div>
                        </div>

                        <? } ?>

                        <div class="desktop_navOnly">
                            
                            <? /*
                            <div class="check_sec">
                                <div class="checkSec_title">
                                    Koll på säkerheten?
                                </div>
                                <div class="checkSec_text">
                                    För att använda produkten krävs följande skyddsutrustning
                                </div>
                                <div class="checkSec_items">
                                    
                                    <div class="checkSec_item">
                                        <div class="checkSec_img">
                                            <img src="<?=SOKVAG_WWW;?>/img/kategori/default.png" alt="" />
                                        </div>
                                        <div class="checkSec_text">
                                            Skyddsglasögon
                                        </div>
                                        <button class="checkSec_btn">
                                            Köp tillbehör
                                        </button>
                                    </div>

                                   

                                  
                                </div>
                            </div>
                            */
                            ?>

                            <div class="otherBooked">
                                <div class="otherBooked_header">
                                    <div class="otherBooked_title">
                                        <?#=$arrCat['Category']; ?>Liknande produkter
                                    </div>
                                    <div class="">
                                        <button class="otherBooked_filter">
                                            Fler produkter
                                        </button>
                                    </div>
                                </div>
                                <div class="row">

                                    <?
                                    $rsArticle = $web->GetArticleByCategory($arrArticle['CategoryID'],8);
                                    while ($arrTmp = databas::getFetch($rsArticle)) {
                                    ?>
                                    
                                    <div class="col-lg-3">
                                        <a href="<?=SOKVAG_WWW; ?>/_produkt.php?pid=<?=$arrTmp['SEOName'];?>/">
                                            <div class="otherBooked_item">
                                                <div class="otherBooked_img">
                                                    <img src="<?=SOKVAG_WWW;?>/img/kategori/default.png" alt="" />
                                                </div>
                                                <div class="otherBooked_text">
                                                    <?=$arrTmp['Name'];;?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <? } ?>
                                </div>
                            </div>
                        </div>

                        <div class="mobile_navOnly">
                            <div class="check_sec">
                                <div class="checkSec_title">
                                    Koll på säkerheten?
                                </div>
                                <div class="checkSec_text">
                                    För att använda produkten krävs följande skyddsutrustning
                                </div>
                                <div id="checkSec_carousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="checkSec_item">
                                                        <div class="checkSec_img">
                                                            <img src="<?=SOKVAG_WWW;?>/img/kategori/default.png" alt="" />
                                                        </div>
                                                        <div class="checkSec_text">
                                                            Skyddsglasögon
                                                        </div>
                                                        <button class="checkSec_btn">
                                                            Köp tillbehör
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="checkSec_item">
                                                        <div class="checkSec_img">
                                                            <img src="<?=SOKVAG_WWW;?>/img/kategori/default.png" alt="" />
                                                        </div>
                                                        <div class="checkSec_text">
                                                            Hörselskydd PELTOR Optima
                                                        </div>
                                                        <button class="checkSec_btn">
                                                            Köp tillbehör
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="checkSec_item">
                                                        <div class="checkSec_img">
                                                            <img src="<?=SOKVAG_WWW;?>/img/kategori/default.png" alt="" />
                                                        </div>
                                                        <div class="checkSec_text">
                                                            Skyddsglasögon2
                                                        </div>
                                                        <button class="checkSec_btn">
                                                            Köp tillbehör
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="checkSec_item">
                                                        <div class="checkSec_img">
                                                            <img src="<?=SOKVAG_WWW;?>/img/kategori/default.png" alt="" />
                                                        </div>
                                                        <div class="checkSec_text">
                                                            Hörselskydd PELTOR Optima
                                                        </div>
                                                        <button class="checkSec_btn">
                                                            Köp tillbehör
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <a class="carousel-control-next" href="#checkSec_carousel" data-slide="next">
                                            <svg width="40" height="40" viewbox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="20" cy="20" r="19" fill="white" stroke="#333333" stroke-width="2"></circle>
                                                <path d="M25.2175 18.7825C25.8033 19.3683 25.8033 20.318 25.2175 20.9038L19.5607 26.5607C18.9749 27.1464 18.0251 27.1464 17.4394 26.5607C16.8536 25.9749 16.8536 25.0251 17.4394 24.4393L23.0962 18.7825C23.682 18.1967 24.6317 18.1967 25.2175 18.7825Z" fill="#333333"></path>
                                                <path d="M25.2175 20.9038C24.6317 21.4896 23.682 21.4896 23.0962 20.9038L17.4393 15.247C16.8536 14.6612 16.8536 13.7114 17.4393 13.1257C18.0251 12.5399 18.9749 12.5399 19.5607 13.1257L25.2175 18.7825C25.8033 19.3683 25.8033 20.318 25.2175 20.9038Z" fill="#333333"></path>
                                            </svg>
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <div class="otherBooked">
                                <div class="otherBooked_header">
                                    <div class="otherBooked_title">
                                        Andra har bokat
                                    </div>
                                    <div class="">
                                        <button class="otherBooked_filter">
                                            Fler produkter
                                        </button>

                                    </div>
                                </div>
                                <div id="otherBooked_carousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="otherBooked_item">
                                                        <div class="otherBooked_img">
                                                            <img src="<?=SOKVAG_WWW;?>/img/kategori/default.png" alt="" />
                                                        </div>
                                                        <div class="otherBooked_text">
                                                            Motorkap DEWALT DCS690N 230MM (batteridriven)
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="otherBooked_item">
                                                        <div class="otherBooked_img">
                                                            <img src="<?=SOKVAG_WWW;?>/img/kategori/default.png" alt="" />
                                                        </div>
                                                        <div class="otherBooked_text">
                                                            Spridare Multi Hörby Bruk
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="otherBooked_item">
                                                        <div class="otherBooked_img">
                                                            <img src="<?=SOKVAG_WWW;?>/img/kategori/default.png" alt="" />
                                                        </div>
                                                        <div class="otherBooked_text">
                                                            Motorkap DEWALT DCS690N 230MM (batteridriven)
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="otherBooked_item">
                                                        <div class="otherBooked_img">
                                                            <img src="<?=SOKVAG_WWW;?>/img/kategori/default.png" alt="" />
                                                        </div>
                                                        <div class="otherBooked_text">
                                                            Motorkap DEWALT DCS690N 230MM (batteridriven)
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <a class="carousel-control-next" href="#otherBooked_carousel" data-slide="next">
                                            <svg width="40" height="40" viewbox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="20" cy="20" r="19" fill="white" stroke="#333333" stroke-width="2"></circle>
                                                <path d="M25.2175 18.7825C25.8033 19.3683 25.8033 20.318 25.2175 20.9038L19.5607 26.5607C18.9749 27.1464 18.0251 27.1464 17.4394 26.5607C16.8536 25.9749 16.8536 25.0251 17.4394 24.4393L23.0962 18.7825C23.682 18.1967 24.6317 18.1967 25.2175 18.7825Z" fill="#333333"></path>
                                                <path d="M25.2175 20.9038C24.6317 21.4896 23.682 21.4896 23.0962 20.9038L17.4393 15.247C16.8536 14.6612 16.8536 13.7114 17.4393 13.1257C18.0251 12.5399 18.9749 12.5399 19.5607 13.1257L25.2175 18.7825C25.8033 19.3683 25.8033 20.318 25.2175 20.9038Z" fill="#333333"></path>
                                            </svg>
                                        </a>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5 desktop_navOnly">
                    
                    <? if ($arrArticle['Sales'] == 1) { ?>

                    <div class="rend_title ">
                        Pris
                    </div>

                    <div class="rend_tcol rend_second">
                        <div class="rend_sHead">
                            Pris per styck
                        </div>
                        <div class="rend_sText">
                            <?=number_format($arrArticle['PriceSale'],0,","," "); ?> kr
                        </div>
                    </div>
                    <div class="rend_tcol rend_second">
                        <div class="rend_sHead">
                           Lagerstatus
                        </div>
                        <div class="rend_sText">
                            Finns i lager | Få i lager | Slut
                        </div>
                    </div>
                    <div class="rend_tcol rend_second">
                        <div class="rend_sHead">
                            Antal (st)
                        </div>
                        <div class="rend_sText">
                            <input type="text" style="text-align:right" value="1" size="3" />
                        </div>
                    </div>

                    <div>
                        <button class="rend_btn" id="addsale">
                            Lägg i kundvagn
                        </button>
                    </div>

                    <? } ?>
                    
                    <? if ($arrArticle['Rental'] == 1) { ?>
                    
                    <div class="rend_title ">
                        Priser för alla perioder
                    </div>
                    <? if ($arrArticle['PriceDay1']>0) { ?>
                    <div class="rend_tcol rend_second">
                        <div class="rend_sHead">
                            1 dag
                        </div>
                        <div class="rend_sText">
                            <?=number_format($arrArticle['PriceDay1'],0,","," "); ?> kr
                        </div>
                    </div>
                    <? } ?>

                    <? if ($arrArticle['PriceWeekend']>0) { ?>
                    <div class="rend_tcol rend_second">
                        <div class="rend_sHead">
                            Helg (Fredag 17.00 - måndag 08.00)
                        </div>
                        <div class="rend_sText">
                            <?=number_format($arrArticle['PriceWeekend'],0,","," "); ?> kr
                        </div>
                    </div>
                    <? } ?>
                    <? if ($arrArticle['PriceDay3']>0) { ?>
                    <div class="rend_tcol rend_second">
                        <div class="rend_sHead">
                           3 dagar
                        </div>
                        <div class="rend_sText">
                            <?=number_format(($arrArticle['PriceDay3']*3),0,","," "); ?> kr
                        </div>
                    </div>
                    <? } ?>
                    <? if ($arrArticle['PriceDay7']>0) { ?>
                    <div class="rend_tcol rend_second">
                        <div class="rend_sHead">
                            7 dagar
                        </div>
                        <div class="rend_sText">
                            <?=number_format(($arrArticle['PriceDay7']*7),0,","," "); ?> kr
                        </div>
                    </div>
                    <? } ?>
                    <div class="rend_title" style="padding-top:20px;">
                        Hyresförfrågan
                    </div>

                    <div class="rend_calendar">                        
                        <div id="calendar" style="width:100%; height:100%;"></div>
                    </div>
                    
                    <div class="rend_table">
                        
                        <div class="rend_first">
                            <div class="rend_tcol">
                                <div class="rend_tHead">
                                    Hämtas
                                </div>
                                <div class="rend_time" id="calender_start">
                                    Välj datum
                                </div>
                            </div>
                            <div class="rend_tcol">
                                <div class="rend_tHead">
                                    Lämnas
                                </div>
                                <div class="rend_time" id="calender_end">
                                    Välj datum
                                </div>
                            </div>
                        </div>
                       
                        <div class="rend_tcol rend_second" id="bookingPerDay">
                            <div class="rend_sHead">
                                Pris per dag
                            </div>
                            <div class="rend_sText" id="bookingPerDayPrice">
                                995 kr
                            </div>
                        </div>

                        <div class="rend_tcol rend_second" id="bookingTotally">
                            <div class="rend_sHead" id="bookingTotallyNumDays"></div>
                            <div class="rend_sText active" id="bookingTotallyCost"></div>
                        </div>

                    </div>

                    <div>
                        <button class="rend_btn" id="addrental">
                            Spara förfrågan
                        </button>
                    </div>
                    <? } ?>

                </div>
            </div>


        </div>

    </section>

    <section class="footer">
        <?php require("../include/includeFooter.php");?>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?=SOKVAG_WWW;?>/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?=SOKVAG_WWW;?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=SOKVAG_WWW;?>/assets/js/navigation.js"></script>

    <script src="<?=SOKVAG_WWW;?>/assets/js/reservation-datepicker.js"></script>
    <!--<script src="<?=SOKVAG_WWW;?>/assets/js/jquery.calendar.js"></script>-->
    <script src="<?=SOKVAG_WWW;?>/assets/js/fecha.min.js"></script>

    <script src="<?=SOKVAG_WWW;?>/assets/js/main.js"></script>
    <script src="<?=SOKVAG_WWW;?>/assets/js/main1.js"></script>

    <script>

        $(document).ready(function () {

            $.ajax({
                url: 'ajax.php',
                type: 'post',
                data: { type: "getbookeddates", product: '<?=$arrArticle['SEOName'];?>' },
                dataType: 'json',
                success: function (data) {
                $('#calender_start').html('Välj datum');
                $('#calender_end').html('Välj datum');
                $('#addrental').prop("disabled",true).css('background-color', '#A9A9A9');
                    initCalendar(data);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError);
                }
            });   

            $('#bookingPerDay').hide();
            $('#bookingTotally').hide();

             
            $("#addrental").on("click", function(e) {

                $.ajax({
                    url: 'ajax.php',
                    type: 'post',
                    data: { type: "makereservation", product: '<?=$arrArticle['SEOName'];?>', start: $('#calender_start').html(), end:$('#calender_end').html() },
                    dataType: 'json',
                    success: function (rawJSON) {

                        if (rawJSON.booking == true) {

                            $('.mobile_sticky').html(rawJSON.BasketNr);
                            $('.cart_notify').html(rawJSON.BasketNr);
                                    
                                    

                           

                        } else {
                           alert(data);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError);
                    }
                }); 

            });
                    

            function checkDates(start,end) {

                $.ajax({
                    url: 'ajax.php',
                    type: 'post',
                    data: { type: "checkdates", product: '<?=$arrArticle['SEOName'];?>', start: start, end:end  },
                    dataType: 'json',
                    success: function (rawJSON) {

                        if (rawJSON.booking == true) {

                            $('#bookingPerDay').show();
                            $('#bookingPerDayPrice').html(rawJSON.pricePerday);

                            $('#bookingTotally').show();
                            $('#bookingTotallyNumDays').html(rawJSON.numberOfDays);
                            $('#bookingTotallyCost').html(rawJSON.totalCost);

                        } else {
                           alert(data);
                        }

                        

                        $('#calender_start').html(start);
                        $('#calender_end').html(end);
                        $('#addrental').prop("disabled",false).css('background-color', '#F6C143');

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError);
                    }
                }); 
            }

             function initCalendar(disabledDates) {
                var calendar = document.getElementById('calendar');
                var datepicker = new ReservationDatepicker(calendar, {
                    disabledDates: disabledDates,
                    showTopbar: false,
                    moveBothMonths: true,
                    startOfWeek: 'monday',
                    separator: '/',
                    format: 'YYYY-MM-DD',
                    i18n: {
                        //selected: 'Your stay:',
                        //night: 'Night',
                        //nights: 'Nights',
                        //button: 'Close',
                        //'checkin-disabled': 'Check-in disabled',
                        //'checkout-disabled': 'Check-out disabled',
                        'day-names-short': ['Sö', 'Må', 'Ti', 'On', 'To', 'Fr', 'Lö'],
                        'day-names': ['Söndag', 'Måndag', 'Tisdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lördag'],
                        'month-names-short': ['Januari', 'Februari', 'Mars', 'April', 'Maj', 'Juni', 'Juli', 'Augusti', 'September', 'Oktober','November', 'December'],
                        'month-names': ['Januari', 'Februari', 'Mars', 'April', 'Maj', 'Juni', 'Juli', 'Augusti', 'September', 'Oktober','November', 'December'],
                        //'error-more': 'Date range should not be more than 1 night',
                        //'error-more-plural': 'Date range should not be more than %d nights',
                        //'error-less': 'Date range should not be less than 1 night',
                        //'error-less-plural': 'Date range should not be less than %d nights',
                        //'info-more': 'Please select a date range of at least 1 night',
                        //'info-more-plural': 'Please select a date range of at least %d nights',
                        //'info-range': 'Please select a date range between %d and %d nights',
                        //'info-default': 'Please select a date range'
                    },
                    onSelectRange: function () {
                        var val = this.getValue().split('/');
                        var startDate = val[0];
                        var endDate = val[1];
                        checkDates(startDate, endDate);
                       
                    },
                    onDayClick: function () {
                        var val = this.getFirstValue();
                        if (val == '') {
                            $('#calender_start').html('Välj datum');
                            $('#calender_end').html('Välj datum');
                            $('#addrental').prop("disabled", true).css('background-color', '#A9A9A9');

                            return;
                        } else {
                            checkDates(val, val);
                        }
                      
                        //$('#calender_start').html(val);
                        //$('#calender_end').html(val);
                        //$('#addrental').prop("disabled",false).css('background-color', '#F6C143');
                    }
                });
                datepicker.open();
            }


        }); 

    </script>

</body>
</html>