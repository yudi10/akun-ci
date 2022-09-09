<?php

namespace App\Controllers;

// use App\Models\ModelAkun3;
// use App\Models\ModelStatus;

use App\Models\ModelNilai;
use App\Models\ModelTransaksi;
use CodeIgniter\RESTful\ResourceController;

class Transaksi extends ResourceController
{
    // protected $format    = 'json';

    function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->objTransaksi = new ModelTransaksi();
        $this->objNilai = new ModelNilai();
        
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data['dttransaksi'] = $this->objTransaksi->findAll();
        return view('transaksi/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {

        return view('transaksi/new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data1 = [
            'kwitansi' => $this->request->getVar('kwitansi'),
            'tanggal' => $this->request->getVar('tanggal'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'ketjurnal' => $this->request->getVar('ketjurnal'),
        ];
        $this->db->table('tb_transaksi')->insert($data1); //simpan data tbl_transaksi

        $id_transaksi = $this->objTransaksi->insertID();
        $kode_akun3 = $this->request->getVar('kode_akun3');
        $debit = $this->request->getVar('debit');
        $kredit = $this->request->getVar('kredit');
        $id_status = $this->request->getVar('id_status');

        for ($i=0; $i < count($kode_akun3) ; $i++) { 
            $data2[] = [
                'id_transaksi' => $id_transaksi,
                'kode_akun3' => $kode_akun3[$i],
                'debit' => $debit[$i],
                'kredit' => $kredit[$i],
                'id_status' => $id_status[$i],
            ];
        }

        $this->objNilai->table('tbl_transaksi')->insertBatch('$data2');
        return redirect()->to(site_url('transaksi'))->with('success', 'Data berhasil disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->objTransaksi->where(['id_transaksi' => $id])->delete();
        return redirect()->to(site_url('transaksi'))->with('success', 'Data berhasil dihapus');
    }

    public function akun3()
    {
        $akun3 = model(ModelAkun3::class);
        $result = $akun3->findAll();
        return $this->response->setJSON($result);
    }

    public function status()
    {
        $status = model(ModelStatus::class);
        $result = $status->findAll();
        return $this->response->setJSON($result);
    }
}
