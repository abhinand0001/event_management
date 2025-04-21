<div x-data="{ add: false, self:'self'  }">
    <div class="container-fluid">
        <div class="row mb-3 mt-2">
            <div class="col">
                <button x-on:click="add = !add" class="btn btn-primary" style="width: 150px;">Add Event</button>
            </div>
        </div>

        
        <div class="row" x-show="add" x-transition>
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="saveEvent">
                        <div class="row">
                            <div class="col-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" wire:model="title" class="form-control py-2">
                                @error('title') <span style="color: red;">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-3">
                                <label for="date" class="form-label fw-semibold text-secondary">Date</label>
                                <input type="date" wire:model="date" class="form-control py-2">
                                @error('date') <span style="color: red;">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-3">
                                <label for="time" class="form-label fw-semibold text-secondary">Time</label>
                                <input type="time" wire:model="time" class="form-control py-2">
                                @error('time') <span style="color: red;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-3">
                                <label for="type" class="form-label fw-semibold text-secondary">Type</label>
                                <input type="text" wire:model="type" class="form-control py-2">
                                @error('type') <span style="color: red;">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-3">
                                <label for="self" class="form-label fw-semibold text-secondary">Self or Other</label>
                                <select class="form-control" name="" id="" x-on:change="self = $event.target.value">
                                    <option value="me">Self</option>
                                    <option value="other">Other</option>
                                </select>
                                         
                            </div>


                            <div class="col-3" x-show = "self == 'other'">
                                <label for="for_user" class="form-label fw-semibold text-secondary">Event For</label>
                                <input type="number" wire:model="for_user" x-show="false">
                                @livewire('search-user',[true])
                                @error('for_user') <span style="color: red;">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-3">
                                <label for="guideline" class="form-label fw-semibold text-secondary">Guideline</label>
                                <textarea wire:model="guideline"></textarea>
                                @error('guideline') <span style="color: red;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary" style="width: 100px;">Submit</button>
                                <button type="button" class="btn btn-warning" style="width: 100px;" x-on:click="add = false">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</div>
