@extends('layouts.layout')

@section('content')
<style>
.info-box a:link,.info-box a {
  color:#000 !important;
}
</style>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-sm-6">
            <h1>Apply Form</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
        <!-- Form Biodata -->
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Biodata Diri</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form id="biodata" method="POST" action="{{ route('submit-form' , ['id' => $post->id]) }}" enctype="multipart/form-data" >
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Alamat Berdasarkan KTP</label>
                        <textarea class="form-control" rows="3" placeholder="Masukkan disini.." name="ktp_text" value="{{old('ktp_text')}}"></textarea>
                        @error('ktp_text')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        
                        <div class="row">
                            <div class="col-sm-3 form-group">
                                
                                <label for="">Provinsi</label>
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="ktp_provinsi" value="{{old('ktp_provinsi')}}">
                                @error('ktp_provinsi')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3 form-group">
                                <label for="">Kota/Kabupaten</label>
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="ktp_kota" value="{{old('ktp_kota')}}">
                                @error('ktp_kota')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3 form-group">
                                <label for="">Kecamatan</label>
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="ktp_kecamatan" value="{{old('ktp_kecamatan')}}" required>
                                @error('ktp_kecamatan')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3 form-group">
                                <label for="">Kode Pos</label>
                                <input type="number" class="form-control" placeholder="Masukkan disini.." name="ktp_kodepos" value="{{old('ktp_kodepos')}}" required>
                                @error('ktp_kodepos')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Alamat Berdasarkan Domisili</label>
                        <textarea class="form-control" rows="3" placeholder="Masukkan disini.." name="domisili_text" value="{{old('domisili_text')}}" required></textarea>
                        @error('domisili_text')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="">Provinsi</label>
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="domisili_provinsi" value="{{old('domisili_provinsi')}}" required>
                                @error('domisili_provinsi')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label for="">Kota/Kabupaten</label>
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="domisili_kota" value="{{old('domisili_kota')}}" required>
                                @error('domisili_kota')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label for="">Kecamatan</label>
                                <input type="text" class="form-control" placeholder="Masukkan disini.." name="domisili_kecamatan" value="{{old('domisili_kecamatan')}}" required>
                                @error('domisili_kecamatan')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label for="">Kode Pos</label>
                                <input type="number" class="form-control" placeholder="Masukkan disini.." name="domisili_kodepos" value="{{old('domisili_kodepos')}}" required>
                                @error('domisili_kodepos')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                 <div class="card-body">
                    <div class="education-sections">
                        <!-- Bagian pendidikan akan ditambahkan di sini -->
                    </div>

                    <a id="tambah-pendidikan" class="btn btn-success">Tambah Pendidikan</a>
                </div>

                <div class="card-body">
                    <div class="work-experience-sections">
                        <!-- Bagian pengalaman kerja akan ditambahkan di sini -->
                    </div>

                    <a id="tambah-pengalaman-kerja" class="btn btn-success">Tambah Pengalaman Kerja</a>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="">Upload CV</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="cv">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        @error('cv')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/css/formValidation.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/js/formValidation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/js/framework/bootstrap.min.js"></script>



    <script>
        $(document).ready(function() {

           

            var counterPendidikan = 1;
            var counterPengalamanKerja = 1;

            // Tambahkan satu bagian pendidikan saat halaman dimuat
            tambahBagianPendidikan();

            // Tambahkan satu bagian pengalaman kerja saat halaman dimuat
            tambahBagianPengalamanKerja();

            $('#tambah-pendidikan').click(function() {
                tambahBagianPendidikan();
            });

            $('#tambah-pengalaman-kerja').click(function() {
                tambahBagianPengalamanKerja();
            });

            // Fungsi untuk menambahkan bagian pendidikan
            function tambahBagianPendidikan() {
                var bagianPendidikan = `
                    <!-- Bagian Pendidikan ${counterPendidikan} -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title">Pendidikan ${counterPendidikan}</h5>
                            <button class="btn btn-sm btn-danger btn-hapus-pendidikan" data-counter="${counterPendidikan}">Hapus</button>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Sekolah / Perguruan Tinggi</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama sekolah/PT" name="nama_sekolah[${counterPendidikan}]" required>
                            </div>
                            <div class="form-group">
                                <label>Jurusan / Program Studi</label>
                                <input type="text" class="form-control" placeholder="Masukkan jurusan/program studi" name="jurusan[${counterPendidikan}]" >
                            </div>
                             <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status[${counterPendidikan}]">
                                    <option value="lulus">Lulus</option>
                                    <option value="tidak_lulus">Tidak Lulus</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tahun Lulus</label>
                                <input type="number" class="form-control" placeholder="Masukkan tahun lulus" name="tahun_lulus[${counterPendidikan}]" required>
                            </div>
                            <!-- Tambahkan elemen lain sesuai kebutuhan -->
                        </div>
                    </div>
                `;
                $('.education-sections').append(bagianPendidikan);
                counterPendidikan++;
            }

            $(document).on('click', '.btn-hapus-pendidikan', function() {
                var counter = $(this).data('counter');
                $(this).closest('.card').remove();
                counterPendidikan--;
            });

            // Fungsi untuk menambahkan bagian pengalaman kerja
            function tambahBagianPengalamanKerja() {
                var bagianPengalamanKerja = `
                    <!-- Bagian Pengalaman Kerja ${counterPengalamanKerja} -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title">Pengalaman Kerja ${counterPengalamanKerja}</h5>
                            <button class="btn btn-sm btn-danger btn-hapus-pengalaman" data-counter="${counterPengalamanKerja}">Hapus</button>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama perusahaan" name="nama_perusahaan[${counterPengalamanKerja}]" required>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" class="form-control" placeholder="Masukkan jabatan" name="jabatan[${counterPengalamanKerja}]" required>
                            </div>
                            <div class="form-group">
                                <label>Periode Kerja</label>
                                <input type="text" class="form-control dp" placeholder="Masukkan periode kerja" name="periode_kerja[${counterPengalamanKerja}]" >
                            </div>
                            <!-- Tambahkan elemen lain sesuai kebutuhan -->
                        </div>
                    </div>
                `;
                $('.work-experience-sections').append(bagianPengalamanKerja);
                counterPengalamanKerja++;
            }

             // Initialize DateRangePicker for Periode Kerja fields
            $('.work-experience-sections').on('focus', '.form-control.dp', function() {
                $(this).daterangepicker({
                    locale: {
                        format: 'Y-MM-DD'
                    }
                });
            });

            $(document).on('click', '.btn-hapus-pengalaman', function() {
                var counter = $(this).data('counter');
                $(this).closest('.card').remove();
                counterPengalamanKerja--;
            });

            
        });
    </script>

