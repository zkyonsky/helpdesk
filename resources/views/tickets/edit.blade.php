@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Tiket</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-folder"></i> Edit tiket</h4>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('tickets.update', $ticket->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('PUT')
                                <div class="form-group">
                                    @hasanyrole('Admin|Helpdesk')
                                    @livewire('customer-project', ['customerId' => $ticket->customer_id])

                                    @error('customer_id')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    @endhasanyrole

                                    <input type="hidden" name="updated_customer" id="updated_customer" value="{{ $ticket->customer_id }}">
                                    @hasrole('Teknisi')
                                    <div class="form-group">
                                        <label>CUSTOMER</label>
                                        <input type="text" name="customer" value="{{ old('customer', $customer->find($ticket->customer_id)->first()->value('name')) }}" class="form-control" readonly>
                                    </div>
                                    @endhasrole
                                    <div class="form-group">
                                        <label>TICKET NO</label>
                                        <input type="text" name="ticket_no" value="{{ old('ticket_no', $ticket->number) }}" class="form-control" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>REPORTED DATE</label>
                                        <input type="date" name="reporteddate" value="{{ old('reporteddate', Carbon\Carbon::parse($ticket->reporteddate)->format('Y-m-d')) }}" class="form-control @error('reporteddate') is-invalid @enderror" @hasrole('Teknisi') readonly @endhasrole>
                                        @error('reporteddate')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>PROBLEM SUMMARY</label>
                                        <input type="text" name="summary" value="{{ old('summary', $ticket->problemsummary) }}" class="form-control" @hasrole('Teknisi') readonly @endhasrole >

                                        @error('summary')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>PROBLEM DETAIL</label>
                                        <textarea name="detail" cols="30" rows="30" class="form-control" @hasrole('Teknisi') readonly @endhasrole>{{ old('detail', $ticket->problemdetail) }}</textarea>
                                        @error('detail')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    @hasanyrole('Admin|Helpdesk')
                                    <div class="form-group">
                                        <label>URGENCY / SLA</label>
                                        <select class="form-control select-sla @error('sla_id') is-invalid @enderror" name="sla_id">
                                            <option value="">- SELECT SLA -</option>
                                            @foreach ($slas as $sla)
                                                @if ($ticket->sla_id == $sla->id)
                                                    <option value="{{ $sla->id }}" selected>{{ $sla->name }}</option>
                                                @else
                                                    <option value="{{ $sla->id }}">{{ $sla->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('sla_id')
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
                                                @if ($ticket->assignee == $user->id)
                                                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                                @else
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endif
                                               
                                            @endforeach
                                        </select>
                                        @error('technician_id')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    @endhasanyrole

                                    @hasrole('Teknisi')
                                    <div class="form-group">
                                        <label>URGENCY / SLA</label>
                                        <select class="form-control select-sla @error('sla_id') is-invalid @enderror" name="sla_id" readonly>
                                            <option value="">- SELECT SLA -</option>
                                            @foreach ($slas as $sla)
                                                @if ($ticket->sla_id == $sla->id)
                                                    <option value="{{ $sla->id }}" selected>{{ $sla->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                    <label>ASSIGN TO</label>
                                    <select class="form-control select-technician @error('technician_id') is-invalid @enderror" name="technician_id" readonly>
                                        <option value="">- Pilih Teknisi -</option>
                                        @foreach ($users as $user)
                                            @if ($ticket->assignee == $user->id)
                                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
                                    </div>
                                    @endhasrole

                                    @hasanyrole('Admin|Teknisi')
                                    <div class="form-group">
                                        <label>RESOLUTION</label>
                                        <textarea name="resolution" cols="30" rows="30" class="form-control">{{ old('resolution', $ticket->resolution) }}</textarea>
                                        @error('resolution')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>CHANGE STATUS</label>
                                        <select name="status" id="status" class="form-control select-status @error('status') is-invalid @enderror" >
                                            <option value="">-- Ganti Status --</option>
                                            <option value="Assigned" @if ($ticket->status == "Assigned") selected @endif>Assigned</option>
                                            <option value="Pending" @if ($ticket->status == "Pending") selected @endif>Pending</option>
                                            <option value="Closed" @if ($ticket->status == "Closed") selected @endif>Closed</option>
                                        </select>
                                    </div>
                                    @endhasanyrole
                                    @hasrole('Helpdesk')
                                    <input type="hidden" name="status" id="status" value="{{ $ticket->status }}">
                                    @endhasrole
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

