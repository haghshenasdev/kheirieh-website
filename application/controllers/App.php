<?php

use function PHPUnit\Framework\isNull;

defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper("url");
        $this->load->view('pwaui/App_view');
    }
    public function getposthtml()
    {
        if (isset($_GET['url']) || !isNull($_GET['url']) ) {
            echo file_get_contents($_GET['url']);
            echo "
            <script>
            document.getElementById('masthead').remove();
            document.getElementById('secondary').remove();
            document.getElementById('colophon').remove();
            </script>
            ";
        }
        
    }
}

/* End of file App.php and path \application\controllers\app\App.php */
