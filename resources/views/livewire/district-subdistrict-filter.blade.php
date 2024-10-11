<div class="d-flex flex-column flex-md-row py-3 mt-4 gap-3 gap-md-0 mb-2"
    style="background: #ededed; align-items: center; justify-content: center;">
    @livewireStyles
    <div class="d-flex mx-4">
        <div class="d-flex align-items-center gap-4">
            <div>
                <span style="color: #be475d;">আপনার এলাকার খবর</span>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-md-row gap-4 gap-md-2">
        <div class="position-relative">
            <select wire:model="selectedDistrict"
                class="form-select custom-select custom-width-200 custom-width-300 custom-width-250" id="postCategory">
                <option selected>বিভাগ</option>
                @foreach ($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach
            </select>
            <i class="ri-arrow-down-s-line dropdown-arrow"></i>
        </div>
        <div class="position-relative">
            <select class="form-select custom-select custom-width-200 custom-width-300 custom-width-250"
                id="postCategory">
                <option selected>জেলা</option>
                @foreach ($subdistricts as $subdistrict)
                    <option value="{{ $subdistrict->id }}">{{ $subdistrict->name }}</option>
                @endforeach
            </select>
            <i class="ri-arrow-down-s-line dropdown-arrow"></i>
        </div>
    </div>
    <div class="d-flex mx-4">
        <div class="d-flex align-items-center gap-4">
            <div>
                <button type="submit" id="button" name="btnSubmit" class="btn btn-success"
                    disabled="">খুঁজুন</button>
            </div>
        </div>
    </div>
    @livewireScripts
</div>
