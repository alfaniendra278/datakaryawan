<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Karyawan extends CI_Controller{
		function __construct() 
		{
			parent::__construct();
			// meload 
			$this->load->model(array('m_karyawan'));
		}

		public function index()
		{
			$data['ci_karyawan'] = $this->m_karyawan->view();

			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/topbar');
			$this->load->view('v_karyawan', $data);
			$this->load->view('template/footer');
		}

		public function form_insert()
		{
     		$this->load->view('template/header2');
			$this->load->view('template/sidebar2');
			$this->load->view('template/topbar2');
			$this->load->view('v_tambah');
			$this->load->view('template/footer2');
		}

		public function insert()
		{
     
    		$this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[3]|max_length[45]');
    		$this->form_validation->set_rules('induk', 'induk', 'trim|required|min_length[3]|max_length[45]');
    		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required|min_length[4]|max_length[45]');
    		$this->form_validation->set_rules('dateadd', 'dateadd', 'trim|required|min_length[10]|max_length[20]');
    		$this->form_validation->set_rules('status', 'status', 'trim|required|max_length[1]');
     
    		if ($this->form_validation->run() == TRUE) 
     		{
     			if($this->m_karyawan->input())
            	{
            		$this->session->set_flashdata('pesan','Add data succesfuly!');
            		redirect('karyawan','refresh');
            	}
     		} else 
     		{
        		$this->load->view('template/header2');
				$this->load->view('template/sidebar2');
				$this->load->view('template/topbar2');
				$this->load->view('v_tambah');
				$this->load->view('template/footer2');
            }

		}

		public function edit()
		{
			$data['tmp']=$this->m_karyawan->m_edit()->row();
			$this->load->view('template/header3');
			$this->load->view('template/sidebar');
			$this->load->view('template/topbar');
    		$this->load->view('v_edit', $data);
			$this->load->view('template/footer');
		}

		public function update()
		{
			$this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[3]|max_length[45]');
    		$this->form_validation->set_rules('induk', 'induk', 'trim|required|min_length[3]|max_length[45]');
    		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required|min_length[4]|max_length[45]');
    		$this->form_validation->set_rules('dateadd', 'dateadd', 'trim|required|min_length[10]|max_length[20]');
    		$this->form_validation->set_rules('status', 'status', 'trim|required|max_length[1]');
      
      		if ($this->form_validation->run() == TRUE) 
      		{
		 		if($this->m_karyawan->m_update())
		 		{
                	$this->session->set_flashdata('pesan','Update data succesfuly!');
                	redirect('/','refresh');
	      		}else
	      		{
	   	        	$this->session->set_flashdata('pesan','Update data failed');
                	redirect('/','refresh');
	            }
			}else
			{
	  			$data['tmp']=$this->m_karyawan->m_edit()->row();
				$this->load->view('template/header3');
				$this->load->view('template/sidebar');
				$this->load->view('template/topbar');
    			$this->load->view('v_edit', $data);
				$this->load->view('template/footer');
	       }
	    }

  		public function delete()
		{
        	if($this->m_karyawan->delete())
        	{
            	$this->session->set_flashdata('pesan','Delete data succesfuly!');
            	redirect('karyawan','refresh');
        	}else
        	{
            	$this->session->set_flashdata('pesan','Delete data failed');
            	redirect('karyawan','refresh');
        	}
		}

		public function cetak()
		{
			ob_start();
			$data['ci_karyawan'] = $this->m_karyawan->view_row();
			$this->load->view('print', $data);
			$html = ob_get_contents();
        	ob_end_clean();
        
        	require_once('./assets/html2pdf/html2pdf.class.php');
			$pdf = new HTML2PDF('P','A4','en');
			$pdf->WriteHTML($html);
			$pdf->Output('Data Karyawan.pdf', 'D');
		}

		public function export(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Alfan Indra')
							   ->setLastModifiedBy('Alfan Indra')
							   ->setTitle("Data Karyawan")
							   ->setSubject("Karyawan")
							   ->setDescription("Laporan Semua Data Karyawan")
							   ->setKeywords("Data Karyawan");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA KARYAWAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai F1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "INDUK"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "MASUK"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "STATUS"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$ci_karyawan = $this->m_karyawan->view();

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($ci_karyawan as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->k_name);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->k_induk);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->k_alamat);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->k_dateadd);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->k_status);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom F
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Karyawan");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Karyawan.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
	}