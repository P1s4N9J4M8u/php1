<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

use Illuminate\Validation\Rule;

use App\Models\Jabatan;

use App\Models\Bagian;

class PrinterController extends Controller
{
    // menampilkan tabel Jabatan lengkap dengan data jabatannya
	
	public function file1() {
		
		$koneksi = 'pgsql';
		
		$jabatans = DB::connection($koneksi)->table('printer.jabatans')->get();
		
		return view('printer.file1',compact('jabatans'));
		
	}
	
	public function file2() {
		
		$koneksi = 'pgsql';
		
		$jabatans = DB::connection($koneksi)->table('printer.jabatans')->get();
		
		return view('printer.file2',compact('jabatans'));
	}
	
	
	public function file3() {
		
		$koneksi = 'pgsql';
		
		$jabatans = DB::connection($koneksi)->table('printer.jabatans')->get();
		
		return view('printer.file3',compact('jabatans'));
		
	}
	
	
	
	public function file4() {
		
		$koneksi = 'pgsql';
		
		$jabatans = DB::connection($koneksi)->table('printer.jabatans')->get();
		
		return view('printer.file4',compact('jabatans'));
	}
	
	
	
	
	
	// ini untuk simpan data jabatanan
	
	public function simpanjabatan(Request $request) {
		
		// Validasi input dengan validator
		
		$validator = \Validator::make($request->all(),[
			'idjabatan' => 'required|string|max:6',
			
			'kodejabatan' => 'required|nullable|max:4',
			
			'namajabatan' => 'required|nullable|max:255',
		]);
		
		
		// ** Cek apakah validasi gagal sebelum proses penyimpanan **
		
		if ($validator->fails()) {
			
			return response()->json([
			
				'success' => false,
				
				'errors' => $validator->errors()
			
			],422);
		}
		
		try {
			
			// Simpan ke Database
			
			$jabatan = Jabatan::create([
			
				'idjabatan' => $request->idjabatan,
				
				'kodejabatan' => $request->kodejabatan,
				
				'namajabatan' => $request->namajabatan,
			
			]);
			
			
			return response()->json([
			
				'success' => true,
				
				'message' => 'Data Berhasil Disimpan',
				
				'jabatan' => [
				
							'idjabatan' => $jabatan->idjabatan,
							
							'kodejabatan' => $jabatan->kodejabatan,
							
							'namajabatan' => $jabatan->namajabatan
					]
			
			],200);
			
		} catch(\Exception $e) {
			
			Log::error("Gagal Menyimpan data jabatan: " . $e->getMessage());
			
			return response()->json([
			
				'success' => false,
				
				'message' => 'Terjadi Kesalahan : ' . $e->getMessage()
			
			
			],500);
			
			
		}
		
	}
	
	
	
	
	// fungsi untuk update data melalui modal
	
	public function updatejabatan(Request $request) {
    $request->validate([
        'idjabatan' => 'required|string|max:6',
        'kodejabatan' => 'nullable|string|max:4',
        'namajabatan' => 'nullable|string|max:255',
    ]);

    $koneksi = 'pgsql';

    // Validasi manual ke database
    $cek = DB::connection($koneksi)
        ->table('printer.jabatans')
        ->where('idjabatan', $request->idjabatan)
        ->exists();

    if (! $cek) {
        return response()->json(['message' => 'ID Jabatan tidak ditemukan di database.'], 404);
    }

    try {
        DB::connection($koneksi)
            ->table('printer.jabatans')
            ->where('idjabatan', $request->idjabatan)
            ->update([
                'kodejabatan' => $request->kodejabatan,
                'namajabatan' => $request->namajabatan,
                'updated_at' => now(), // hanya jika kolom ini memang ada
            ]);

        return response()->json(['message' => 'Data Berhasil Diperbaharui']);

    } catch (\Exception $e) {
        Log::error("Gagal Update Jabatan : " . $e->getMessage());
        return response()->json(['message' => 'Gagal update: ' . $e->getMessage()], 500);
    }
}





	// fungsi untuk hapus data melalui tombol Hapus yang ada di form utama
	
	public function hapusjabatan(Request $request) {
		
		$request->validate(['idjabatan' => 'required|string|max:6',
		]);
		
		$koneksi = 'pgsql';
		
		
		// Cek apakah ID yang di maksud ada
		
		$cek = DB::connection($koneksi)
			->table('printer.jabatans')
			->where('idjabatan', $request->idjabatan)
			->exists();
			
			
		if (! $cek) {
			
			return response()->json(['message' => 'ID Jabatan tidak diketemukan'], 404);
		}
		
		
		try {
			
			DB::connection($koneksi)
			->table('printer.jabatans')
			->where('idjabatan', $request->idjabatan)
			->delete();
			
			return response()->json(['message' => 'Data Berhasil Di Hapus']);
			
		} catch (\Exception $e) {
			
			\Log::error('gagal Menghapus Data Jabatan : ' . $e->getMessage());
			
			return response()->json(['message' => 'Gagal Menghapus Data : ' . $e->getMessage()], 500);
		}
	}
	
	
	
	public function file5() {
		
		$koneksi = 'pgsql';
		
		$bagians = DB::connection($koneksi)->table('printer.bagians')->get();
		
		return view('printer.file5',compact('bagians'));
		
	}
	


}
