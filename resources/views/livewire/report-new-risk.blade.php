<div>
    <form wire:submit.prevent="saveSystemCredentials">
        <div class="modal-body">
            @if (session()->has('error'))
            <div class="alert alert-danger col-md-6">
                {{ session('message') }}
            </div>
            @endif

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for>Item Status</label>
                    <input wire:model.lazy="Name" type="text" placeholder="Name" class="form-control" />
                    @error('Name') <span class="text-danger">*{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for>Created Date</label>
                    <input wire:model.lazy="Name" type="text" placeholder="Name" class="form-control" />
                    @error('Name') <span class="text-danger">*{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for>Business Unit</label>
                    <select name="type" wire:model.lazy="UserType" class="form-control">
                        <option value="1">Unit 1</option>
                        <option value="2">Unit 2</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for>Last Modified Date</label>
                    <input wire:model.lazy="Name" type="text" placeholder="Name" class="form-control" />
                    @error('Name') <span class="text-danger">*{{ $message }}</span> @enderror
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for>Date Identified</label>
                    <input wire:model.lazy="Name" type="text" placeholder="Name" class="form-control" />
                    @error('Name') <span class="text-danger">*{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for>Risk Submitter</label>
                    <select name="type" wire:model.lazy="UserType" class="form-control">
                        <option value="1">User 1</option>
                        <option value="2">User 2</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for> Risk Source</label>
                    <select name="type" wire:model.lazy="UserType" class="form-control">
                        <option value="1">Source 1</option>
                        <option value="2">Source 2</option>
                    </select>
                </div>


            </div>
            <div class="form-row">
                <nav class="navbar navbar-expand-lg navbar-light bg-light col-md-12">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <button class="btn btn-sm btn-outline-secondary" type="button">Risk Causes</button>
                            <button class="btn btn-sm btn-outline-secondary" type="button">Risk Effects</button>
                            <button class="btn btn-sm btn-outline-secondary" type="button"> Corrective
                                Action(s)</button>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
