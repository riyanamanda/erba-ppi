@extends('layouts.app')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<x-layouts.content heading="Edit Surveilans">
    <x-slot name="breadcrumb">
        <x-breadcrumb-item :url="route('surveilans.index')">Surveilans</x-breadcrumb-item>
        <x-breadcrumb-item>Edit Surveilans</x-breadcrumb-item>
    </x-slot>

    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <form action="{{ $url }}" method="POST">
                @csrf
                @method('PATCH')

                @if ($type === 'ISK')
                <x-form.isk.edit :$surveilans />
                @endif

                @if ($type === 'phlebitis')
                <x-form.phlebitis.edit :$surveilans />
                @endif
            </form>
        </div>
    </div>
</x-layouts.content>
@endsection