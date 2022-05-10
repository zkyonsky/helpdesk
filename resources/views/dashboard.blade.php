@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
          <div class="container">

            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="fa fa-ticket-alt text-white fa-2x"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>TIKET BULAN INI</h4>
                    </div>
                    <div class="card-body">
                      {{ $report->getMonthlyTickets() ?? '0' }}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-12"> 
                <div class="card card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="fa fa-skull-crossbones text-white fa-2x"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>SLA TERLAMPAUI</h4>
                    </div>
                    <div class="card-body">
                      {{ $report->getOverdueTickets('red') ?? '0' }}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="fa fa-exclamation-triangle text-white fa-2x"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>MENDEKATI SLA</h4>
                    </div>
                    <div class="card-body">
                      {{ $report->getOverdueTickets('yellow') ?? '0' }}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fa fa-smile-wink text-white fa-2x"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>TIKET SELESAI</h4>
                    </div>
                    <div class="card-body">
                      {{ $report->getMonthlyDoneTickets() ?? '0' }}
                    </div>
                  </div>
                </div>  
              </div>              
            </div>

            <div class="row">
              <div class="col-8">
                <div class="card">
                  <div class="card-header">
                      <h4><i class="fas fa-clipboard-list"></i> LAPORAN BULAN INI</h4>
                  </div>
    
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered">
                              <thead>
                              <tr>
                                  <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                  <th scope="col">NAME</th>
                                  <th scope="col">ASSIGNED</th>
                                  <th scope="col">EXPIRED</th>
                                  <th scope="col">WARNING</th>
                                  <th scope="col">PENDING</th>
                                  <th scope="col">DONE</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach ($allReports as $no => $item)
                                  <tr>
                                      <th scope="row" style="text-align: center">{{ ++$no }}</th>
                                      <td>{{ $item['name'] }}</td>
                                      <td><span class="badge badge-primary">{{ $item['assigned'] }}</span></td>
                                      <td><span class="badge badge-danger">{{ $item['expired'] }}</span></td>
                                      <td><span class="badge badge-warning">{{ $item['warning'] }}</span></td>
                                      <td><span class="badge badge-dark">{{ $item['pending'] }}</span></td>
                                      <td><span class="badge badge-success">{{ $item['done'] }}</span></td>
                                  </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
                </div>
              </div>
              
              <div class="col-4">
                <div class="card">
                  <div class="card-header">
                      <h4><i class="fas fa-clipboard-list"></i> BERITA </h4>
                  </div>
                  <div class="card-body">
                    @foreach ($news as $item)
                      <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light flex-column align-items-start">
                          <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $item->title }}</h5>
                          </div>
                          <p class="mb-1">{{ $item->detail }}</p>
                          <small>created by : {{  $user->getName($item->user_id) }}</small>
                          <small> - {{ Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}</small>
                        </a>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
        </div>

    </section>
</div>
@endsection
