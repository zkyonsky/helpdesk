<div>
    <div class="form-group">
        <label>CUSTOMER</label>
        <select wire:model="selectedCustomer" class="form-control">
                <option value ="">- SELECT CUSTOMER -</option>
            @foreach ($customers as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

    @if (!is_null($projects))
        <div class="form-group">
                <label>SELECT PROJECT</label>
                <select class="form-control" wire:model="selectedProject">
                    <option value="">SELECT PROJECT</option>
                    @foreach ($projects as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
        </div>

        @if (!is_null($customerProject))
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>WARRANTY PERIOD</label>
                        {{ $customerProject['warrantyperiod'] }} Bulan
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>CONTRACT PERIOD</label>
                        {{ $customerProject['warrantyperiod'] }} Bulan
                    </div>  
                </div>
            </div>
        @endif

        <hr>
        
    @endif

</div>
