<?php
include '../../ajax.php';

$system = System::getInstance();

$table_name         = 'contact';
$module_name        = 'contact';

// Eğer ajax isteği yapılmışsa burayı çalıştır
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    
    if(!is_numeric($_COOKIE['user_id']))
    {
        header("HTTP/1.0 404 Not Found"); exit();
    }
    
    $ip_address = (isset($_SERVER["HTTP_CF_CONNECTING_IP"]) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER['REMOTE_ADDR']);
    $key        = sha1($config->get('SECRET_KEY').$ip_address.session_id());

    if ($_COOKIE['user_id']=="0")
    {
        $sql        = "SELECT COUNT(*) FROM users WHERE token = '".$key."' AND id =".$_COOKIE['user_id']." AND ip_address = '".$ip_address."' AND status > 0 AND trash = 1";
    }
    else
    {
        $sql        = "SELECT COUNT(*) FROM users WHERE token = '".$key."' AND id =".$_COOKIE['user_id']." AND ip_address = '".$ip_address."' AND status > 0 AND trash != 1";
    }
    
    if($db->getValue($sql) == 0)
    {
        header("HTTP/1.0 404 Not Found"); exit();
    }

    // Listelenecek kolonlar
    $columns            = array("id", "fullname", "email", "message", "created"); 
    $columns_list       = array("n.id", "n.fullname", "n.email", "n.message", "n.created"); 
    
    $search_text        =  isset($_POST["search"]["value"]) ? $_POST["search"]["value"] : ''; //Eğer boş değilse eklentinin arama kısmından yollanan değeri alıyoruz.
    $sort               =  isset($_POST["order"]) ? $_POST["order"] : ''; // Eğer boş değilse eklentinin sıralama kısmından yollanan değeri alıyoruz.
    $length             =  isset($_POST["length"]) ? $_POST["length"] :'' ; // Eğer boş değilse eklentinin sayfada kaç veri gösterileceği kısmından yollanan değeri alıyoruz.
    $limit              =  isset($_POST["start"]) ? $_POST["start"] :'' ; // Eğer boş değilse eklentinin kaçıncı veriden itibaren başlayıcağı değeri alıyoruz.
    
    //  SQL Srogusu
    $sql = "SELECT n.id, n.fullname, n.email, n.message, n.created FROM $table_name n ";

    $total_filter_data  = total_data(); // Eğer filtreleme işlemi yapılmazsa filtrelenmiş veri sayısını toplam veri sayısına eşitle
    
    // Eğer arama_kelime değişkeni boş değilse yani arama yapılmışsa
    if(!empty($search_text))  
    {
        $search_sql = "WHERE (";
        $search_index = 0;
        
        foreach ($columns_list as $col) { 
            
            // Kolonlar dizisindeki elemanların hepsini arama işlemi şeklinde sql cümlesine ekliyoruz.
            if($search_index == 0)
                $search_sql .= $col." LIKE '%".$search_text."%' ";
            else
                $search_sql .= " OR ".$col." LIKE '%".$search_text."%' ";
            
            $search_index++;
        }
        
        $search_sql .= ")";
        $sql .= $search_sql;
        $total_filter_data = search_total_data($search_sql); // Arama yaptıktan sonra toplam kaç veri olduğunu buluyoruz.
    }

    if(!empty($sort))   // Eğer siralama değişkeni boş değilse yani sıralama yapılmışsa
    {
        // Sıralamadan seçilen değeri kolonlar dizimize yollayarak o değerdeki kolona göre sıralama yapıyoruz
        $sql .= "ORDER BY ".$columns[$sort['0']['column']]." ".strtoupper($sort['0']['dir'])." ";
    }else{
        // Eğer sıralama işlemi yapılmamışsa varsayılan olarak icerik_id kolonuna göre sıralama yap
        $sql .= "ORDER BY n.id DESC ";
    }

    if($length != 1)
    {
        // Sayfalama işlemini yapıyoruz
        $sql .= "LIMIT ".$limit.",".$length;
    }

    $s = $db->getRows($sql); 
    $data = array();
    
    if($s['num'] > 0)
    {
        $datalist = $s['row'];
        
        foreach($datalist as $datas){
            $new_data = array();
            foreach ($columns as $col) {
                $new_data[] = $datas[$col];
            }

            $data[] = $new_data; // Her seferinde oluşan dizimizi data değişkenine depoluyoruz	
        }
    }
    

    $output = array(
        "draw"    => intval($_POST["draw"]),
        "recordsTotal"  => total_data(), // Toplam tablodaki veri sayımızı ekle
        "recordsFiltered" => $total_filter_data, // Toplam filtrelenmiş veri sayısını ekle
        "data"    => $data // Verileri depoladığımız değişkeni ekle
    );
    echo json_encode($output);  // Json çıktısı ver

}
else
{
    header("HTTP/1.0 404 Not Found"); exit();
}

function total_data()
{
    global $db;
    // Tablomuz içerisindeki toplam veri sayısını buluyoruz
    $toplam = $db->getValue("SELECT COUNT(*) FROM contact n"); 
    return $toplam; 
}


function search_total_data($sql)
{
    global $db;
    
    $sql2 = "SELECT COUNT(*) FROM contact n ".$sql;
    $total = $db->getValue($sql2);
    return $total;
}

?>