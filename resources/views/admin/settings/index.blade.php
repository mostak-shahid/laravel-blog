@extends('layouts.app')
@section('content')
@include('functions')
<?php var_dump(get_settings('site_phone')); ?>
    <div class="card">
        <div class="card-body">
        <?php // var_dump($settings) ?>
        @foreach($settings as $setting)
        <?php var_dump($setting->option_value) ?><hr />
        @endforeach
        </div>
    </div>
@endsection