@extends('layouts.admin')

@section('content')
    <h2>Progetti</h2>

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

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
        <form action="{{ route('admin.projects.store') }}" method="POST" class="d-flex">
            @csrf
            <input type="search" placeholder="Nuovo Progetto" class="form-control me-2" name="title">
            <button class="btn btn-outline-success " type="submit">Invia</button>
        </form>
    </div>

    <table class="table table-crud">
        <thead>
          <tr>
            <th scope="col">Progetti</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
              <td>
                <form
                  action="{{ route('admin.projects.update', $project) }}"
                  method="POST"
                  id="form-edit-{{ $project->id }}">
                    @csrf
                    @method('PUT')
                    <input type="text" value="{{ $project->title }}" name="title">
                </form>
              </td>
              <td class="d-flex">
                <button
                  class="btn btn-warning me-2"
                  onclick="submitForm({{ $project->id }})"><i class="fa-solid fa-pen"></i></button>
                <form
                  action="{{ route('admin.projects.destroy', $project)}}"
                  method="POST"
                  onsubmit="return confirm('Sei sicuro di volerla eliminare?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>

      <script>
        function submitForm(id){
            const form = document.getElementById(`form-edit-${id}`);
            form.submit();
        }
      </script>
@endsection
