<div>
    <style>
        th,
        td {
            white-space: nowrap;
        }
    </style>

    <div class="container mt-4">
        <h2>Add Social Media Link</h2>

        <form wire:submit.prevent="submit">
            <div class="mb-3">
                <label for="socialMedia" class="form-label">Select Social Media</label>
                <select wire:model="socialMedia" class="form-select" id="socialMedia" required>
                    <option value="" disabled selected>Select a social media</option>
                    <option value="">Select a social media</option>
                    <option value="Facebook">Facebook</option>
                    <option value="Twitter">Twitter</option>
                    <option value="Instagram">Instagram</option>
                    <option value="LinkedIn">LinkedIn</option>
                    <option value="YouTube">YouTube</option>
                    <option value="Pinterest">Pinterest</option>
                    <option value="Whatsapp">Whatsapp</option>
                    <option value="Snapchat">Snapchat</option>
                    <option value="TikTok">TikTok</option>
                </select>
                @error('socialMedia')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input type="url" wire:model="link" class="form-control" id="link" placeholder="Enter the link"
                    required>
                @error('link')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <hr>

        <h3 class="mt-5">Social Media Links</h3>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">Social Media Name</th>
                    <th scope="col">Link</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($socialLinks as $socialLink)
                    <tr>
                        <td>{{ $socialLink->name }}</td>
                        <td>{{ $socialLink->link }}</td>
                        <td>
                            <button wire:click="edit({{ $socialLink->id }})"
                                class="btn btn-sm btn-warning">Edit</button>
                            <button wire:click="delete({{ $socialLink->id }})"
                                class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
