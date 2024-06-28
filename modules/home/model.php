<?php
class M_home extends Model
{

    public function getSlides()
    {
        $sql = "SELECT * FROM slides WHERE status > 0 AND trash != 1 ORDER BY sort";
        return $this->db->getRows($sql);
    }

    public function getGallery()
    {
        $sql = "SELECT * FROM images WHERE status > 0 AND trash != 1 AND module = 'gallery' ORDER BY sort";
        return $this->db->getRows($sql);
    }

    public function getBacker()
    {
        $sql = "SELECT * FROM backer WHERE status > 0 AND trash != 1 ORDER BY sort ASC LIMIT 8";
        return $this->db->getRows($sql);
    }

    public function getPartner()
    {
        $sql = "SELECT * FROM partner WHERE status > 0 AND trash != 1 ORDER BY sort ASC LIMIT 8";
        return $this->db->getRows($sql);
    }

    public function getYoutube($lang_id)
    {
        $sql = "SELECT * FROM youtube WHERE lang_id = $lang_id AND status > 0 AND trash != 1 ORDER BY sort ASC";
        return $this->db->getRows($sql);
    }

    public function getNews($lang_id)
    {
        $sql = "select p.* from news p WHERE p.lang_id = $lang_id and p.status > 0 and p.trash != 1 ORDER BY p.sort ASC LIMIT 4";
        return $this->db->getRows($sql);
    }

    public function getTestimonials($lang_id)
    {
        $sql = "SELECT t.id, s.title, t.text, s.jobs, s.company, s.company_url, s.image FROM testimonials t 
            INNER JOIN speakers s ON s.id = t.speakers_id
        WHERE t.lang_id = $lang_id AND t.status > 0 AND t.trash != 1 ORDER BY t.sort ASC";

        return $this->db->getRows($sql);
    }

    public function getSpeakers($lang_id)
    {
        $sql = "select p.*, r.slug, sc.title as category from speakers p left join routes r on p.id = r.did left join speakers_category sc on p.category_id = sc.id where r.lang_id = $lang_id AND r.mod = 'speakers' AND r.met = 'detail' AND p.status > 0 and p.trash != 1 ORDER BY p.sort ASC LIMIT 8";
        return $this->db->getRows($sql);
    }

    public function getAllPages()
    {
        $sql = "select p.*, r.slug from pages p inner join routes r on p.id = r.did where r.mod = 'pages' AND r.met = 'detail' AND p.status > 0 and p.trash != 1 ORDER BY p.id DESC";
        return $this->db->getRows($sql);
    }

    public function getSettings($lang_id)
    {
        $sql = "SELECT * FROM settings WHERE lang_id = $lang_id AND status > 0 AND trash != 1";
        return $this->db->getRow($sql);
    }

    public function getSearchResults($q, $lang_id)
    {
        $data = [
            'row' => [],
            'num' => 0
        ];

        $sessions = $this->db->getRows("SELECT s.title, r.slug FROM sessions s 
            INNER JOIN routes r ON r.did = s.id
        WHERE ( s.title LIKE '%" . $q . "%' OR  s.area LIKE '%" . $q . "%' OR s.hall LIKE '%" . $q . "%' OR s.spot LIKE '%" . $q . "%' OR s.detail LIKE '%" . $q . "%' ) AND s.lang_id = $lang_id AND s.status > 0 AND s.trash != 1 AND s.break_time != 0 AND r.mod = 'sessions' ORDER BY s.sdate ASC");

        $speakers = $this->db->getRows("SELECT s.title, r.slug FROM speakers s 
            INNER JOIN routes r ON r.did = s.id
        WHERE ( s.title LIKE '%" . $q . "%' OR  s.jobs LIKE '%" . $q . "%' OR s.company LIKE '%" . $q . "%' OR s.spot LIKE '%" . $q . "%' OR s.detail LIKE '%" . $q . "%' ) AND s.lang_id = $lang_id AND s.status > 0 AND s.trash != 1 AND r.mod = 'speakers' ORDER BY s.created ASC");

        $data = array_merge($data, $sessions);
        foreach ($speakers['row'] as $speaker) {
            $data['row'][] = $speaker;
            $data['num']++;
        }

        return $data;
    }

    public function getIndexMenu($lang)
    {
        $sql = "SELECT r.slug as rslug, r.title FROM routes r
            LEFT JOIN languages l ON r.lang_id = l.id 
        WHERE l.id = '" . $lang . "' AND r.met = 'index' ORDER BY r.sort ASC";

        return $this->db->getRows($sql);
    }

    public function getPagesMenu($lang)
    {
        $sql = "SELECT r.slug as rslug, r.title FROM routes r
            LEFT JOIN languages l ON r.lang_id = l.id 
        WHERE l.id = '" . $lang . "' AND r.mod = 'pages' AND r.met = 'detail' ORDER BY r.sort ASC";

        return $this->db->getRows($sql);
    }
}
