<?php if (!defined('RUN')) {
    header("HTTP/1.0 404 Not Found");
    exit();
}
class Model
{
    private static $instance = null;
    public $db = null;
    public $system;
    public $config;
    public $msg;
    public $settings;
    public $lang;

    private function __construct()
    {
        global $db; // Global database connection
        $this->db       = $db; // Assigning database connection
        $this->config   = Config::getInstance(); // Getting configuration instance
        $this->system   = System::getInstance(); // Getting system instance
        $this->msg      = Messages::getInstance(); // Getting messages instance
        $this->lang     = Lang::getInstance()->lang; // Getting current language
    }

    /**
     * Get singleton instance of Model.
     *
     * @param string $classname Name of the class to instantiate
     * @return Model Singleton instance of Model class
     */
    public static function getInstance($classname)
    {
        if (!self::$instance instanceof $classname) {
            self::$instance = new $classname; // Creating new instance if not already instantiated
        }
        return self::$instance; // Returning singleton instance
    }

    public function getSetting($lang_id)
    {
        $sql = "SELECT * FROM settings WHERE id = $lang_id"; // SQL query to fetch settings
        return $this->db->getRow($sql); // Executing query and returning row
    }

    public function getLanguageDetail()
    {
        $sql = "SELECT * FROM languages WHERE keywords = '" . $_SESSION['lang'] . "'"; // Escaping session language value
        return $this->db->getRow($sql); // Executing query and returning row
    }

    /**
     * Save application data.
     *
     * @param array $arr Array of form data
     * @return string Status message ('submission_success', 'email_exists', 'submission_error')
     */
    public function saveApp($arr)
    {
        extract($arr); // Extracting form data variables

        $email_control = $this->db->getValue("SELECT COUNT(*) FROM contact WHERE email='" . trim($cf_email) . "'"); // Getting count of matching emails
        if ($email_control > 0) {
            return 'email_exists'; // Returning message if email already exists
        }

        // Constructing SQL query to insert contact form data
        $sql = "
                INSERT INTO contact 
                (
                    fullname,
                    email,
                    message,created
                ) 
                VALUES
                (
                    '" . $cf_name . "',
                    '" . $cf_email . "',
                    '" . $cf_message . "',
                    NOW()
                )
                ";

        // Executing SQL query and returning appropriate message based on success
        if ($this->db->query($sql)) {
            return 'submission_success'; // Returning success message if query executed successfully
        } else {
            return 'submission_error'; // Returning error message if query execution failed
        }
    }
}
