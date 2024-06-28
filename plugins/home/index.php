<?php
$data['rich'] .= '
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
    {
        "@type": "ListItem",
        "position": 1,
        "item": {
            "@id": "' . $config->get('URL') . '",
            "name": "Anasayfa"
        }
    }
  ]
}
</script>';
$load->view('common', 'header', $data); ?>

<body class="home page-template page-template-full-width page-template-full-width-php page page-id-615 qode-core-1.2 qodef-social-login-1.0.4 qodef-tours-1.1.3 qodef-tour-filter-light-skin getaway-ver-1.6 qodef-grid-1300 qodef-sticky-header-on-scroll-down-up qodef-dropdown-animate-height qodef-header-standard qodef-menu-area-shadow-disable qodef-menu-area-in-grid-shadow-disable qodef-menu-area-border-disable qodef-menu-area-in-grid-border-disable qodef-logo-area-border-disable qodef-logo-area-in-grid-border-disable qodef-side-menu-slide-from-right qodef-default-mobile-header qodef-sticky-up-mobile-header qodef-search-slides-from-window-top wpb-js-composer js-comp-ver-6.8.0 vc_responsive" itemscope itemtype="http://schema.org/WebPage">

    <!--Side Menu Start -->
    <?php $load->plugin('side'); ?>
    <!--Side Menu End -->

    <div class="qodef-wrapper">
        <div class="qodef-wrapper-inner">

            <form method="GET" class="qodef-search-slide-window-top" action="<?php echo $config->get('URL') ?>arama">
                <div class="qodef-search-form-wrapper-inner">
                    <div class="qodef-search-form-inner">
                        <span class="qodef-swt-search-icon">
                            <i class="qodef-icon-font-awesome fa fa-search"></i>
                        </span>
                        <input class="qodef-swt-search-field" value="<?php echo $data['search_text']; ?>" type="text" name="search_text" placeholder="<?php echo $data['LANG']['CALL'] ?>" />
                        <a class="qodef-swt-search-close" href="#">
                            <i class="qodef-icon-font-awesome fa fa-times"></i>
                        </a>
                    </div>
                </div>
            </form>

            <!-- Menu Start -->
            <?php $load->plugin('menu'); ?>
            <!-- Menu End -->

            <div class="qodef-content">
                <div class="qodef-content-inner">
                    <div class="qodef-full-width">
                        <div class="qodef-full-width-inner">
                            <div class="qodef-grid-row">
                                <div class="qodef-page-content-holder qodef-grid-col-12">
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner">
                                                <div class="wpb_wrapper">
                                                    <!-- START Main Home REVOLUTION SLIDER 6.5.19 -->
                                                    <div class="wpb_revslider_element wpb_content_element">
                                                        <p class="rs-p-wp-fix"></p>
                                                        <rs-module-wrap id="rev_slider_4_1_wrapper" data-source="gallery" style="visibility: hidden; background: transparent; padding: 0; margin: 0px auto; margin-top: 0; margin-bottom: 0;">
                                                            <rs-module id="rev_slider_4_1" style="" data-version="6.5.19">
                                                                <rs-slides>
                                                                    <?php
                                                                    if ($data['slides']['num'] > 0) {
                                                                        foreach ($data['slides']['row'] as $row) {
                                                                    ?>
                                                                            <rs-slide style="position: absolute" data-key="rs-<?php echo $row['id'] ?>" data-title="Slide" data-thumb="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" data-anim="ms:600;" data-in="o:0;" data-out="a:false;">
                                                                                <img src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" alt="" title="Main Home" class="rev-slidebg tp-rs-img rs-lazyload" data-lazyload="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" data-panzoom="d:10000;ss:100;se:110;" data-no-retina />
                                                                                <rs-layer id="slider-4-slide-<?php echo $row['id'] ?>-layer-1" class="change-image" data-type="image" data-rsp_ch="on" data-xy="<?php echo $row['coordinate']; ?>" data-text="l:22;a:inherit;" data-dim="w:131px,131px,131px,122px;h:44px,44px,44px,41px;" data-frame_0="tp:600;" data-frame_1="tp:600;st:200;sp:1200;sR:200;" data-frame_999="o:0;tp:600;st:w;sR:2600;" style="z-index: 5">
                                                                                    <img src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" alt="" class="tp-rs-img rs-lazyload" data-lazyload="<?php echo $config->get('URL') ?>uploads/images/yellow-line.png" data-no-retina />
                                                                                </rs-layer>
                                                                                <rs-layer id="slider-4-slide-<?php echo $row['id'] ?>-layer-2" data-type="text" data-rsp_ch="on" data-xy="xo:0,15px,0,15px;y:m;yo:-36px,-34px,-37px,-35px;" data-text="w:nowrap,nowrap,nowrap,normal;s:70,70,60,40;l:75,75,75,50;fw:800;a:inherit;" data-dim="w:auto,auto,auto,192px;h:auto,auto,auto,51px;" data-frame_0="x:100px;tp:600;" data-frame_1="tp:600;e:Quad.easeInOut;st:300;sp:600;sR:300;" data-frame_999="o:0;tp:600;st:w;sR:3100;" style=" z-index: 6; font-family: 'Montserrat'; "><?php echo $row['title']; ?></rs-layer>
                                                                                <?php
                                                                                if ($row['button_text'] != "boş" || $row['link'] != "boş") {
                                                                                ?>
                                                                                    <rs-layer id="slider-4-slide-<?php echo $row['id'] ?>-layer-9" data-type="text" data-color="#ffcc00" data-xy="xo:0,15px,0,15px;y:m;yo:95px,98px,102px,78px;" data-text="l:22;a:inherit;" data-rsp_bd="off" data-frame_0="x:50px;tp:600;" data-frame_1="tp:600;e:Quad.easeInOut;st:600;sp:600;sR:600;" data-frame_999="o:0;tp:600;st:w;sR:2800;" style="z-index: 10; font-family: ''">
                                                                                        <a itemprop="url" href="<?php echo $row['link']; ?>" target="_self" style=" color: #000000; background-color: #ffe500;" class="qodef-btn qodef-btn-large qodef-btn-solid qodef-btn-icon">
                                                                                            <span class="qodef-btn-text"><?php echo $row['button_text']; ?></span><i class="qodef-icon-font-awesome fa fa-chevron-right"></i>
                                                                                        </a>
                                                                                    </rs-layer>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </rs-slide>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </rs-slides>
                                                            </rs-module>
                                                        </rs-module-wrap>
                                                    </div>
                                                    <!-- END REVOLUTION SLIDER -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Keşfet Üst Sarı Section Start -->
                                    <div class="vc_row wpb_row vc_row-fluid change-background vc_custom_1505486580440 qodef-content-aligment-right" style="background-color: #ffe500">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner">
                                                <div class="wpb_wrapper">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="qodef-row-overlapping-text marmar">
                                            MARMARİS!
                                        </div>
                                    </div>
                                    <!--Keşfet Üst Sarı Section End -->
                                    <!--Keşfet Üst Yazı Start -->
                                    <div class="qodef-row-grid-section-wrapper">
                                        <div class="qodef-row-grid-section">
                                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1505372639059">
                                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                                    <div class="vc_column-inner">
                                                        <div class="wpb_wrapper">
                                                            <div class="qodef-elements-holder qodef-one-column qodef-responsive-mode-768">
                                                                <div class="qodef-eh-item" data-item-class="qodef-eh-custom-8254" data-1024-1280="0 42% 0 0" data-768-1024="0 15% 0 0" data-680-768="0 0" data-680="0 0">
                                                                    <div class="qodef-eh-item-inner">
                                                                        <div class="qodef-eh-item-content qodef-eh-custom-8254" style="padding: 0 50% 0 0">
                                                                            <div class="qodef-section-title-holder qodef-st-standard qodef-st-title-left qodef-st-normal-space qodef-st-disable-title-break qodef-st-with-border" style="text-align: left">
                                                                                <div class="qodef-st-inner">
                                                                                    <h2 class="qodef-st-title">
                                                                                        <span class="qodef-st-title-bold"><?php echo $data['LANG']['DISCOVER_TIT'] ?></span>
                                                                                        <?php echo $data['LANG']['DISCOVER_TIT1'] ?> <span class="qodef-st-title-bold"><?php echo $data['LANG']['DISCOVER_TIT2'] ?> </span><?php echo $data['LANG']['DISCOVER_TIT3'] ?>
                                                                                    </h2>
                                                                                    <h5 class="qodef-st-text">
                                                                                        <?php echo $data['LANG']['DISCOVER_DTL'] ?>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vc_empty_space" style="height: 70px">
                                                                                <span class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Keşfet Üst Yazı End -->
                                    <!--Keşfet Start -->
                                    <div class="vc_row wpb_row vc_row-fluid vc_custom_1504708784137">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner">
                                                <div class="wpb_wrapper">
                                                    <div class="qodef-tours-list-holder qodef-tours-row qodef-tr-tiny-space-lr-only qodef-tours-columns-6 qodef-tours-type-masonry">
                                                        <div class="qodef-tours-list-holder-inner qodef-tours-row-inner-holder">
                                                            <?php
                                                            if ($data['discover']['num'] > 0) {
                                                                foreach ($data['discover']['row'] as $key => $row) {
                                                                    echo '<div class="qodef-tours-list-grid-sizer"></div>';
                                                                    if ($key == 0) {
                                                            ?>
                                                                        <div class="qodef-tours-masonry-item qodef-tours-row-item qodef-tour-item-no-rating qodef-size-default qodef-tour-masonry-layout-default post-33 tour-item type-tour-item status-publish has-post-thumbnail hentry tour-category-best-deals tour-attribute-airplane-transport tour-attribute-breakfast tour-attribute-departure-taxes tour-attribute-personal-guide">
                                                                            <div class="qodef-tours-gim-holder-inner">
                                                                                <div class="qodef-tours-gim-image">
                                                                                    <img width="550" height="550" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" class="attachment-getaway_qodef_square size-getaway_qodef_square" alt="a" decoding="async" sizes="(max-width: 550px) 100vw, 550px" />
                                                                                </div>
                                                                                <div class="qodef-tours-gim-content-holder">
                                                                                    <div class="qodef-tours-gim-content-outer">
                                                                                        <div class="qodef-tours-gim-content-inner">
                                                                                            <div class="qodef-gim-title-holder">
                                                                                                <h3 class="qodef-tour-title">
                                                                                                    <?php echo $row['title']; ?>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a class="qodef-tours-masonry-item-link" href="<?php echo $config->get('URL') . $row['slug']; ?>"></a>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    } elseif ($key == 1) {
                                                                    ?>
                                                                        <div class="qodef-tours-masonry-item qodef-tours-row-item qodef-tour-item-no-rating qodef-size-large-width-height qodef-tour-masonry-layout-default post-68 tour-item type-tour-item status-publish has-post-thumbnail hentry tour-category-best-deals tour-attribute-5-star-accommodation tour-attribute-airplane-transport tour-attribute-breakfast tour-attribute-personal-guide">
                                                                            <div class="qodef-tours-gim-holder-inner">
                                                                                <div class="qodef-tours-gim-image">
                                                                                    <img width="1100" height="1100" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" class="attachment-getaway_qodef_huge size-getaway_qodef_huge" alt="a" decoding="async" />
                                                                                </div>
                                                                                <div class="qodef-tours-gim-content-holder">
                                                                                    <div class="qodef-tours-gim-content-outer">
                                                                                        <div class="qodef-tours-gim-content-inner">
                                                                                            <div class="qodef-gim-title-holder">
                                                                                                <h3 class="qodef-tour-title">
                                                                                                    <?php echo $row['title']; ?>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a class="qodef-tours-masonry-item-link" href="<?php echo $config->get('URL') . $row['slug']; ?>"></a>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    } elseif ($key == 2) {
                                                                    ?>
                                                                        <div class="qodef-tours-masonry-item qodef-tours-row-item qodef-tour-item-no-rating qodef-size-default qodef-tour-masonry-layout-default post-84 tour-item type-tour-item status-publish has-post-thumbnail hentry tour-category-best-deals tour-attribute-5-star-accommodation tour-attribute-breakfast tour-attribute-departure-taxes tour-attribute-personal-guide">
                                                                            <div class="qodef-tours-gim-holder-inner">
                                                                                <div class="qodef-tours-gim-image">
                                                                                    <img width="550" height="550" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" class="attachment-getaway_qodef_square size-getaway_qodef_square" alt="a" decoding="async" />
                                                                                </div>
                                                                                <div class="qodef-tours-gim-content-holder">
                                                                                    <div class="qodef-tours-gim-content-outer">
                                                                                        <div class="qodef-tours-gim-content-inner">
                                                                                            <div class="qodef-gim-title-holder">
                                                                                                <h3 class="qodef-tour-title">
                                                                                                    <?php echo $row['title']; ?>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a class="qodef-tours-masonry-item-link" href="<?php echo $config->get('URL') . $row['slug']; ?>"></a>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    } elseif ($key == 3) {
                                                                    ?>
                                                                        <div class="qodef-tours-masonry-item qodef-tours-row-item qodef-tour-item-no-rating qodef-size-default qodef-tour-masonry-layout-default post-93 tour-item type-tour-item status-publish has-post-thumbnail hentry tour-category-best-deals tour-attribute-5-star-accommodation tour-attribute-airplane-transport tour-attribute-breakfast tour-attribute-departure-taxes">
                                                                            <div class="qodef-tours-gim-holder-inner">
                                                                                <div class="qodef-tours-gim-image">
                                                                                    <img width="550" height="550" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" class="attachment-getaway_qodef_square size-getaway_qodef_square" alt="a" decoding="async" sizes="(max-width: 550px) 100vw, 550px" />
                                                                                </div>
                                                                                <div class="qodef-tours-gim-content-holder">
                                                                                    <div class="qodef-tours-gim-content-outer">
                                                                                        <div class="qodef-tours-gim-content-inner">
                                                                                            <div class="qodef-gim-title-holder">
                                                                                                <h3 class="qodef-tour-title">
                                                                                                    <?php echo $row['title']; ?>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a class="qodef-tours-masonry-item-link" href="<?php echo $config->get('URL') . $row['slug']; ?>"></a>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    } elseif ($key == 4) {
                                                                    ?>
                                                                        <div class="qodef-tours-masonry-item qodef-tours-row-item qodef-tour-item-no-rating qodef-size-default qodef-tour-masonry-layout-default post-96 tour-item type-tour-item status-publish has-post-thumbnail hentry tour-category-best-deals tour-attribute-5-star-accommodation tour-attribute-airplane-transport tour-attribute-breakfast tour-attribute-personal-guide">
                                                                            <div class="qodef-tours-gim-holder-inner">
                                                                                <div class="qodef-tours-gim-image">
                                                                                    <img width="550" height="550" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" class="attachment-getaway_qodef_square size-getaway_qodef_square" alt="a" decoding="async" sizes="(max-width: 550px) 100vw, 550px" />
                                                                                </div>
                                                                                <div class="qodef-tours-gim-content-holder">
                                                                                    <div class="qodef-tours-gim-content-outer">
                                                                                        <div class="qodef-tours-gim-content-inner">
                                                                                            <div class="qodef-gim-title-holder">
                                                                                                <h3 class="qodef-tour-title">
                                                                                                    <?php echo $row['title']; ?>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a class="qodef-tours-masonry-item-link" href="<?php echo $config->get('URL') . $row['slug']; ?>"></a>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    } elseif ($key == 5) {
                                                                    ?>
                                                                        <div class="qodef-tours-masonry-item qodef-tours-row-item qodef-tour-item-no-rating qodef-size-large-height qodef-tour-masonry-layout-default post-97 tour-item type-tour-item status-publish has-post-thumbnail hentry tour-category-best-deals tour-attribute-airplane-transport tour-attribute-breakfast tour-attribute-departure-taxes">
                                                                            <div class="qodef-tours-gim-holder-inner">
                                                                                <div class="qodef-tours-gim-image">
                                                                                    <img width="550" height="1100" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" class="attachment-getaway_qodef_portrait size-getaway_qodef_portrait" alt="a" decoding="async" />
                                                                                </div>
                                                                                <div class="qodef-tours-gim-content-holder">
                                                                                    <div class="qodef-tours-gim-content-outer">
                                                                                        <div class="qodef-tours-gim-content-inner">
                                                                                            <div class="qodef-gim-title-holder">
                                                                                                <h3 class="qodef-tour-title">
                                                                                                    <?php echo $row['title']; ?>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a class="qodef-tours-masonry-item-link" href="<?php echo $config->get('URL') . $row['slug']; ?>"></a>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    } elseif ($key == 6) {
                                                                    ?>
                                                                        <!--area desc start-->
                                                                        <div class="qodef-tours-masonry-item qodef-tours-row-item qodef-tour-item-no-rating qodef-size-large-width qodef-tour-masonry-layout-description post-98 tour-item type-tour-item status-publish has-post-thumbnail hentry tour-category-best-deals tour-attribute-airplane-transport tour-attribute-breakfast tour-attribute-departure-taxes tour-attribute-personal-guide">
                                                                            <div class="qodef-tours-gim-holder-inner">
                                                                                <span class="qodef-tours-gim-line top"></span>
                                                                                <span class="qodef-tours-gim-line right"></span>
                                                                                <span class="qodef-tours-gim-line bottom"></span>
                                                                                <span class="qodef-tours-gim-line left"></span>
                                                                                <div class="qodef-tours-gim-content-outer">
                                                                                    <div class="qodef-tours-gim-content-inner">
                                                                                        <div class="qodef-tours-gim-title-holder">
                                                                                            <h3 class="qodef-tour-title">
                                                                                                Marmaris'i
                                                                                                <span class="qodef-extra-bold"><?php echo $data['LANG']['DISCOVER'] ?></span>
                                                                                            </h3>
                                                                                        </div>
                                                                                        <div class="qodef-tours-gim-excerpt">
                                                                                            <div class="qodef-tours-gim-excerpt-inner">
                                                                                                <?php echo $data['LANG']['DISCOVER_CNT'] ?>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="qodef-tours-gim-button">
                                                                                            <a itemprop="url" href="<?php echo $config->get('URL') ?>kesfet" target="_self" class="qodef-btn qodef-btn-medium qodef-btn-simple qodef-btn-icon">
                                                                                                <span class="qodef-btn-text"><?php echo $data['LANG']['READ_MORE'] ?></span>
                                                                                                <i class="qodef-icon-font-awesome fa fa-chevron-right"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a class="qodef-tours-masonry-item-link" href="<?php echo $config->get('URL') ?>kesfet"></a>
                                                                            </div>
                                                                        </div>
                                                                        <!--area desc start-->
                                                                    <?php
                                                                    } elseif ($key == 7) {
                                                                    ?>
                                                                        <div class="qodef-tours-masonry-item qodef-tours-row-item qodef-tour-item-no-rating qodef-size-large-height qodef-tour-masonry-layout-default post-99 tour-item type-tour-item status-publish has-post-thumbnail hentry tour-category-best-deals tour-attribute-airplane-transport tour-attribute-breakfast tour-attribute-departure-taxes tour-attribute-personal-guide">
                                                                            <div class="qodef-tours-gim-holder-inner">
                                                                                <div class="qodef-tours-gim-image">
                                                                                    <img width="550" height="1100" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" decoding="async" />
                                                                                </div>
                                                                                <div class="qodef-tours-gim-content-holder">
                                                                                    <div class="qodef-tours-gim-content-outer">
                                                                                        <div class="qodef-tours-gim-content-inner">
                                                                                            <div class="qodef-gim-title-holder">
                                                                                                <h3 class="qodef-tour-title">
                                                                                                    <?php echo $row['title']; ?>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a class="qodef-tours-masonry-item-link" href="<?php echo $config->get('URL') . $row['slug']; ?>"></a>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    } elseif ($key == 8) {
                                                                    ?>
                                                                        <div class="qodef-tours-masonry-item qodef-tours-row-item qodef-tour-item-no-rating qodef-size-default qodef-tour-masonry-layout-default post-100 tour-item type-tour-item status-publish has-post-thumbnail hentry tour-category-best-deals tour-attribute-5-star-accommodation tour-attribute-airplane-transport tour-attribute-breakfast tour-attribute-departure-taxes">
                                                                            <div class="qodef-tours-gim-holder-inner">
                                                                                <div class="qodef-tours-gim-image">
                                                                                    <img width="550" height="550" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" decoding="async" sizes="(max-width: 550px) 100vw, 550px" />
                                                                                </div>
                                                                                <div class="qodef-tours-gim-content-holder">
                                                                                    <div class="qodef-tours-gim-content-outer">
                                                                                        <div class="qodef-tours-gim-content-inner">
                                                                                            <div class="qodef-gim-title-holder">
                                                                                                <h3 class="qodef-tour-title">
                                                                                                    <?php echo $row['title']; ?>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a class="qodef-tours-masonry-item-link" href="<?php echo $config->get('URL') . $row['slug']; ?>"></a>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    } elseif ($key == 9) {
                                                                    ?>
                                                                        <div class="qodef-tours-masonry-item qodef-tours-row-item qodef-tour-item-no-rating qodef-size-large-width qodef-tour-masonry-layout-default post-101 tour-item type-tour-item status-publish has-post-thumbnail hentry tour-category-best-deals tour-attribute-5-star-accommodation tour-attribute-airplane-transport tour-attribute-breakfast tour-attribute-departure-taxes">
                                                                            <div class="qodef-tours-gim-holder-inner">
                                                                                <div class="qodef-tours-gim-image">
                                                                                    <img width="1100" height="550" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" decoding="async" />
                                                                                </div>
                                                                                <div class="qodef-tours-gim-content-holder">
                                                                                    <div class="qodef-tours-gim-content-outer">
                                                                                        <div class="qodef-tours-gim-content-inner">
                                                                                            <div class="qodef-gim-title-holder">
                                                                                                <h3 class="qodef-tour-title">
                                                                                                    <?php echo $row['title']; ?>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a class="qodef-tours-masonry-item-link" href="<?php echo $config->get('URL') . $row['slug']; ?>"></a>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <div class="qodef-tours-masonry-item qodef-tours-row-item qodef-tour-item-no-rating qodef-size-default qodef-tour-masonry-layout-default post-102 tour-item type-tour-item status-publish has-post-thumbnail hentry tour-category-best-deals tour-attribute-airplane-transport tour-attribute-breakfast tour-attribute-departure-taxes">
                                                                            <div class="qodef-tours-gim-holder-inner">
                                                                                <div class="qodef-tours-gim-image">
                                                                                    <img width="550" height="550" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" class="attachment-getaway_qodef_square size-getaway_qodef_square" decoding="async" sizes="(max-width: 550px) 100vw, 550px" />
                                                                                </div>
                                                                                <div class="qodef-tours-gim-content-holder">
                                                                                    <div class="qodef-tours-gim-content-outer">
                                                                                        <div class="qodef-tours-gim-content-inner">
                                                                                            <div class="qodef-gim-title-holder">
                                                                                                <h3 class="qodef-tour-title">
                                                                                                    <?php echo $row['title']; ?>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a class="qodef-tours-masonry-item-link" href="<?php echo $config->get('URL') . $row['slug']; ?>"></a>
                                                                            </div>
                                                                        </div>

                                                            <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Keşfet End -->
                                    <!--Rota Üst Yazı Start -->
                                    <div class="qodef-row-grid-section-wrapper">
                                        <div class="qodef-row-grid-section">
                                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1504790003226">
                                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                                    <div class="vc_column-inner">
                                                        <div class="wpb_wrapper">
                                                            <div class="qodef-elements-holder qodef-one-column qodef-responsive-mode-768">
                                                                <div class="qodef-eh-item" data-item-class="qodef-eh-custom-1164" data-1024-1280="0 42% 0 0" data-768-1024="0 15% 0 0" data-680-768="0 0" data-680="0 0">
                                                                    <div class="qodef-eh-item-inner">
                                                                        <div class="qodef-eh-item-content qodef-eh-custom-1164" style="padding: 0 50% 0 0">
                                                                            <div class="qodef-section-title-holder qodef-st-standard qodef-st-title-left qodef-st-normal-space qodef-st-disable-title-break qodef-st-with-border" style="text-align: left">
                                                                                <div class="qodef-st-inner">
                                                                                    <h2 class="qodef-st-title">
                                                                                        <?php echo $data['LANG']['ROUTE_TIT'] ?> <br />
                                                                                        <span class="qodef-st-title-bold">Marmaris… </span>
                                                                                    </h2>
                                                                                    <h5 class="qodef-st-text">
                                                                                        <?php echo $data['LANG']['ROUTE_DTL'] ?>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vc_empty_space" style="height: 70px">
                                                                                <span class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Rota Üst Yazı End -->
                                    <!--Rota Start -->
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner">
                                                <div class="wpb_wrapper">
                                                    <?php
                                                    if ($data['routes']['num'] > 0) {
                                                        foreach ($data['routes']['row'] as $key => $row) {
                                                            if ($key == 0) {
                                                    ?>
                                                                <div class="qodef-elements-holder qodef-three-columns qodef-responsive-mode-768">
                                                                    <div class="qodef-eh-item" data-item-class="qodef-eh-custom-5086" data-680="0 0">
                                                                        <div class="qodef-eh-item-inner">
                                                                            <div class="qodef-eh-item-content qodef-eh-custom-5086">
                                                                                <div class="qodef-banner-holder qodef-simple qodef-banner-info-default">
                                                                                    <div class="qodef-banner-image">
                                                                                        <img style="height:485px; width:700px" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" class="attachment-full size-full" decoding="async" />
                                                                                    </div>
                                                                                    <div class="qodef-banner-text-holder">
                                                                                        <div class="qodef-banner-text-outer">
                                                                                            <div class="qodef-banner-text-inner"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <a itemprop="url" class="qodef-banner-link" href="<?php echo $data['LANG']['ROUTE_HOME_URL1'] ?>" target="_self"></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="qodef-eh-item change-background qodef-horizontal-alignment-center" style="background-color: #ffe500" data-item-class="qodef-eh-custom-5852" data-1280-1600="0 0 4% 0" data-1024-1280="0 0 9% 0" data-768-1024="0 0 10% 0" data-680-768="17% 0 20%" data-680="9% 0 26% 0">
                                                                        <div class="qodef-eh-item-inner">
                                                                            <div class="qodef-eh-item-content qodef-eh-custom-5852" style="padding: 0 0 5% 0">
                                                                                <h2 class="qodef-custom-font-holder qodef-cf-4168 qodef-double-text" style="font-family: Caveat; font-size: 150px; line-height: 185px; text-transform: capitalize; text-align: center;" data-item-class="qodef-cf-4168" data-font-size-1440="110px" data-font-size-1280="95px" data-font-size-1024="65px" data-font-size-768="165px" data-font-size-680="60px" data-line-height-1440="135px" data-line-height-1280="125px" data-line-height-1024="75px" data-line-height-768="210px" data-line-height-680="87px">
                                                                                    <span class="qodef-cf-double-text-holder">
                                                                                        <span class="qodef-cf-double-text-above" style="font-size: smaller;"><?php echo $data['LANG']['ROUTE_HOME_SPOT1'] ?></span>
                                                                                        <span class="qodef-cf-double-text-below" style="color: #ffffff; font-size: smaller"><?php echo $data['LANG']['ROUTE_HOME_SPOT1'] ?></span>
                                                                                    </span>
                                                                                    <a itemprop="url" class="qodef-cf-double-text-link" href="<?php echo $data['LANG']['ROUTE_HOME_URL1'] ?>" target="_self"></a>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="qodef-eh-item qodef-badge-enabled" style="background-color: #fafafa" data-item-class="qodef-eh-custom-2518" data-1280-1600="0 10% 4% 12%" data-1024-1280="0 15% 2% 10%" data-768-1024="0 0 6% 5%" data-680-768="15% 40% 10% 10%" data-680="30% 10% 10% 5%">
                                                                        <div class="qodef-eh-item-inner">
                                                                            <div class="qodef-eh-item-content qodef-eh-custom-2518" style="padding: 0 10% 4% 22%">
                                                                                <div class="wpb_text_column wpb_content_element">
                                                                                    <div class="wpb_wrapper">
                                                                                        <h3 style="text-align: left">
                                                                                            <strong><?php echo $data['LANG']['ROUTE_HOME_TITLE1'] ?></strong>
                                                                                        </h3>
                                                                                        <p style=" text-align: left; font-family: Montserrat; margin-top: -18px; margin-bottom: 16px;">
                                                                                        </p>
                                                                                        <p style=" text-align: left; margin-bottom: 16px;">
                                                                                            <?php echo $data['LANG']['ROUTE_HOME_CONTENT1'] ?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <a itemprop="url" href="<?php echo $data['LANG']['ROUTE_HOME_URL1'] ?>" target="_self" style="text-transform: lowercase" class="qodef-btn qodef-btn-medium qodef-btn-simple qodef-btn-icon">
                                                                                    <span class="qodef-btn-text"><?php echo $data['LANG']['READ_MORE'] ?></span>
                                                                                    <i class="qodef-icon-font-awesome fa fa-chevron-right"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            } elseif ($key == 1) {
                                                            ?>
                                                                <div class="qodef-elements-holder qodef-three-columns qodef-responsive-mode-768">
                                                                    <div class="qodef-eh-item qodef-horizontal-alignment-right" style="background-color: #fafafa" data-item-class="qodef-eh-custom-7939" data-1280-1600="0 12% 4% 10%" data-1024-1280="0 10% 2% 15%" data-768-1024="0 5% 6% 0" data-680-768="0% 10% 15% 40%" data-680="0 5% 30% 10%">
                                                                        <div class="qodef-eh-item-inner">
                                                                            <div class="qodef-eh-item-content qodef-eh-custom-7939" style="padding: 0 22% 4% 10%">
                                                                                <div class="wpb_text_column wpb_content_element">
                                                                                    <div class="wpb_wrapper">
                                                                                        <h3>
                                                                                            <strong><?php echo $data['LANG']['ROUTE_HOME_TITLE2'] ?></strong>
                                                                                        </h3>
                                                                                        <p style="margin-bottom: 16px">
                                                                                        <?php echo $data['LANG']['ROUTE_HOME_CONTENT2'] ?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <a itemprop="url" href="<?php echo $data['LANG']['ROUTE_HOME_URL2'] ?>" target="_self" style="text-transform: lowercase" class="qodef-btn qodef-btn-medium qodef-btn-simple qodef-btn-icon">
                                                                                    <span class="qodef-btn-text"><?php echo $data['LANG']['READ_MORE'] ?></span>
                                                                                    <i class="qodef-icon-font-awesome fa fa-chevron-right"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="qodef-eh-item" data-item-class="qodef-eh-custom-8315" data-680="0 0">
                                                                        <div class="qodef-eh-item-inner">
                                                                            <div class="qodef-eh-item-content qodef-eh-custom-8315">
                                                                                <div class="qodef-banner-holder qodef-simple qodef-banner-info-default">
                                                                                    <div class="qodef-banner-image">
                                                                                        <img style="height:485px; width:700px" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" class="attachment-full size-full" alt="a" decoding="async" />
                                                                                    </div>
                                                                                    <div class="qodef-banner-text-holder">
                                                                                        <div class="qodef-banner-text-outer">
                                                                                            <div class="qodef-banner-text-inner"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <a itemprop="url" class="qodef-banner-link" href="<?php echo $data['LANG']['ROUTE_HOME_URL2'] ?>" target="_self"></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="qodef-eh-item qodef-horizontal-alignment-center" style="background-color: #000000" data-item-class="qodef-eh-custom-8576" data-1024-1280="0 0 9% 0" data-768-1024="0 0 10% 0" data-680-768="15% 0 22%" data-680="9% 0 26% 0">
                                                                        <div class="qodef-eh-item-inner">
                                                                            <div class="qodef-eh-item-content qodef-eh-custom-8576" style="padding: 0 0 8% 0">
                                                                                <h2 class="qodef-custom-font-holder change-color qodef-cf-4553 qodef-double-text" style="font-family: Caveat; font-size: 160px; line-height: 185px; text-transform: capitalize; text-align: center; color: #ffe500;" data-item-class="qodef-cf-4553" data-font-size-1440="120px" data-font-size-1280="95px" data-font-size-1024="65px" data-font-size-768="180px" data-font-size-680="60px" data-line-height-1440="140px" data-line-height-1024="75px" data-line-height-768="200px" data-line-height-680="87px">
                                                                                    <span class="qodef-cf-double-text-holder">
                                                                                        <span class="qodef-cf-double-text-above" style="font-size: smaller;"><?php echo $data['LANG']['ROUTE_HOME_SPOT2'] ?></span>
                                                                                        <span class="qodef-cf-double-text-below" style="color: #3f3f3f; font-size: smaller;"><?php echo $data['LANG']['ROUTE_HOME_SPOT2'] ?></span>
                                                                                    </span>
                                                                                    <a itemprop="url" class="qodef-cf-double-text-link" href="<?php echo $data['LANG']['ROUTE_HOME_URL2'] ?>" target="_self"></a>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="qodef-elements-holder qodef-three-columns qodef-responsive-mode-768">
                                                                    <div class="qodef-eh-item change-background qodef-horizontal-alignment-center" style="background-color: #ffe500" data-item-class="qodef-eh-custom-3534" data-1280-1600="0 0 4% 0" data-1024-1280="0 0 7% 0" data-768-1024="0 0 10% 0" data-680-768="17% 0 24%" data-680="9% 0 26% 0">
                                                                        <div class="qodef-eh-item-inner">
                                                                            <div class="qodef-eh-item-content qodef-eh-custom-3534" style="padding: 0 0 8% 0">
                                                                                <h2 class="qodef-custom-font-holder qodef-cf-8048 qodef-double-text" style="font-family: Caveat; font-size: 130px; line-height: 150px; text-transform: capitalize; text-align: center;" data-item-class="qodef-cf-8048" data-font-size-1440="100px" data-font-size-1280="85px" data-font-size-1024="65px" data-font-size-768="145px" data-font-size-680="60px" data-line-height-1440="110px" data-line-height-1024="75px" data-line-height-768="200px" data-line-height-680="87px">
                                                                                    <span class="qodef-cf-double-text-holder">
                                                                                        <span class="qodef-cf-double-text-above" style="font-size: smaller;"><?php echo $data['LANG']['ROUTE_HOME_SPOT3'] ?></span>
                                                                                        <span class="qodef-cf-double-text-below" style="color: #ffffff; font-size: smaller;"><?php echo $data['LANG']['ROUTE_HOME_SPOT3'] ?></span>
                                                                                    </span>
                                                                                    <a itemprop="url" class="qodef-cf-double-text-link" href="<?php echo $data['LANG']['ROUTE_HOME_URL2'] ?>" target="_self"></a>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="qodef-eh-item qodef-badge-enabled" style="background-color: #fafafa" data-item-class="qodef-eh-custom-8459" data-1280-1600="0 10% 4% 12%" data-1024-1280="0 15% 2% 10%" data-768-1024="0 0 6% 5%" data-680-768="15% 40% 15% 10%" data-680="30% 10% 30% 5%">
                                                                        <div class="qodef-eh-item-inner">
                                                                            <div class="qodef-eh-item-content qodef-eh-custom-8459" style="padding: 0 10% 4% 22%">
                                                                                <div class="wpb_text_column wpb_content_element">
                                                                                    <div class="wpb_wrapper">
                                                                                        <h3>
                                                                                            <strong><?php echo $data['LANG']['ROUTE_HOME_TITLE3'] ?></strong>
                                                                                        </h3>
                                                                                        <p style="margin-bottom: 16px">
                                                                                            <?php echo $data['LANG']['ROUTE_HOME_CONTENT3'] ?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <a itemprop="url" href="<?php echo $data['LANG']['ROUTE_HOME_URL3'] ?>" target="_self" style="text-transform: lowercase" class="qodef-btn qodef-btn-medium qodef-btn-simple qodef-btn-icon">
                                                                                    <span class="qodef-btn-text"><?php echo $data['LANG']['READ_MORE'] ?></span>
                                                                                    <i class="qodef-icon-font-awesome fa fa-chevron-right"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="qodef-eh-item" data-item-class="qodef-eh-custom-9274" data-680="0 0">
                                                                        <div class="qodef-eh-item-inner">
                                                                            <div class="qodef-eh-item-content qodef-eh-custom-9274">
                                                                                <div class="qodef-banner-holder qodef-simple qodef-banner-info-default">
                                                                                    <div class="qodef-banner-image">
                                                                                        <img style="height:485px; width:700px" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" class="attachment-full size-full" alt="a" decoding="async" />
                                                                                    </div>
                                                                                    <div class="qodef-banner-text-holder">
                                                                                        <div class="qodef-banner-text-outer">
                                                                                            <div class="qodef-banner-text-inner"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <a itemprop="url" class="qodef-banner-link" href="<?php echo $data['LANG']['ROUTE_HOME_URL3'] ?>" target="_self"></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Rota End -->
                                    <!--Esnaf Üst Yazı Start -->
                                    <div class="qodef-row-grid-section-wrapper">
                                        <div class="qodef-row-grid-section">
                                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1505299924993">
                                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                                    <div class="vc_column-inner">
                                                        <div class="wpb_wrapper">
                                                            <div class="qodef-elements-holder qodef-one-column qodef-responsive-mode-768">
                                                                <div class="qodef-eh-item" data-item-class="qodef-eh-custom-9304" data-1024-1280="0 42% 0 0" data-768-1024="0 15% 0 0" data-680-768="0 0" data-680="0 0">
                                                                    <div class="qodef-eh-item-inner">
                                                                        <div class="qodef-eh-item-content qodef-eh-custom-9304" style="padding: 0 50% 0 0">
                                                                            <div class="qodef-section-title-holder qodef-st-standard qodef-st-title-left qodef-st-normal-space qodef-st-disable-title-break qodef-st-with-border" style="text-align: left">
                                                                                <div class="qodef-st-inner">
                                                                                    <h2 class="qodef-st-title">
                                                                                        <?php echo $data['LANG']['ARTISANS_TIT'] ?>
                                                                                        <span class="qodef-st-title-bold"><?php echo $data['LANG']['ARTISANS'] ?> </span>
                                                                                        <?php echo $data['LANG']['ARTISANS_TIT1'] ?>
                                                                                    </h2>
                                                                                    <h5 class="qodef-st-text">
                                                                                        <?php echo $data['LANG']['ARTISANS_DTL'] ?>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vc_empty_space" style="height: 70px">
                                                                                <span class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Esnaf Üst Yazı End -->
                                    <!--Esnaf Start -->
                                    <div class="vc_row wpb_row vc_row-fluid" style="background-color: #f6f6f6">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner">
                                                <div class="wpb_wrapper">
                                                    <div class="qodef-tours-carousel-holder qodef-carousel-pagination">
                                                        <div class="qodef-tours-row qodef-tr-no-space qodef-tour-light-skin qodef-tours-type-gallery">
                                                            <div class="qodef-tours-carousel qodef-tours-row-inner-holder qodef-owl-slider" data-number-of-items="2" data-enable-loop="yes" data-enable-autoplay="yes" data-slider-speed="5000" data-slider-speed-animation="600" data-enable-center="no" data-enable-auto-width="no" data-slider-padding="yes" data-enable-navigation="yes" data-enable-pagination="no">
                                                                <?php
                                                                if ($data['shop_cat']['num'] > 0) {
                                                                    foreach ($data['shop_cat']['row'] as $row) {
                                                                ?>
                                                                        <div class="qodef-tours-gallery-item qodef-tours-row-item qodef-tour-item-no-rating post-106 tour-item type-tour-item status-publish has-post-thumbnail hentry tour-category-group-tours tour-attribute-airplane-transport tour-attribute-breakfast tour-attribute-departure-taxes">
                                                                            <div class="qodef-tours-gallery-item-image-holder">
                                                                                <div class="qodef-tours-gallery-item-image">
                                                                                    <img style="height:300px" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" class="attachment-full size-full" alt="a" decoding="async" sizes="(max-width: 410px) 100vw, 410px" />
                                                                                    <div class="qodef-tours-gallery-item-content-holder">
                                                                                        <div class="qodef-tours-gallery-item-content-inner">
                                                                                            <div class="qodef-tours-gallery-title-holder">
                                                                                                <h4 class="qodef-tour-title">
                                                                                                    <?php echo $row['title'] ?>
                                                                                                </h4>
                                                                                            </div>
                                                                                            <div class="qodef-tours-gallery-item-excerpt">
                                                                                                <div class="qodef-tours-gallery-item-excerpt-inner">
                                                                                                    <?php echo $row['description'] ?>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a class="qodef-tours-gallery-item-link" href="<?php echo $config->get('URL') . $row['slug']; ?>"></a>
                                                                            </div>
                                                                        </div>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="vc_empty_space" style="height: 80px">
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                    <div class="qodef-video-button-holder">
                                                        <div class="qodef-video-button-image">
                                                            <img width="1920" height="600" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $data['settings']['youtube_image']; ?>" class="attachment-full size-full" alt="a" decoding="async" sizes="(max-width: 1920px) 100vw, 1920px" />
                                                        </div>
                                                        <a class="qodef-video-button-play" href="<?php echo $data['settings']['youtube_home'] ?>" target="_self" data-rel="prettyPhoto[video_button_pretty_photo_465]">
                                                            <span class="qodef-video-button-play-inner">
                                                                <span class="qodef-video-button-play-holder" style="color: #000000">
                                                                    <span class="arrow_triangle-right"></span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Esnaf End -->
                                    <!--Ulaşım Üst Yazı Start -->
                                    <div class="vc_row wpb_row vc_row-fluid change-background vc_custom_1506426183942" style="background-color: #ffe500">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner">
                                                <div class="wpb_wrapper">
                                                    <div class="qodef-row-grid-section-wrapper qodef-content-aligment-left">
                                                        <div class="qodef-row-grid-section">
                                                            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                                                    <div class="vc_column-inner">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="qodef-elements-holder qodef-one-column qodef-responsive-mode-768">
                                                                                <div class="qodef-eh-item" data-item-class="qodef-eh-custom-5739" data-1024-1280="0 40% 0 0" data-768-1024="0 35% 0 0" data-680-768="0 20% 0 0" data-680="0 10% 0 0">
                                                                                    <div class="qodef-eh-item-inner">
                                                                                        <div class="qodef-eh-item-content qodef-eh-custom-5739" style="padding: 0 50% 0 0">
                                                                                            <div class="vc_empty_space" style="height: 30px">
                                                                                                <span class="vc_empty_space_inner"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="qodef-row-overlapping-text">
                                            MARMARİS!
                                        </div>
                                    </div>
                                    <div class="qodef-row-grid-section-wrapper">
                                        <div class="qodef-row-grid-section">
                                            <div class="vc_row wpb_row vc_row-fluid vc_custom_1505300008742">
                                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                                    <div class="vc_column-inner">
                                                        <div class="wpb_wrapper">
                                                            <div class="qodef-elements-holder qodef-one-column qodef-responsive-mode-768">
                                                                <div class="qodef-eh-item" data-item-class="qodef-eh-custom-7478" data-1024-1280="0 42% 0 0" data-768-1024="0 15% 0 0" data-680-768="0 0" data-680="0 0">
                                                                    <div class="qodef-eh-item-inner">
                                                                        <div class="qodef-eh-item-content qodef-eh-custom-7478" style="padding: 0 50% 0 0">
                                                                            <div class="qodef-section-title-holder qodef-st-standard qodef-st-title-left qodef-st-normal-space qodef-st-disable-title-break qodef-st-with-border" style="text-align: left">
                                                                                <div class="qodef-st-inner">
                                                                                    <h2 class="qodef-st-title">
                                                                                        <?php echo $data['LANG']['LOCATIONS_TIT'] ?>
                                                                                        <span class="qodef-st-title-bold"><?php echo $data['LANG']['LOCATIONS'] ?></span>
                                                                                    </h2>
                                                                                    <h5 class="qodef-st-text">
                                                                                        <?php echo $data['LANG']['LOCATIONS_DTL'] ?>
                                                                                    </h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vc_empty_space" style="height: 70px">
                                                                                <span class="vc_empty_space_inner"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Ulaşım Üst Yazı End -->
                                    <!--Ulaşım Start -->
                                    <div class="vc_row wpb_row vc_row-fluid vc_custom_1506413786677 pb-4" style="background-color: #f6f6f6">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner">
                                                <div class="wpb_wrapper">
                                                    <div class="qodef-tours-carousel-holder qodef-carousel-pagination">
                                                        <div class="qodef-tours-row qodef-tr-small-space qodef-tours-type-standard">
                                                            <div class="qodef-tours-carousel qodef-tours-row-inner-holder qodef-owl-slider" data-number-of-items="5" data-enable-loop="yes" data-enable-autoplay="yes" data-slider-speed="5000" data-slider-speed-animation="600" data-enable-center="no" data-enable-auto-width="no" data-slider-padding="no" data-enable-navigation="no" data-enable-pagination="yes">
                                                                <?php
                                                                if ($data['transport']['num'] > 0) {
                                                                    foreach ($data['transport']['row'] as $row) {
                                                                ?>
                                                                        <div class="qodef-tours-standard-item qodef-tours-row-item post-<?php echo $row['id']; ?> tour-item type-tour-item status-publish has-post-thumbnail hentry tour-category-beaches tour-attribute-airplane-transport tour-attribute-breakfast tour-attribute-departure-taxes">
                                                                            <div class="qodef-tours-standard-item-image-holder">
                                                                                <a href="<?php echo $config->get('URL') . $row['slug']; ?>">
                                                                                    <img style="height:250px" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" class="attachment-full size-full" alt="a" decoding="async" sizes="(max-width: 1100px) 100vw, 1100px" />
                                                                                </a>
                                                                            </div>
                                                                            <div class="qodef-tours-standard-item-content-holder">
                                                                                <div class="qodef-tours-standard-item-content-inner">
                                                                                    <div class="qodef-tours-standard-item-title-price-holder">
                                                                                        <h4 class="qodef-tour-title">
                                                                                            <a href="<?php echo $config->get('URL') . $row['slug']; ?>"><?php echo $row['title']; ?></a>
                                                                                        </h4>
                                                                                    </div>
                                                                                    <div class="qodef-tours-standard-item-excerpt">
                                                                                        <?php echo $row['description']; ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="qodef-tours-standard-item-bottom-content">
                                                                                    <div class="qodef-tours-standard-item-bottom-item">
                                                                                        <div class="qodef-tours-tour-destination-holder">
                                                                                            <a href="<?php echo $config->get('URL') . $row['slug']; ?>" target="_self"><span class="dripicons-location"></span><span class="qodef-tour-cat-item-text"><?php echo $row['category_title']; ?></span>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="qodef-tours-standard-item-bottom-item">
                                                                                        <div class="qodef-tours-tour-categories-holder">
                                                                                            <div class="qodef-tours-tour-categories-item">
                                                                                                <a href="<?php echo $config->get('URL') . $row['slug']; ?>">
                                                                                                    <span class="qodef-tour-cat-item-text">
                                                                                                        <?php echo $row['category_title']; ?>
                                                                                                    </span>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Ulaşım End -->
                                    <!--Lokasyonlar Start -->
                                    <div class="vc_row wpb_row vc_row-fluid vc_custom_1504795610152" style="background-color: #f6f6f6">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner">
                                                <div class="wpb_wrapper">
                                                    <div class="qodef-blog-list-holder qodef-bl-masonry qodef-bl-four-columns qodef-normal-space qodef-bl-pag-no-pagination" data-type="masonry" data-number-of-posts="8" data-number-of-columns="4" data-space-between-items="normal" data-category="magic-places" data-order-by="date" data-order="ASC" data-image-size="full" data-title-tag="h4" data-enable-excerpt="no" data-excerpt-length="40" data-post-info-section="yes" data-post-info-image="yes" data-post-info-author="no" data-post-info-date="yes" data-post-info-category="no" data-post-info-comments="yes" data-post-info-like="no" data-post-info-share="no" data-pagination-type="no-pagination" data-link-tag="h4" data-quote-tag="h4" data-holder-classes="qodef-bl-masonry qodef-bl-four-columns qodef-normal-space qodef-bl-pag-no-pagination" data-max-num-pages="1" data-next-page="2">
                                                        <div class="qodef-bl-wrapper qodef-outer-space">
                                                            <div class="qodef-blog-list">
                                                                <div class="qodef-bl-grid-sizer"></div>
                                                                <div class="qodef-bl-grid-gutter"></div>
                                                                <?php
                                                                if ($data['locations_cat']['num'] > 0) {
                                                                    foreach ($data['locations_cat']['row'] as $row) {
                                                                ?>
                                                                        <article class="qodef-bl-item qodef-item-space clearfix">
                                                                            <div class="qodef-bli-inner">
                                                                                <div class="qodef-post-image">
                                                                                    <a itemprop="url" href="<?php echo $config->get('URL') . $row['slug']; ?>" title="<?php echo $row['title']; ?>">
                                                                                        <img style="height:325px" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" class="attachment-full size-full wp-post-image" alt="v" decoding="async" />
                                                                                    </a>
                                                                                </div>
                                                                                <div class="qodef-bli-content">
                                                                                    <h4 itemprop="name" class="entry-title qodef-post-title">
                                                                                        <a itemprop="url" href="<?php echo $config->get('URL') . $row['slug']; ?>" title="<?php echo $row['title']; ?>">
                                                                                            <?php echo $row['title']; ?>
                                                                                        </a>
                                                                                    </h4>
                                                                                    <div class="qodef-bli-info">
                                                                                        <div class="qodef-post-info-comments-holder">
                                                                                            <a itemprop="url" class="qodef-post-info-comments" href="./2017/08/30/backpacking-laos-a-full-travel-guide-for-you/index.html#comments" target="_self">
                                                                                                <?php echo $row['description']; ?>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </article>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Lokasyonlar End -->
                                    <!--Gallery Start -->
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner">
                                                <div class="wpb_wrapper">
                                                    <div class="qodef-image-gallery qodef-ig-grid-type qodef-no-space qodef-image-behavior-lightbox">
                                                        <div class="qodef-ig-inner qodef-outer-space qodef-ig-grid qodef-ig-six-columns">
                                                            <?php
                                                            if ($data['instagram']['num'] > 0) {
                                                                foreach ($data['instagram']['row'] as $row) {
                                                            ?>
                                                                    <div class="qodef-ig-image qodef-item-space">
                                                                        <div class="qodef-ig-image-inner">
                                                                            <a itemprop="image" class="qodef-ig-lightbox" href="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" data-rel="prettyPhoto[image_gallery_pretty_photo-568]" title="h-img-gallery-1">
                                                                                <img style="width:600px; height:230px" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $row['image']; ?>" class="attachment-full size-full" alt="b" decoding="async" sizes="(max-width: 600px) 100vw, 600px" />
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Gallery End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- close div.content_inner -->
            </div>
            <!-- close div.content -->
            <?php $load->view('common', 'footer', $data) ?>