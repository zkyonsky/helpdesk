@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>project</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-bell"></i> Project</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('projects.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('projects.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('projects.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                @endcan
                                <input type="text" class="form-control" name="q"
                                       placeholder="cari berdasarkan nama project">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col">PROYEK</th>
                                <th scope="col">CUSTOMER</th>
                                <th scope="col">DELIVERY START</th>
                                <th scope="col">DELIVERY END</th>
                                <th scope="col">INSTALL START</th>
                                <th scope="col">INSTALL END</th>
                                <th scope="col">UAT START</th>
                                <th scope="col">UAT END</th>
                                <th scope="col">BILL START</th>
                                <th scope="col">BILL DUE</th>
                                <th scope="col">WARRANTY PERIOD (BULAN)</th>
                                <th scope="col">CONTRACT START</th>
                                <th scope="col">CONTRACT PERIOD (BULAN)</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $no => $project)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($projects->currentPage()-1) * $projects->perPage() }}</th>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $customer->getName($project->customer_id) }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->deliverystart)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->deliveryend)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->installstart)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->installend)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->uatstart)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->uatend)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->billstart)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->billdue)->format('d M Y') }}</td>
                                    <td>{{ $project->warrantyperiod }}</td>
                                    <td>{{ Carbon\Carbon::parse($project->contractstart)->format('d M Y') }}</td>
                                    <td>{{ $project->contractperiod }}</td>
                                    <td class="text-center">
                                        @can('projects.edit')
                                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @endcan

                                        @can('projects.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $project->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$projects->links("vendor.pagination.bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<script>
    //ajax delete
    function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    //ajax delete
                    jQuery.ajax({
                        url: "{{ route("projects.index") }}/"+id,
                        data:     {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });

                } else {
                    return true;
                }
            })
        }
</script>
@stop