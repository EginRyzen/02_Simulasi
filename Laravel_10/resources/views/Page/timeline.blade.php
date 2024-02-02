@extends('front')

@section('content')
    <section class="content pt-4">
        <div class="container-fluid">

            <!-- Timelime example  -->
            @foreach ($galery as $item)
                <div class="row">
                    <div class="col-md-12">
                        <!-- The time line -->
                        <div class="timeline">
                            <!-- timeline time label -->
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-envelope bg-blue"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i>
                                        {{ $item->created_at->diffForHumans() }}</span>
                                    <img src="{{ asset('img/' . $item->foto) }}" height="500" class="d-block m-auto py-5"
                                        alt="">
                                    <h3 class="mx-5">{{ $item->judul }}</h3>

                                    <div class="mx-5">
                                        {{ $item->deskripsi }}
                                    </div>
                                    <div class="mx-5 py-3">
                                        <a class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#modal-update{{ $item->id }}">Edit</a>
                                        <a href="{{ url('timeline/' . $item->id) }}"
                                            onclick="return confirm('Yakin Unutk Di Hapus??')"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-clock bg-gray"></i>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="modal fade" id="modal-update{{ $item->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Update Foto</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ url('timeline/' . $item->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" value="{{ $item->judul }}" name="judul"
                                                class="form-control" placeholder="Judul">
                                        </div>
                                        <div class="form-group">
                                            <textarea type="text" rows="5" name="deskripsi" class="form-control" placeholder="Deskripsi">{{ $item->deskripsi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" id="updateImage{{ $item->id }}" name="foto">
                                        </div>
                                        <div class="form-group">
                                            @if ($item->foto)
                                                <img src="{{ asset('img/' . $item->foto) }}"
                                                    id="previewUpdate{{ $item->id }}"
                                                    style="width:100%; width:150px; max-height:200px" alt="">
                                            @else
                                                <img id="previewUpdate{{ $item->id }}"
                                                    style="width:100%; width:150px; max-height:200px">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /.timeline -->

    </section>
@endsection
