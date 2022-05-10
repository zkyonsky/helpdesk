@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>New Ticket</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-folder"></i> Buat tiket</h4>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                                <div class="form-group">

                                    @livewire('customer-project', ['customerId' => null])

                                    <input type="hidden" name="updated_customer" id="updated_customer">
                                    @error('customer_id')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <div class="form-group">
                                        <label>TICKET NO</label>
                                        <input type="text" name="ticket_no" value="{{ old('ticket_no') }}" class="form-control" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>REPORTED DATE</label>
                                        <input type="datetime-local" name="reporteddate" value="<?= date('Y-m-d', time()); ?>" class="form-control @error('reporteddate') is-invalid @enderror">
        
                                        @error('reporteddate')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>URGENCY / SLA</label>
                                        <select class="form-control select-sla @error('sla_id') is-invalid @enderror" name="sla_id">
                                            <option value="">- SELECT SLA -</option>
                                            @foreach ($slas as $sla)
                                                <option value="{{ $sla->id }}">{{ $sla->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('sla_id')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>PROBLEM SUMMARY</label>
                                        <input type="text" name="summary" value="{{ old('summary') }}" class="form-control" >

                                        @error('summary')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>PROBLEM DETAIL</label>
                                        <textarea name="detail" cols="30" rows="30" class="form-control">{{ old('detail') }}</textarea>
                                        @error('detail')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>ASSIGN TO</label>
                                        <select class="form-control select-technician @error('technician_id') is-invalid @enderror" name="technician_id">
                                            <option value="">- Pilih Teknisi -</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('technician_id')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
                                    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

<script>
    window.addEventListener('customer-updated', event => {
        document.getElementById('updated_customer').value = event.detail.selectedCustomer;
    })
</script>

