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
		
			<form id="bagianForm">
			
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
						
							<td>{{ $bagian->idbagian }}</td>
						
							<td>{{ $bagian->kodebagian }}</td>
							
							<td>{{ $bagian->namabagian }}</td>
							
							<td>{{ $bagian->statusbagian }}</td>
							
							<td>
							
								<button class="btn btn-warning btn-sm btn-edit" data-idbagian="{{ $bagian->idbagian }}" data-kodebagian="{{ $bagian->kodebagian }}" data-namabagian="{{ $bagian->namabagian }}" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
							
								<button class="btn btn-danger btn-sm btn-delete" data-idbagian="{{ $bagian->idbagian }}">Hapus</button>
							
							</td>
						
						</tr>
						
						
						@endforeach
					
					
					
					</tbody>
				
				
				</table>
			
			
			
			</div>
		
		</div>
		
		
		<!-- ditambahkan Modal Bootstrap Untuk Edit -->
		
		<div class="modal fade" id="editModal" tabindex="-1">
		
			<div class="modal-dialog modal-dialog-scrollable">
			
				<div class="modal-content">
				
					<!-- Bagian Header Modal -->
					
					<div class="modal-header">
					
						<h5 class="modal-title" id="editModalLabel">Edit Data Bagian</h5>
					
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					
					</div>
					
					<!-- Bagian Body Modal -->
					
					<div class="modal-body">
					
						<form id="formEditBagian">
						
							<!-- Untuk ID Bagian -->
						
							<div class="mb-3">
							
								<label for="modalidbagian" class="form-label">ID Bagian</label>
								
								<!-- readonly gunanya agar nilai di dalam textbox ini tidak bisa di ubah. dan bg-secondary text-white untuk mengesankan bahwa textbox ini di disable dari aktivitas edit data -->
								
								<input type="text" class="form-control bg-secondary text-white" id="modalidbagian" name="modalidbagian" placeholder="Isikan ID Bagian" readonly>
							
							
							</div>
							
							
							<!-- Untuk Kode Bagian -->
							
							<div class="mb-3">
							
								<label for="modalkodebagian" class="form-label">Kode Bagian</label>
							
								<input type="text" class="form-control" id="modalkodebagian" name="modalkodebagian" placeholder="Isikan Kode Bagian">
								
							</div>
							
							
							<!-- Untuk Nama Bagian  -->
							
							<div class="mb-3">
							
								<label for="modalnamabagian" class="form-label">Nama Bagian</label>
								
								<input type="text" class="form-control" id="modalnamabagian" name="modalnamabagian" placeholder="Isikan Nama Bagian">
							
							</div>
							
							
							
							<!-- Untuk Status Bagian -->
							
							<div class="mb-3">
							
								<label for="modalstatusbagian" class="form-label">Status Bagian</label>
							
								<input type="text" class="form-control" id="modalstatusbagian" name="modalstatusbagian" placeholder="Isikan Status Bagian">
								
							</div>
						
						</form>
					
					
					</div>
					
					<!-- Bagian Footer Modal -->
				
					<div class="modal-footer">
					
						<button type="button" class="btn btn-success" id="simpanDataBagian" name="simpanDataBagian">Simpan</button>
					
					</div>
				
				</div>
			
			
			
			</div>
		
		
		
		
		</div>
		
		
		<!-- Script JQuery -->
		
		<script>
		
			// ini source code untuk tampilkan Datatables .NET
			
			$(document).ready(function() {
				
				$('#bagianTable').DataTable({
					
					responsive: true,
					
					language: {
						
						url:"https://cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
					}
					
					
				});
				
				
				// Ini untuk form simpan data, simpan data menggunakan AJAX
				
				
				$('#bagianForm').on('submit',function (e) {
					
					e.preventDefault();	// Hindari reload halaman
					
					let formData = {
						
						idbagian: $('#idbagian').val(),
						kodebagian: $('#kodebagian').val(),
						namabagian: $('#namabagian').val(),
						statusbagian: $('#statusbagian').val(),
						
					};
					
					
					$.ajax({
						
						url:"{{ route('printer.simpanbagian')}}",
						
							type: "POST",
							contentType: "application/json",
							data: JSON.stringify(formData),
							headers: {"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')},
							success: function (response) {
								
								if(response.success) {
									
									alert(response.message);
									
									// tambahkan data baru ke tabel reload halaman
									
									let newRow =`

										<tr>
										
											<td>${response.bagian.idbagian}</td>
											
											<td>${response.bagian.kodebagian}</td>
											
											<td>${response.bagian.namabagian}</td>
											
											<td>${response.bagian.statusbagian}</td>
										
											<td>
											
												<button class="btn btn-warning btn-sm btn-edit"
													data-idbagian="${response.bagian.idbagian}"
													data-kodebagian="${response.bagian.kodebagian}"
													data-namabagian="${response.bagian.namabagian}"
													data-bs-target="#editModal">Edit</button>
												<button class="btn btn-danger btn-sm btn-delete"
													data-idjabatan="${response.jabatan.idjabatan}">Hapus</button>
											
											
											</td>
										
										</tr>
										
									`;
									
									table.row.add($(newRow)).draw();
									
									$('#bagianForm')[0].reset();
								}
							},
							
							error:function (xhr) {
								
								console.log(xhr.responseText);
								
								console.log("Data Fporm yang di kirim : ", formData);
								
								alert("Gagal Menyimpan Data");
								
							}
						
					});
					
					
				});
				
				
				var table = $('#bagianTable').DataTable();
				
				
				
				
			});
		
		
		
		</script>
	
	</body>
	
</html>
