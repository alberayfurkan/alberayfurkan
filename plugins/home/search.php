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
    },
    {
        "@type": "ListItem",
        "position": 2,
        "item": {
            "@id": "' . $config->get('URL') . 'arama",
            "name": "Arama"
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

            <!-- Search Start -->
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
            <!-- Search End -->

            <!-- Menu Start -->
            <!-- Menu End -->

            <div class="qodef-content">
                <div class="qodef-content-inner ">
                    <div class="qodef-full-width">
                        <div class="qodef-full-width-inner">
                            <div class="qodef-grid-row">
                                <div class="qodef-page-content-holder qodef-grid-col-12">
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
                                    <div class="qodef-row-grid-section-wrapper" style="background-color: #f6f6f6">
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
                                                                                        <span class="qodef-st-title-bold"><?php echo $data['LANG']['SEARCH_RESULTS'] ?></span>
                                                                                    </h2>
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
                                    <div class="vc_row wpb_row vc_row-fluid vc_custom_1504795610152" style="background-color: #f6f6f6;">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner">
                                                <div class="wpb_wrapper">
                                                    <div class="qodef-blog-list-holder qodef-bl-masonry qodef-bl-four-columns qodef-normal-space qodef-bl-pag-no-pagination" data-type="masonry" data-number-of-posts="8" data-number-of-columns="4" data-space-between-items="normal" data-category="magic-places" data-order-by="date" data-order="ASC" data-image-size="full" data-title-tag="h4" data-enable-excerpt="no" data-excerpt-length="40" data-post-info-section="yes" data-post-info-image="yes" data-post-info-author="no" data-post-info-date="yes" data-post-info-category="no" data-post-info-comments="yes" data-post-info-like="no" data-post-info-share="no" data-pagination-type="no-pagination" data-link-tag="h4" data-quote-tag="h4" data-holder-classes="qodef-bl-masonry qodef-bl-four-columns qodef-normal-space qodef-bl-pag-no-pagination" data-max-num-pages="1" data-next-page="2">
                                                        <div class="qodef-bl-wrapper qodef-outer-space">
                                                            <div class="qodef-blog-list">
                                                                <div class="qodef-bl-grid-sizer"></div>
                                                                <div class="qodef-bl-grid-gutter"></div>

                                                                <?php
                                                                if ($data['search_list']['num'] > 0) {
                                                                    foreach ($data['search_list']['row'] as $row) {
                                                                ?>
                                                                        <article class="qodef-bl-item qodef-item-space clearfix format-quote p-4">
                                                                            <div class="qodef-bli-inner">
                                                                                <span class="qodef-bli-line top"></span>
                                                                                <span class="qodef-bli-line right"></span>
                                                                                <span class="qodef-bli-line bottom"></span>
                                                                                <span class="qodef-bli-line left"></span>
                                                                                <div class="qodef-post-mark">
                                                                                    <span class="fa fa-quote-right qodef-quote-mark"></span>
                                                                                </div>
                                                                                <div class="qodef-bli-content">
                                                                                    <div class="qodef-post-quote-holder">
                                                                                        <div class="qodef-post-quote-holder-inner">
                                                                                            <h4 itemprop="name" class="qodef-quote-title qodef-post-title">
                                                                                                <a itemprop="url" href="<?php echo $config->get('URL') . $row['slug']; ?>" title="Best Travel Quotes.">
                                                                                                    <?php echo $row['title'] ?>
                                                                                                </a>
                                                                                            </h4>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- close div.content_inner -->
            </div>
            <!-- close div.content -->

            <?php $load->view('common', 'footer', $data) ?>