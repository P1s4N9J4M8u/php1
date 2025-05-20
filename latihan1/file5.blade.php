<!DOCTYPE HTML>

<html>

	<head>
	
		<meta charset="UTF-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
		<meta name="csrf-token" content="{{ csrf_token()}}">
		
		<meta name="referrer" content="no-referrer">
		
		<title>Data Bagian</title>
		
		
		<!-- Bootstrap 5.3 -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	
	
		<!-- Datatables -->
		<link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.bootstrap5.css">
		
		
		<!-- JQuery -->
		<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
		
		
		<!-- Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
		
		
		<!-- Datatables JS  -->
		
		<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
		
		
		<style>
		
		
			.dataTables_wrapper {
				
				width: 100%;
				overflow-x: auto;
				
			}
			
			table.datatable {
				
				min-width: 100%;
				white-space: nowrap;
			}
			
			.margin-tombolSimpan {
				
				margin-top: 20px;
				margin-bottom: 50px;
			}
		
			.margin-judulTabel {
				
				margin-bottom: 50px;
			}
		
		</style>
		
	
	</head>
	
	<body data-bs-theme="dark">
	
		<h1 class="margin-judulTabel">Form Input Data Bagian</h1>
	
		<!-- Pembuatan Form Input Terlebih Dahulu -->
		
		<div style="width: 1000px">
		
			<form id="jabatanForm">
			
				<div class="mb-3">
				
					<label for="idbagian" class="form-label">ID Bagian</label>
					
					<input type="text" class="form-control" id="idbagian" name="idbagian" placeholder="Isikan ID Bagian">
				
				</div>
				
				<div class="mb-3">
				
					<label for="kodebagian" class="form-label">Kode Bagian</label>
				
					<input type="text" class="form-control" id="kodebagian" name="kodebagian" placeholder="Isikan Kode Bagian">
				
				</div>
				
				<div class="mb-3">
				
					<label for="namabagian" class="form-label">Nama Bagian</label>
				
					<input type="text" class="form-control" id="namabagian" name="namabagian" placeholder="Isikan Nama Bagian">
				
				</div>
				
				
				<div class="mb-3">
				
					<label for="statusbagian" class="form-label">Status Bagian</label>
					
					<input type="text" class="form-control" id="statusbagian" name="statusbagian" placeholder="Isikan Status Bagian">
				
				</div>
				
				<button type="submit" class="btn btn-primary margin-tombolSimpan">Simpan Data</button>
				
			</form>
			
			<!-- Tabel Data -->
			
			<h1 class="margin-judulTabel">Tabel Data Bagian</h1>
			
			<div class="table-container table-dark">
			
				<table id="bagianTable" name="bagianTable" class="table table-striped table-bordered">
				
					<thead class="table-dark">
					
						<tr>
						
							<th>ID Bagian</th>
							
							<th>Kode Bagian</th>
							
							<th>Nama Bagian</th>
							
							<th>Status Bagian</th>
							
							<th>Pilihan Tindakan</th>
						
						</tr>
					
					
					</thead>
					
					<tbody>
					
						@foreach($bagians as $bagian)
						
						<tr>
						
							<td>{{ $bagians->idbagian }}</td>
						
						
						</tr>
						
						
						@endforeach
					
					
					
					</tbody>
				
				
				</table>
			
			
			
			</div>
		
		</div>
	
	</body>
	
</html>
