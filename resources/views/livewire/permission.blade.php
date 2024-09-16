<div>
    <div wire:ignore.self class="modal fade" id="permissionModal" tabindex="-1" aria-labelledby="permissionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="permissionModalLabel">Permissions Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="mb-3">Permissions</h6>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="registrationPermission"
                            wire:click="toggleRegistrationPermission" @if ($registrationPermission) checked @endif>
                        <label class="form-check-label" for="registrationPermission">Allow User Registration</label>
                    </div>

                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" id="languagePermission"
                            wire:click="toggleLanguagePermission" @if ($languagePermission) checked @endif>
                        <label class="form-check-label" for="languagePermission">Allow Multi Language</label>
                    </div>

                    <h6 class="mt-4 mb-3">Language Settings</h6>
                    <div class="mb-3">
                        <label for="languageSelect" class="form-label">Select Default Language</label>
                        <select class="form-select" id="languageSelect" aria-label="Language selection">
                            <option value="en" selected>English</option>
                            <option value="bn">বাংলা (Bengali)</option>
                            <option value="es">Español (Spanish)</option>
                            <option value="fr">Français (French)</option>
                            <option value="de">Deutsch (German)</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
