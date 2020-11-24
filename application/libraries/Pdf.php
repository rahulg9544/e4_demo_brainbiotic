<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
    public function Header() {
        // Logo
        // $image_file = K_PATH_IMAGES.'http://localhost/Taxi-final/assets/images/logo.png';
        $image =  '<?php echo base_url(); ?>/assets/images/logo.png';
       
        // $this->Image('http://localhost/Taxi-final/assets/images/logo.png', '', '', 77, 17, '', '', 'T', false, 200, '', false, false, 1, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 23);
        // Title
        // $this->Cell(7, 15, 'Online Shop', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 15, 'Online Shop', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */