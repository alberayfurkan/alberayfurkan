<?php
class C_home extends Controller
{
    public function index()
    {
        $this->data['title']            = $this->data['settings']['meta_title'];
        $this->data['description']      = $this->data['settings']['meta_description'];
        $this->data['lang']             = $this->model->getLanguageDetail();

        $this->load->view('home', 'index', $this->data);
    }

    public function notfound()
    {
        http_response_code(404);
        $this->data['title']            = 'Sayfa bulunamadı - DMR Doğaltaş';
        $this->data['description']      = 'Sayfa bulunamadı.';

        $this->load->view('home', '404', $this->data);
    }

    public function map()
    {

        header('Content-Type: text/xml; charset=utf-8');
        echo '<?xml version="1.0" encoding="UTF-8"?>
                <urlset xmlns="http://www.google.com/schemas/sitemap/0.84" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">';

        echo '<url>
                <loc>' . $this->config->get('URL') . '</loc>
                <lastmod>2021-12-20T13:58:02+00:00</lastmod>
                <priority>1</priority>
            </url>';

        // example google mapping

        // if($speakers['num'] > 0)
        // {
        //    foreach($speakers['row'] as $row)
        //    {
        //        $dttime = date_create($row['updated']);
        //        $timestamp = date_timestamp_get($dttime);
        //        $ndate =  date('c',$timestamp);

        //        echo '<url>
        //                 <loc>'.$this->config->get('URL').''.$row['slug'].'</loc>
        //                 <lastmod>'.$ndate.'</lastmod>
        //                 <priority>0.5</priority>
        //             </url>';
        //    }
        // }

        echo '</urlset>';
    }
}
