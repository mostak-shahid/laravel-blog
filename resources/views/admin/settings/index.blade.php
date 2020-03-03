@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
        <?php // var_dump($settings) ?>
        @foreach($settings as $setting)
        <?php var_dump($setting->option_value) ?><hr />
        @endforeach
        </div>
    </div>
@endsection