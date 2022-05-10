<div>
    
                


                <label>CUSTOMER</label>
                <select wire:model="selectedCustomer" class="form-control">
                    <option value="">-- SELECT CUSTOMER --</option>
                    @foreach ($customers as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                

                {{-- <label>PROJECT</label>
                <select wire:model = "selectedproject" class="form-control" name="project_id">
                    <option value="">-- SELECT PROJECT --</option>
                    @foreach ($customerproject as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select> --}}

                

                {{-- <input type="text" name="warranty" value="{{ $projects->warranty }}" class="form-control"> --}}
            
</div>
