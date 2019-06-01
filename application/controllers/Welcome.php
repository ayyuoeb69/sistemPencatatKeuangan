<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 public function __construct()
  {
    parent::__construct();
    $this->load->model('Perhari_model');

  }
	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}
		public function modals()
	{
		$data['modals']=$this->Perhari_model->modals();
		$this->load->view('header');
		$this->load->view('modals', $data);
		$this->load->view('footer');
	}
	public function perhari()
	{
		$data['modals']=$this->Perhari_model->modals();
		$data['tampil']=$this->Perhari_model->show();
		$this->load->view('header');
		$this->load->view('perhari', $data);
		$this->load->view('footer');
	}
	public function akumulasi()
	{
		$this->load->view('header');
		$this->load->view('akumulasi');
		$this->load->view('footer');
	}
	public function tambah_perhari(){
		  if($this->Perhari_model->tambah() === true){
		   echo "
		   <script>
		   alert('Data Berhasil Ditambahkan');
		   window.location.href = '" . base_url() . "Welcome/perhari/';
		   </script>
		   ";
		 }else{
		  ?>
		  <script>

		    alert('Gagal Menambahkan');

		    history.go(-1);

		  </script>
		  <?php
		}
	}
	public function cari_data(){
		 $data=$this->Perhari_model->show();
		 echo json_encode($data);
	}
	public function tambah_modal(){
		  if($this->Perhari_model->tambah_modal() === true){
		   echo "
		   <script>
		   alert('Data Berhasil Diganti');
		   window.location.href = '" . base_url() . "Welcome/modals/';
		   </script>
		   ";
		 }else{
		  ?>
		  <script>

		    alert('Gagal Mengganti');

		    history.go(-1);

		  </script>
		  <?php
		}
	}
	public function edit_perhari($id){
		$data['tampil']=$this->Perhari_model->show_id($id);
		$this->load->view('header');
		$this->load->view('edit_perhari', $data);
		$this->load->view('footer');
	}
	public function proses_edit_perhari($id){
		  if($this->Perhari_model->edit($id) === true){
		   echo "
		   <script>
		   alert('Data Berhasil Diedit');
		   window.location.href = '" . base_url() . "Welcome/perhari/';
		   </script>
		   ";
		 }else{
		  ?>
		  <script>

		    alert('Gagal Mengedit');

		    history.go(-1);

		  </script>
		  <?php
		}
	}
	public function hapus_perhari($id){
		  if($this->Perhari_model->hapus($id) === true){
		   echo "
		   <script>
		   alert('Data Berhasil Dihapus');
		   window.location.href = '" . base_url() . "Welcome/perhari/';
		   </script>
		   ";
		 }else{
		  ?>
		  <script>

		    alert('Gagal Menghapus');

		    history.go(-1);

		  </script>
		  <?php
		}
	}
	public function cetak($bln, $thn){    
		ob_start();      
		$data['tampil']=$this->Perhari_model->show();
		$data['bln']=$bln;
		$data['thn']=$thn;
		$this->load->view('print', $data);    
		$html = ob_get_contents();        
		ob_end_clean();                
		require_once('./assets/html2pdf/html2pdf.class.php');    
		$pdf = new HTML2PDF('P','A4','en');   

 $pdf->setTestTdInOnePage(false); 
		$pdf->setDefaultFont('Arial');
		$pdf->WriteHTML($html);    
		$pdf->Output('Laporan Keuangan.pdf', 'D');  
	}
}
