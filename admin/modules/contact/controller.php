<?php
class C_contact extends AdminController{

    // Haber Yönetimi
    public function index() 
    {
        $this->load->view('contact', 'index', $this->data);
    }

    public function dataDownload() 
    {
        $results = $this->data['contact']    = $this->model->getDetail();

        if (empty($this->data['contact']['row'])) {
            $this->msg->add('w', 'İletişim kaydı bulunamamıştır.');
            $this->system->route('admin', 'contact');
        } else {

            $header = [];
            $excel = [];
            $i = 0;
            for($i = 0; $i < $results["num"]; $i++){
                $row = $results["row"][$i];

                //var_dump($row);

                // Add custom field headers if row index is zero
                if ($i == 0){

                    // Add header to excel
                    array_push($header, 'ADI SOYADI');
                    array_push($header, 'EMAIL');
                    array_push($header, 'MESAJ');
                    array_push($header, 'TARIH');

                    // Add header to excel
                    array_push($excel, $header);

                }
                //var_dump($header);

                // Add values as row
                $excRow = [];
                array_push($excRow, $row["fullname"]);
                array_push($excRow, $row["email"]);
                array_push($excRow, $row["message"]);
                array_push($excRow, $row["created"]);

                array_push($excel, $excRow);
            }
            //print_r($excel); exit;
            
            $xlsx = SimpleXLSXGen::fromArray($excel);
            $xlsx->downloadAs('IletisimFormu.xlsx'); // or downloadAs('books.xlsx') or $xlsx_content = (string) $xlsx 
        }
    }
}