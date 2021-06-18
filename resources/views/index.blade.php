@extends('base')
@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">學生清單</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>學號</td>
          <td>姓名</td>
          <td>Email</td>
          <td>性別</td>
          <td>密碼</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{$student->sid}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->gentle}}</td>
            <td>{{$student->pw}}</td>
            <td>
                <a href="{{ route('students.edit',$student->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('students.destroy', $student->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $students->onEachSide(2)->links() }}
</div>
</div>

@endsection