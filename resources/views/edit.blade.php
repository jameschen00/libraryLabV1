@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">更新學生資料</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('students.update', $student->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="sid">SID:</label>
                <input type="text" class="form-control" name="sid" value={{ $student->sid }} />
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $student->name }} />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $student->email }} />
            </div>
            <div class="form-group">
                <label for="Gentle">Gentle:</label>
                <input type="text" class="form-control" name="Gentle" value={{ $student->gentle }} />
            </div>
            <div class="form-group">
                <label for="pw">密碼:</label>
                <input type="text" class="form-control" name="pw" value={{ $student->pw }} />
            </div>
            <button type="submit" class="btn btn-primary">更新學生資料</button>
        </form>
    </div>
</div>
@endsection