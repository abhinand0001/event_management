<div>
    <select id="userSelect" class="form-control" wire:model="selectedUser" wire:change="setForDispatch">
        <option value="">Select a user</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
</div>


