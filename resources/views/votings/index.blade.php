@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">圖書票選紀錄清單</h1>  
    <div class="col-sm-12">

      @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div>
      @endif
    </div> 
    <div>
     <a style="margin: 19px;" href="{{ route('books.index')}}" class="btn btn-primary">參與圖書票選活動</a>
    </div>  
  <table class="table table-striped">
    <thead>
        <tr>
          <td>圖書名稱</td>
          <td>ISBN</td>
          <td>出版社</td>
          <td>投票日期</td>
          <td>投票者</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($votings as $voting)
        <tr>
            <td>{{$voting->title}}</td>
            <td>{{$voting->ISBN}}</td>
            <td>{{$voting->publisher}}</td>
            <td>{{$voting->voting_date}}</td>
            <td>{{$voting->username}} (id:{{$voting->sid}})</td>
            <td>
                <form action="{{ route('votings.destroy', $voting->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">刪除該筆投票紀錄</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <!-- $votings->links() -->
</div>
</div>
@endsection