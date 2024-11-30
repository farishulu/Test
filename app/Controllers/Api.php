<?php

namespace App\Controllers;
use App\Models\FilmModel;

use CodeIgniter\RESTful\ResourceController;

class Api extends ResourceController
{
    public function GenreFilm()
    {
        $filmModel = new FilmModel();
        $data = $filmModel->findAll();

        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Film not found');
        }
    }

    public function findGenre()
    {
        $genre = $this->request->getGet('genre');
        if (!$genre) {
            return $this->fail('harus diisi parameter genre');
        }
        $filmModel = new FilmModel();
        $data = $filmModel->where('genre', $genre)->findAll();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('tidak ada film ' . $genre);
        }
    }
    public function hitungLuas()
    {
        $data = $this->request->getJSON();
        if (!isset($data->panjang) || !isset($data->lebar)) {
            return $this->failValidationError('Parameter "panjang" dan "lebar" harus diisi');
        }
        $panjang = $data->panjang;
        $lebar = $data->lebar;

        $luas = $panjang * $lebar;

        return $this->respond(['luas' => $luas]);
    }

    public function simpanPesan()
    {
        $data = $this->request->getJSON();
        if (!isset($data->pesan)) {
            return $this->failValidationError('pesan harus diisi');
        }

        $pesan = $data->pesan;
        $file = WRITEPATH . 'pesan.txt';
        if (file_put_contents($file, $pesan . PHP_EOL, FILE_APPEND)) {
            return $this->respond(['status' => 'sukses']);
        } else {
            return $this->failServerError('status : gagal');
        }
    }

    public function tampilkanTanggalWaktu()
    {
        $tanggalWaktu = date('Y-m-d H:i:s');
        return $this->respond(['tanggal_waktu' => $tanggalWaktu]);
    }

    public function Menyapa()
    {
        $nama = $this->request->getGet('nama');
        if (!$nama) {
            return $this->failValidationError('Parameter "nama" harus diisi');
        }
        $sapa = "Halo, $nama Selamat datang!!.";
        return $this->respond($sapa);
    }
}