@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit project</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Edit project</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('projects.update', $project->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>NAMA PROJECT</label>
                                <input type="text" name="name" value="{{ old('name', $project->name) }}" placeholder="Masukkan Judul project" class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>CUSTOMER</label>
                                <select class="form-control select-customer @error('customer_id') is-invalid @enderror" name="customer_id">
                                    <option value="">- SELECT CUSTOMER -</option>
                                    @foreach ($customers as $customer)
                                        @if ($project->customer_id == $customer->id)
                                            <option value="{{ $customer->id }}" selected>{{ $customer->name }}</option>
                                        @else
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('customer_id')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>DELIVERY START</label>
                                <input type="date" name="deliverystart" value="{{ old('deliverystart', Carbon\Carbon::parse($project->deliverystart)->format('Y-m-d')) }}" class="form-control @error('deliverystart') is-invalid @enderror">

                                @error('deliverystart')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>DELIVERY END</label>
                                <input type="date" name="deliveryend" value="{{ old('deliveryend', Carbon\Carbon::parse($project->deliveryend)->format('Y-m-d')) }}" class="form-control @error('deliveryend') is-invalid @enderror">

                                @error('deliveryend')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>INSTALL START</label>
                                <input type="date" name="installstart" value="{{ old('installstart', Carbon\Carbon::parse($project->installstart)->format('Y-m-d')) }}" class="form-control @error('installstart') is-invalid @enderror">

                                @error('installstart')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>INSTALL END</label>
                                <input type="date" name="installend" value="{{ old('installend', Carbon\Carbon::parse($project->installend)->format('Y-m-d')) }}" class="form-control @error('installend') is-invalid @enderror">

                                @error('installend')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>UAT START</label>
                                <input type="date" name="uatstart" value="{{ old('uatstart', Carbon\Carbon::parse($project->uatstart)->format('Y-m-d')) }}" class="form-control @error('uatstart') is-invalid @enderror">

                                @error('uatstart')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>UAT END</label>
                                <input type="date" name="uatend" value="{{ old('uatend', Carbon\Carbon::parse($project->uatend)->format('Y-m-d')) }}" class="form-control @error('uatend') is-invalid @enderror">

                                @error('uatend')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>BILL START</label>
                                <input type="date" name="billstart" value="{{ old('billstart', Carbon\Carbon::parse($project->billstart)->format('Y-m-d')) }}" class="form-control @error('billstart') is-invalid @enderror">

                                @error('billstart')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>BILL END</label>
                                <input type="date" name="billdue" value="{{ old('billend', Carbon\Carbon::parse($project->billend)->format('Y-m-d')) }}" class="form-control @error('billend') is-invalid @enderror">

                                @error('billend')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>WARRANTY PERIOD</label>
                                <input type="number" name="warrantyperiod" value="{{ old('warrantyperiod', $project->warrantyperiod) }}" placeholder="Masukkan Warranty Period" class="form-control @error('warrantyperiod') is-invalid @enderror">

                                @error('warrantyperiod')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>CONTRACT START</label>
                                <input type="date" name="contractstart" value="{{ old('contractstart', Carbon\Carbon::parse($project->contractstart)->format('Y-m-d')) }}" class="form-control @error('contractstart') is-invalid @enderror">

                                @error('contractstart')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>CONTRACT PERIOD</label>
                                <input type="number" name="contractperiod" value="{{ old('contractperiod', $project->contractperiod) }}" placeholder="Masukkan Contract Period" class="form-control @error('contractyperiod') is-invalid @enderror">

                                @error('contractperiod')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop