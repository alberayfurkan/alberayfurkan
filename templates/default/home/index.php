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
            "@id": "' . $config->get('URL') . 'iletisim",
            "name": "İletişim"
        }
    }
  ]
}
</script>';
$load->view('common', 'header', $data); ?>

<section id="contact">
    <div class="contact-box">
        <div class="contact-links">
            <h2><?php echo $data['LANG']['CONTACT'] ?></h2>
        </div>
        <div class="contact-form-wrapper">
            <?php $load->plugin('cForm'); ?>
        </div>
    </div>
</section>

<?php $load->view('common', 'footer', $data) ?>