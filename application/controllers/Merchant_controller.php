<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Merchant_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Merchant_model");
    }

    
    public function index()
    {

        $title["title"] = "List Data Merchant";

        $title_name["title_name"] = "Administrator";
        
        $data["data_merchant"] = $this->Merchant_model->getAll();
        
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $title_name);
        $this->template->load('templates/sidebar','templates/admin/merchant/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $Merchant = $this->Merchant_model; 
        $validation = $this->form_validation; 
        $validation->set_rules($Merchant->rules());
        if ($validation->run()) {
            $Merchant->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Master Merchant Berhasil Disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('merchant_controller');
        }

        $title["title"] = "Tambah Data Merchant";

        $data["title_name"] = "Administrator";


        // City

        $data['city'] = $this->Merchant_model->getcity()->result();

        
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $data);
        $this->template->load('templates/sidebar','templates/admin/merchant/add', $data );
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('merchant');

        $Merchant = $this->Merchant_model;
        $validation = $this->form_validation;
        $validation->set_rules($Merchant->rules());

        if ($validation->run()) {
            $Merchant->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Merchant Berhasil Diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('merchant_controller');
        }

        $title["title"] = "Edit Data Merchant";

        $title_name["title_name"] = "Administrator";


        $data["data_merchant"] = $Merchant->getById($id);
        
        // City

        $data['city'] = $this->Merchant_model->getcity()->result();

        if (!$data["data_merchant"]) show_404();
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $data);
        $this->template->load('templates/sidebar','templates/admin/merchant/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('merchant_id');
        if (!isset($id)) show_404();
        $this->Merchant_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Merchant Berhasil Dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }

    public function export(){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = [
          'font' => ['bold' => true], // Set font nya jadi bold
          'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ],
          'borders' => [
            'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
            'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
            'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
            'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
          ]
        ];
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
          'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ],
          'borders' => [
            'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
            'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
            'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
            'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
          ]
        ];
        $sheet->setCellValue('A1', "DATA MERCHANT"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B3', "MERCHANT NAME"); // Set kolom B3 dengan tulisan "NIS"
        $sheet->setCellValue('C3', "CITY"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('D3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('E3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"
        $sheet->setCellValue('F3', "EXPIRED DATE"); // Set kolom E3 dengan tulisan "ALAMAT"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        $sheet->getStyle('F3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $merchant = $this->Merchant_model->getAll();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($merchant as $data){ // Lakukan looping pada variabel siswa
          $sheet->setCellValue('A'.$numrow, $no);
          $sheet->setCellValue('B'.$numrow, $data->merchant_name);
          $sheet->setCellValue('C'.$numrow, $data->name);
          $sheet->setCellValue('D'.$numrow, $data->address);
          $sheet->setCellValue('E'.$numrow, $data->phone);
          $sheet->setCellValue('F'.$numrow, $data->expired_date);
          
          // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
          $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
          
          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $sheet->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $sheet->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $sheet->getColumnDimension('F')->setWidth(30); // Set width kolom E
        
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Laporan Data Merchant");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Merchant.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
      }
}