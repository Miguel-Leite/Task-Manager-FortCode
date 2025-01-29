@extends('layouts.base')

@section('layout')
<div class="w-screen h-screen flex items-center justify-center">
  <form action="{{ route("auth.login") }}" method="post" class="max-w-96 w-full min-h-96 border rounded-lg p-11">
    <img src="{{ asset('logo.png') }}" alt="Logo" class="h-8 w-auto mx-auto">
    @if (session('success'))
        <div class="text-center text-green-600 bg-green-200 w-full px-4 py-2 rounded-xl my-3">
          <span>{{ session('success') }}</span>
        </div>
    @endif
    @if (session('error'))
        <div class="text-center text-red-600 bg-red-200 w-full px-4 py-2 rounded-xl my-3">
          <span>{{ session('error') }}</span>
        </div>
    @endif
    @csrf
    <div class="space-y-5 mt-10">
      <div class="space-y-2">
        <label for="email">E-mail</label>
        <input type="email" name="email" class="form-control-input"  required/>
      </div>

      <div class="space-y-2">
        <label for="email">E-mail</label>
        <input type="password" name="password" class="form-control-input" required/>
      </div>
    </div>

    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 w-full mt-5">
      Entrar
    </button>
  </form>
</div>
@endsection
