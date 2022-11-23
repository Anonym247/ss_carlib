{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('brand') }}"><i class="nav-icon la la-question"></i> Brands</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('model') }}"><i class="nav-icon la la-question"></i> Models</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('car') }}"><i class="nav-icon la la-question"></i> Cars</a></li>