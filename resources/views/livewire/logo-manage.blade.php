<div class="logo-container p-4 p-md-5">
    <!-- Header Logo Section -->
    <form wire:submit.prevent="submitLogo">
        <div class="logo-ul border-bottom pb-4">
            <div class="type">
                <h4 style="color:#333;">Header Logo</h4>
            </div>
            <div class="d-flex flex-column gap-4 align-items-md-start">
                <div class="img" style="width:200px;">
                    @if ($currentLogo)
                        <img src="{{ asset('storage/' . $currentLogo->path) }}" alt="" class="img-fluid">
                    @endif
                </div>
                <div class="d-flex align-items-center gap-2 gap-md-0">
                    <input wire:model="logo" class="file-w" type="file" accept="image/*">
                    <div class="btn-g">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        @if ($currentLogo)
                            <button wire:click="deleteLogo({{ $currentLogo->id }})" type="button"
                                class="btn btn-danger btn-sm">Delete</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Header Ads Section -->
    <form wire:submit.prevent="submitAdsLogo">
        <div class="logoads-ul pt-4">
            <div class="type">
                <h4 style="color:#333;">Header Ads</h4>
            </div>
            <div class="d-flex flex-column gap-3 align-items-md-start">
                <div class="img">
                    @if ($currentAdsLogo)
                        <img src="{{ asset('storage/' . $currentAdsLogo->path) }}" alt="" class="img-fluid">
                    @endif
                </div>
                <div class="d-flex align-items-center gap-2 gap-md-0">
                    <input wire:model="adsLogo" class="file-w" type="file" accept="image/*">
                    <div class="btn-g">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        @if ($currentAdsLogo)
                            <button wire:click="deleteAdsLogo({{ $currentAdsLogo->id }})" type="button"
                                class="btn btn-danger btn-sm">Delete</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Nav Logo Section -->
    <form wire:submit.prevent="submitNavLogo">
        <div class="logo-ul border-bottom py-4">
            <div class="type">
                <h4 style="color:#333;">Nav Logo</h4>
            </div>
            <div class="d-flex flex-column gap-4 align-items-md-start">
                <div class="img" style="width:200px;">
                    @if ($currentNavLogo)
                        <img src="{{ asset('storage/' . $currentNavLogo->logo) }}" alt="" class="img-fluid">
                    @endif
                </div>
                <div class="d-flex align-items-center gap-2 gap-md-0">
                    <input wire:model="navLogo" class="file-w" type="file" accept="image/*">
                    <div class="btn-g">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        @if ($currentNavLogo)
                            <button wire:click="deleteNavLogo({{ $currentNavLogo->id }})" type="button"
                                class="btn btn-danger btn-sm">Delete</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
