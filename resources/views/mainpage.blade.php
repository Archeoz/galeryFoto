@extends('master')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Timelime example  -->
            <div class="row">
                <div class="col-md-12">
                    <!-- The time line -->
                    <div class="timeline">
                        <!-- timeline time label -->
                        <div class="time-label">
                            <span class="bg-red">Linimasa Foto Anda</span>
                        </div>
                        <!-- /.timeline-label -->
                        <div>
                            <i class="fa fa-camera bg-purple"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> {{ $terbaru->created_at->diffForhumans() }}</span>
                                <h3 class="timeline-header"><a href="#">{{ Auth::user()->username }} | </a>Foto - foto
                                    terbaru anda</h3>
                                <div class="timeline-body">
                                    @foreach ($galeri as $foto)
                                        <img src="{{ url('foto/' . $foto->foto) }}" alt="..." class="img-fluid" width="200" height="200">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @foreach ($galeri as $g)
                            <!-- timeline time label -->
                            <div class="time-label">
                                <span class="bg-green">{{ $g->tanggal }}</span>
                            </div>
                            <!-- timeline item -->
                            <div>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> {{ $g->created_at->diffForHumans() }}</span>

                                    <h3 class="timeline-header"><a href="">{{ $g->judul }}</a> | 
                                        <a href="" data-toggle="modal" data-target="#editfoto{{ $g->id_galery }}" class="btn btn-sm btn-warning">Edit</a>

                                        <div class="modal fade" id="editfoto{{ $g->id_galery }}" z-index="30">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #FFA500">
                                                        <h4 class="modal-title">Edit Foto Anda</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('editfoto/'.$g->id_galery) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <label for="">Judul : </label>
                                                            <input type="text" class="form-control" name="judul" value="{{ $g->judul }}">
                                                            <label for="">Deskripsi : </label>
                                                            <input type="text" class="form-control" name="deskripsi" value="{{ $g->deskripsi }}">
                                                            <label for="">Pilih Gambar : </label>
                                                            <input type="file" class="form-control" name="gambar">
                                                        </div>
                                                        <div class="modal-footer justify-content-between" style="background-color: #FFA500">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-warning">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal --> 
                                        <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusfoto{{ $g->id_galery }}">Hapus</a></h3>

                                        <div class="modal fade" id="hapusfoto{{ $g->id_galery }}" z-index="30">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: red">
                                                        <h4 class="modal-title">Hapus Foto Anda</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('hapusfoto/'.$g->id_galery) }}" method="get" enctype="multipart/form-data">
                                                            @csrf
                                                            <p>Yakin Ingin Menghapus?</p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between" style="background-color: red">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                    <div class="timeline-body">
                                        <img src="{{ asset('/foto/' . $g->foto) }}" class="img-fluid" width="350" height="200">
                                    </div>
                                    <div class="timeline-footer">
                                        <p>{{ $g->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- END timeline item -->
                            <div>
                                <i class="fas fa-clock bg-gray"></i>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.timeline -->

    </section>
    <!-- /.content -->
    {{-- </div> --}}
    <!-- /.content-wrapper -->
@endsection
