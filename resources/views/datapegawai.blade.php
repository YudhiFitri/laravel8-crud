<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>CRUD LARAVEL 8</title>
  </head>
  <body>
    <h1 class="text-center mb-4">Data Pegawai</h1>
    <div class="container">
        <a href="/tambahpegawai" class="btn btn-success">Tambah Data</a>
        <div class="row g-3 align-item-center pt-2">
            <div class="col-auto">
                <form action="/pegawai" method="GET">
                    <input type="search" class="form-control form-control-sm" name="search">
                </form>
            </div>
            <div class="col-auto">
                <a href="/exportpdf" class="btn btn-info btn-sm"><i class="fa-thin fa-file-pdf"></i>&nbsp;Export PDF</a>
            </div>
            <div class="col-auto">
                <a href="/exportexcel" class="btn btn-success btn-sm"><i class="fa-thin fa-file-pdf"></i>&nbsp;Export Excel</a>
            </div>
            <div class="col-auto">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Import Data
                </button>
            </div>
        </div>
        <hr>
        <div class="row">
            <!-- @if($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No.Telpon</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $index => $dt)
                    <tr>
                        <th scope="row">{{$index + $data->firstItem()}}</th>
                        <td>{{$dt->nama}}</td>
                        <td>
                            <img src="{{ asset('fotopegawai/' . $dt->foto) }}" alt="" style="width: 40px;">
                        </td>
                        <td>{{$dt->jnskelamin}}</td>
                        <td>0{{ $dt->notelpon }}</td>
                        <td>{{ $dt->created_at->format('d-m-Y H:i:s') }}</td>
                        <!-- <td>{{ $dt->created_at->diffForHumans() }}</td> -->
                        <td>
                            <a href="/tampilkandata/{{$dt->id}}" class="mx-1 btn btn-warning">Edit</button>
                            <a href="#" class="mx-1 btn btn-danger delete" data-id="{{$dt->id}}" data-nama="{{$dt->nama}}">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$data->links()}}
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/importexcel" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" name="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.delete').click(function(){
            const id = $(this).attr('data-id');
            const nama = $(this).attr('data-nama');
            console.log('id: ', id);

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                    buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Anda Yakin?',
                text: `Anda yakin akan menghapus data pegawai atas nama ${nama}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus saja!',
                cancelButtonText: 'Tidak, batalkan!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = `/delete/${id}`
                    swalWithBootstrapButtons.fire(
                    'Dihapus!',
                    `Data pegawai atas nama ${nama} sudah dihapus.`,
                    'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Dibatalkan',
                    `Data pegawai atas nama ${nama} tidak jadi dihapus :)`,
                    'error'
                    )
                }
            });
        })
    </script>

    <script>
        @if(Session::has("success"))
            toastr.success("{{Session::get('success')}}")
        @endif
    </script>
  </body>
</html>
