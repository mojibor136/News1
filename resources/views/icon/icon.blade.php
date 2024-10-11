@php
    $company = getCompany();
@endphp

<link rel="icon" href="{{ $company ? asset('storage/Admins/' . $company->image) : asset('path/to/default/icon.ico') }}"
    type="image/x-icon">

