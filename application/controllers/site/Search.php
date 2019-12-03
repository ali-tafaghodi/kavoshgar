<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('search/m_search');
    }
    function process(){
        $search = $this->input->post('search');

        $result=$this->m_search->search($search);
        if (count($result) > 0) {
            foreach ($result as $row) {
                ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url("site/blog/postdetail/categury/{$row['id']}/");?>"> <?php echo  $row['title'];?>    </a></li>
                <?php
            }
        }
        else {
            echo "موردی یافت نشد";
        }
    }

}
