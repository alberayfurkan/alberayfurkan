<?php $config = Config::getInstance();

$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

if (isset($data['institutional']) && $data['institutional']['num'] > 0) {
    foreach ($data['institutional']['row'] as $row) {
        switch ($row['lname']) {
            case 'tr':
                $trUrl = $config->get('URL') . $row['rslug'] . '?lang=tr';
                break;
            case 'en':
                $enUrl = $config->get('URL') . $row['rslug'] . '?lang=en';
                break;
            case 'de':
                $deUrl = $config->get('URL') . $row['rslug'] . '?lang=de';
                break;
        }
    }
} else {
    $trUrl = $config->get('URL') . '?lang=tr';
    $enUrl = $config->get('URL') . '?lang=en';
    $deUrl = $config->get('URL') . '?lang=de';
}

switch ($_SESSION['lang']) {
    case 'tr':
        $countryFlag = $config->get('URL') . 'assets/site/images/turkey.png';
        break;
    case 'en':
        $countryFlag = $config->get('URL') . 'assets/site/images/england.png';
        break;
    case 'de':
        $countryFlag = $config->get('URL') . 'assets/site/images/germany.png';
        break;
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
    <a href="<?php echo $config->get('URL') . '?lang=' . $_SESSION['lang'] ?>" class="navbar-brand mad-ln--independent">
        <img src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $data['logo']['image'] ?>">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img width="20" height="20" src="<?php echo $countryFlag; ?>"> <?php echo $data['LANG']['LANGUAGE'] ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo $trUrl; ?>">
                        <img class="lang-img" src="<?php echo $config->get('URL') ?>assets/site/images/turkey.png" alt=""> <?php echo $data['LANG']['TURKISH']; ?>
                    </a>
                    <a class="dropdown-item" href="<?php echo $enUrl; ?>">
                        <img class="lang-img" src="<?php echo $config->get('URL') ?>assets/site/images/england.png" alt=""> <?php echo $data['LANG']['ENGLISH']; ?>
                    </a>
                    <a class="dropdown-item" href="<?php echo $deUrl; ?>">
                        <img class="lang-img" src="<?php echo $config->get('URL') ?>assets/site/images/germany.png" alt=""> <?php echo $data['LANG']['GERMAN'] ?>
                    </a>
                </div>
            </li>

            <?php

            if (empty($_COOKIE['user_id'])) {

            ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $config->get('URL') ?>admin/login/"><?php echo $data['LANG']['LOGOUT'] ?></a>
                </li>
            <?php
            }
            ?>

            <?php

            if (!empty($_COOKIE['user_id'])) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php $this->system->router('admin', 'users', 'profile') ?>"><i class="fas fa-user mx-2"></i><?php echo $_COOKIE['fullname'] ?></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php $this->system->router('admin', 'login', 'logout') ?>"><i class="fas fa-user mx-2"></i><?php echo $data['LANG']['LOGIN'] ?></a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>