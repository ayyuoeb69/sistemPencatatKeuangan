<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Excel extends CI_Controller {

// Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Perhari_model');
	}
	public function export_perhari()
	{

		$tampil=$this->Perhari_model->show();
		$modals = $this->Perhari_model->modals();
		$spreadsheet = new Spreadsheet();


		$spreadsheet->getProperties()->setCreator("Anita")
		->setLastModifiedBy("Anita")
		->setTitle("Laporan Keuangan Harian")
		->setSubject("Laporan Keuangan Harian")
		->setDescription("Laporan Keuangan Harian")
		->setKeywords("Laporan Keuangan Harian")
		->setCategory("Laporan Keuangan Harian");

		$spreadsheet->setActiveSheetIndex(0);
		$spreadsheet->getActiveSheet()->mergeCells('A1:H1')->setCellValue('A1', 'Laporan Keuangan Harian ');
		$spreadsheet->getActiveSheet()->setCellValue('A2', "No")
		->setCellValue('B2', "Tanggal")
		->setCellValue('C2', "Keterangan")
		->setCellValue('D2', "Referensi")
		->setCellValue('E2', "Pendapatan")
		->setCellValue('F2', "Pengeluaran")
		->setCellValue('G2', "Profit")
		->setCellValue('H2', "Saldo");
		$spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(25);   
		$spreadsheet->getActiveSheet()->getRowDimension('2')->setRowHeight(35);
		$spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(25);
		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(49);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(29);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(29);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(29);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(29);


		$styleArray = [
			'font' => [
				'bold' => true,
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
				'wrapText' => true,
			],
			'borders' => [
				'top' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
				'left' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
				'bottom' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
				'right' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],

		];
		$styleArray4 = [
			'alignment' => [
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
			],
		];
		$spreadsheet->getActiveSheet()->getStyle('A1:H1')->applyFromArray($styleArray4);
		$spreadsheet->getActiveSheet()->getStyle('A2')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('B2')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('C2')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('D2')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('E2')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('F2')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('G2')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('H2')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('A2:H2')->getFill()
		->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		->getStartColor()->setARGB('FFEEEEEE');
		$l =count($tampil);
		$m = count($tampil);
		$saldo[$l] = 0; 
		$i = 1;
		for($k = count($tampil)-1; $k >= 0 ; $k-- ){
			$saldo[$k] = (  $saldo[$k+1] + $tampil[$k]->pendapatan ) - $tampil[$k]->pengeluaran;
			$m--;
		}
		$pendapatan = 0;
		$pengeluaran = 0;
		$profits = 0;
		$x=3;$no=1; for($j = 0; $j < count($tampil); $j++ ){
			$profit = $tampil[$j]->pendapatan - $tampil[$j]->pengeluaran;
			$spreadsheet->getActiveSheet()->getRowDimension($i)->setRowHeight(15);
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$x, $no)
			->setCellValue('B'.$x, date('d M Y', strtotime($tampil[$j]->tgl_perhari)))
			->setCellValue('C'.$x,$tampil[$j]->keterangan)
			->setCellValue('D'.$x, $tampil[$j]->referensi)
			->setCellValue('E'.$x, 'Rp. '.$tampil[$j]->pendapatan)
			->setCellValue('F'.$x,	'Rp. '.$tampil[$j]->pengeluaran)
			->setCellValue('G'.$x, 'Rp. '.$profit)
			->setCellValue('H'.$x, 'Rp. '.$saldo[$j]);
			$styleArray2 = [
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
					'wrapText' => true,
				],
				'borders' => [
					'top' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					],
					'left' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					],
					'bottom' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					],
					'right' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					],
				],
			];
			$styleArray3 = [
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
				],
				'borders' => [
					'top' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					],
					'left' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					],
					'bottom' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					],
					'right' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					],
				],
			];
			$spreadsheet->getActiveSheet()->getStyle('A'.$x)->applyFromArray($styleArray3);
			$spreadsheet->getActiveSheet()->getStyle('B'.$x)->applyFromArray($styleArray2);
			$spreadsheet->getActiveSheet()->getStyle('C'.$x)->applyFromArray($styleArray2);
			$spreadsheet->getActiveSheet()->getStyle('D'.$x)->applyFromArray($styleArray3);
			$spreadsheet->getActiveSheet()->getStyle('E'.$x)->applyFromArray($styleArray2);
			$spreadsheet->getActiveSheet()->getStyle('F'.$x)->applyFromArray($styleArray2);
			$spreadsheet->getActiveSheet()->getStyle('G'.$x)->applyFromArray($styleArray2);
			$spreadsheet->getActiveSheet()->getStyle('H'.$x)->applyFromArray($styleArray2);
			
			$pendapatan = $pendapatan + $tampil[$j]->pendapatan;
			$pengeluaran = $pengeluaran + $tampil[$j]->pengeluaran;
			$profits = $profits+ $profit;
			$x++;
			$no++;
		}

		$z = $x;
		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('E'.$z, 'Rp. '.$pendapatan)
			->setCellValue('F'.$z,	'Rp. '.$pengeluaran)
			->setCellValue('G'.$z,	'Rp. '.$profits);
		$spreadsheet->getActiveSheet()->mergeCells('A'.$z.':D'.$z)->setCellValue('A'.$z, 'Jumlah ');
		$spreadsheet->getActiveSheet()->getStyle('A'.$z.':D'.$z)->applyFromArray($styleArray3);
		$spreadsheet->getActiveSheet()->getStyle('E'.$x)->applyFromArray($styleArray2);
		$spreadsheet->getActiveSheet()->getStyle('F'.$x)->applyFromArray($styleArray2);
		$spreadsheet->getActiveSheet()->getStyle('G'.$x)->applyFromArray($styleArray2);
		$spreadsheet->getActiveSheet()->getStyle('H'.$x)->applyFromArray($styleArray2);
		$spreadsheet->getActiveSheet()->setTitle('Laporan Keuangan'.date('d-m-Y H'));
		$spreadsheet->getActiveSheet()->getStyle('A'.$z.':H'.$z)->getFill()
		->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
		->getStartColor()->setARGB('f8fbd9');
		$spreadsheet->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Laporan Keuangan.xls"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');

		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: cache, must-revalidate');
		header('Pragma: public');

		$writer = IOFactory::createWriter($spreadsheet, 'Xls');
		$writer->save('php://output');
		exit;
	}

}