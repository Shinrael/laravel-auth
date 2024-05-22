@extends('layouts.admin')

@section('content')
    <h2>Tecnologie</h2>

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="my-4">
        <form action="{{ route('admin.technologies.store') }}" method="POST" class="d-flex">
            @csrf
            <input type="search" placeholder="Nuova Tecnologia" class="form-control me-2" name="title">
            <button class="btn btn-outline-success " type="submit">Invia</button>
        </form>
    </div>

    <table class="table table-crud">
        <thead>
          <tr>
            <th scope="col">Tecnologie</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $item)
            <tr>
              <td>
                <input type="text" value="{{ $item->title }}">
              </td>
              <td>
                <button class="btn btn-warning "><i class="fa-solid fa-pen"></i></button>
                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
@endsection