<script>
    $(document).ready(function() {
        // Initialize FormValidation
        $('#biodata').formValidation({
            framework: 'bootstrap',
            fields: {
                ktp_text: {
                    validators: {
                        notEmpty: {
                            message: 'Alamat KTP wajib di isi'
                        }
                    }
                },
                ktp_provinsi: {
                    validators: {
                        notEmpty: {
                            message: 'Provinsi Wajib di isi'
                        }
                    }
                },
                ktp_kota: {
                    validators: {
                        notEmpty: {
                            message: 'Kota wajib di isi'
                        }
                    }
                },

                 ktp_kecamatan: {
                    validators: {
                        notEmpty: {
                            message: 'Kecamatan wajib di isi'
                        }
                    }
                },

                 ktp_kodepos: {
                    validators: {
                        notEmpty: {
                            message: 'Kode pos wajib di isi'
                        }
                    }
                },
                // Add validators for other fields in the KTP section
                domisili_text: {
                    validators: {
                        notEmpty: {
                            message: 'Alamat domisili wajib di isi'
                        }
                    }
                },

                 domisili_kecamatan: {
                    validators: {
                        notEmpty: {
                            message: 'Kecamatan domisili wajib di isi'
                        }
                    }
                },


                 domisili_kodepos: {
                    validators: {
                        notEmpty: {
                            message: 'Kode Pos domisili wajib di isi'
                        }
                    }
                },
                
               
                cv: {
                    validators: {
                        notEmpty: {
                            message: 'Cv wajib di upload'
                        },
                        file: {
                            extension: 'pdf', // Replace with allowed file extensions
                            type: 'application/pdf', // Replace with allowed file types
                            message: 'Hanya dizinkan PDF'
                        }
                    }
                }
            }
        })
        .on('success.form.fv', function(e) {
            // Clear any previous error messages
            $(e.target).find('.text-danger').removeClass('text-danger').addClass('d-none');

            // Handle successful form submission
            // You can add your submission logic here
        })
        .on('err.field.fv', function(e, data) {
            // Display error messages using Bootstrap classes
            $(data.element).removeClass('is-valid').addClass('is-invalid');
            $(data.element).siblings('.fv-plugins-message-container').find('.fv-help-block').removeClass('d-none').addClass('text-danger');
        })
        .on('success.field.fv', function(e, data) {
            // Clear error messages for valid fields
            $(data.element).removeClass('is-invalid').addClass('is-valid');
            $(data.element).siblings('.fv-plugins-message-container').find('.fv-help-block').removeClass('text-danger').addClass('d-none');
        });;
    });
</script>

@endsection
