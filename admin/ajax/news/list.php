<?php
include '../../ajax.php';
$system = System::getInstance();

// Eğer ajax isteği yapılmışsa burayı çalıştır
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if (empty($_COOKIE['user_id'])) {
        header("HTTP/1.0 404 Not Found");
        exit();
    }

    // Listelenecek kolonlar
    $kolonlar       = array("id", "lang", "site_name", "status"); 
    $kolonlar2       = array("n.id", "c.name", "n.site_name", "n.status"); 

    $arama_kelime   =  isset($_POST["search"]["value"]) ? $_POST["search"]["value"] : ''; //Eğer boş değilse eklentinin arama kısmından yollanan değeri alıyoruz.
    $siralama       =  isset($_POST["order"]) ? $_POST["order"] : ''; // Eğer boş değilse eklentinin sıralama kısmından yollanan değeri alıyoruz.
    $length         =  isset($_POST["length"]) ? $_POST["length"] : ''; // Eğer boş değilse eklentinin sayfada kaç veri gösterileceği kısmından yollanan değeri alıyoruz.
    $limit          =  isset($_POST["start"]) ? $_POST["start"] : ''; // Eğer boş değilse eklentinin kaçıncı veriden itibaren başlayıcağı değeri alıyoruz.

    //  SQL Srogusu
    $sql = "SELECT n.id, n.site_name, c.name as lang, n.status
        FROM settings n 
        INNER JOIN languages c ON n.lang_id = c.id
    WHERE (n.trash != 1) ";

    $toplamFiltreVeri = toplam_veri(); // Eğer filtreleme işlemi yapılmazsa filtrelenmiş veri sayısını toplam veri sayısına eşitle

    // Eğer arama_kelime değişkeni boş değilse yani arama yapılmışsa
    if (!empty($arama_kelime)) {
        $arama_sql = "AND ";
        $arama_index = 0;

        foreach ($kolonlar2 as $kolon) {

            // Kolonlar dizisindeki elemanların hepsini arama işlemi şeklinde sql cümlesine ekliyoruz.
            if ($arama_index == 0)
                $arama_sql .= $kolon . " LIKE '%" . $arama_kelime . "%' ";
            else
                $arama_sql .= " OR " . $kolon . " LIKE '%" . $arama_kelime . "%' ";

            $arama_index++;
        }
        $sql .= $arama_sql;
        $toplamFiltreVeri = arama_toplam_veri($arama_kelime, $arama_sql); // Arama yaptıktan sonra toplam kaç veri olduğunu buluyoruz.
    }

    if (!empty($siralama))   // Eğer siralama değişkeni boş değilse yani sıralama yapılmışsa
    {
        // Sıralamadan seçilen değeri kolonlar dizimize yollayarak o değerdeki kolona göre sıralama yapıyoruz
        $sql .= "ORDER BY " . $kolonlar[$siralama['0']['column']] . " " . strtoupper($siralama['0']['dir']) . " ";
    } else {
        // Eğer sıralama işlemi yapılmamışsa varsayılan olarak icerik_id kolonuna göre sıralama yap
        $sql .= "ORDER BY n.id DESC ";
    }

    if ($length != 1) {
        // Sayfalama işlemini yapıyoruz
        $sql .= "LIMIT " . $limit . "," . $length;
    }

    $data = array();
    $s = $db->getRows($sql);
    if ($s['num'] > 0) {
        $veriler = $s['row'];

        foreach ($veriler as $veri) {
            $veriDizi = array();
            foreach ($kolonlar as $kolon) {
                // Veri değişkeni içerisinden dinamik olarak kolon değişkeni içerisindeki kolonu getir
                if ($kolon == 'status') {
                    if ($veri[$kolon] == 1) {
                        $veriDizi[] = '<span class="badge rounded-pill  badge-light-success">AKTİF</span>';
                    } else {
                        $veriDizi[] = '<span class="badge rounded-pill  badge-light-danger">PASİF</span>';
                    }
                } else {
                    $veriDizi[] = $veri[$kolon];
                }
            }

            $veriDizi[] = '
                <a href="' . $config->get('URL') . 'admin/settings/edit/' . $veri['id'] . '/"
                    class="btn btn-warning">
                    <i data-feather="edit"></i>
                </a>
            ';

            // <button data-id="' . $veri['id'] . '" data-url="' . $config->get('URL') . 'admin/ajax/settings/delete.php"  class="btn btn-danger del_content_btn">
            //     <i data-feather="trash"></i>
            // </button>

            $data[] = $veriDizi; // Her seferinde oluşan dizimizi data değişkenine depoluyoruz	
        }
    }

    $output = array(
        "draw"    => intval($_POST["draw"]),
        "recordsTotal"  => toplam_veri(), // Toplam tablodaki veri sayımızı ekle
        "recordsFiltered" => $toplamFiltreVeri, // Toplam filtrelenmiş veri sayısını ekle
        "data"    => $data // Verileri depoladığımız değişkeni ekle
    );
    echo json_encode($output);  // Json çıktısı ver

} else {
    header("HTTP/1.0 404 Not Found");
    exit();
}

function toplam_veri()
{
    global $db;
    // Tablomuz içerisindeki toplam veri sayısını buluyoruz
    $toplam = $db->getValue("SELECT COUNT(*) FROM settings n WHERE n.trash != 1");
    return $toplam;
}


function arama_toplam_veri($arama_kelime, $sql)
{
    global $db;

    $sql2 = "SELECT COUNT(*) FROM settings n 
        INNER JOIN languages c ON n.lang_id = c.id
    WHERE n.trash != 1 " . $sql;

    $toplam = $db->getValue($sql2);
    return $toplam;
}
