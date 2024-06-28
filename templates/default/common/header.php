<?php global $db;
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$sonkarakter = substr($actual_link, -1);
if ($sonkarakter == '/') {
    $actual_link = substr($actual_link, 0, -1);
    $current_url = $actual_link;
} else {
    $current_url = $actual_link;
    $actual_link =  $actual_link . '/';
}

if (!isset($data['rich'])) {
    $data['rich'] = '';
}

$data['rich'] .= '
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "WebSite",
    "name": "' . $data['settings']['site_name'] . '",
    "url": "' . $config->get('URL') . '",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "' . $config->get('URL') . 'arama?q={search_term}",
        "query-input": "required name=search_term"
    }
}
</script>';
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <!--================ Basic page needs ================-->
    <title><?php echo $data['title']; ?></title>
    <meta charset="UTF-8">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="<?php echo $data['description']; ?>">

    <!--================ Open Graph sosyal medya platformları için ================-->
    <meta property="og:locale" content="tr_TR" />
    <meta property="og:title" content="<?php echo $data['title'] ?>" />
    <meta property="og:description" content="<?php echo $data['description']; ?>" />
    <meta property="og:url" content="<?php echo $current_url; ?>" />
    <meta property="og:site_name" content="<?php echo $data['settings']['meta_title']; ?>" />
    <meta property="og:image" content="<?php echo $config->get('URL') ?>uploads/images/<?php echo $data['settings']['logo_square']; ?>" />
    <meta name="robots" content="index, follow" /> <!-- Arama motorları için -->
    <?php echo $data['rich']; ?> <!-- Arama motorları tarafından daha iyi anlaşılması için -->
    <link href="<?php echo $actual_link; ?>" rel="canonical" /> <!-- URL'nin asıl veya tercih edilen URL -->

    <!--================ Author && Publisher ================-->
    <meta name="author" content="<?php echo $data['settings']['author']; ?>">
    <meta name="publisher" content="<?php echo $data['settings']['publisher']; ?>" />

    <!--================ For Twitter ================-->
    <meta name="twitter:card" content="<?php echo $config->get('URL') ?>uploads/images/<?php echo $data['settings']['logo_square']; ?>" />
    <meta name="twitter:title" content="<?php echo $data['title'] ?>" />
    <meta name="twitter:description" content="<?php echo $data['description']; ?>" />
    <meta name="twitter:url" content="<?php echo $current_url; ?>" />
    <meta name="twitter:image" content="<?php echo $config->get('URL') ?>uploads/images/<?php echo $data['settings']['logo_square']; ?>" />

    <!--================ Mobile specific metas ================-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--================ Favicon ================-->
    <link rel="icon" type="image/png" href="<?php echo $config->get('URL') ?>uploads/images/<?php echo $data['settings']['favicon']; ?>">
    <!--================ Google web fonts ================-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oxygen:300,400,700">
    <link rel="stylesheet" href="https://indestructibletype.com/fonts/Jost.css">
    <!--================ Vendor CSS ================-->
    <link rel="stylesheet" href="<?php echo $config->get('URL') ?>assets/site/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo $config->get('URL') ?>assets/site/vendors/fancybox/jquery.fancybox.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!--================ Theme CSS ================-->
    <link rel="stylesheet" href="<?php echo $config->get('URL') ?>assets/site/css/style.css">
    <!--================ Vendor JS ================-->
</head>

<body>
    <?php $load->plugin('menu'); ?>