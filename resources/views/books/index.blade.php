@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">圖書清單</h1>  
    <div class="col-sm-12">
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
      @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div>
      @endif
      @if(session()->get('fail'))
      <div class="alert alert-warning">
        {{ session()->get('fail') }}  
      </div>
 　　 @endif
    </div> 
    <div>
     <a style="margin: 19px;" href="{{ route('books.create')}}" class="btn btn-primary">推薦新的圖書資訊</a>
    </div>  
  <table class="table table-striped">
    <thead>
        <tr>
          <td>圖書名稱</td>
          <td>作者</td>
          <td>出版社</td>
          <td>ISBN</td>
          <td>價格</td>
          <td>出版日期</td>
          <td>公開分享</td>
          <td>封面照片</td>
          <td>分享者</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->publisher}}</td>
            <td>{{$book->ISBN}}</td>
            <td>{{$book->price}}</td>
            <td>{{$book->pub_date}}</td>
            <td>{{$book->ready}}</td>
            <td> 
            <img src="{{ URL::to('/') }}/images/{{ $book->photo_path }}" class="img-thumbnail" width="250" />
            </td>
            <td>{{$book->username}} ({{$book->sid}})</td>
            <td>
                <a href="{{ route('books.edit',$book->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('books.destroy', $book->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">刪除</button>
                </form>
            </td>
            <td>
               <form action="{{ route('votings.store') }}" method="post">
                  @csrf
                  <input type="hidden" name="bid" value="{{$book->id}}" >
                  <!-- 刪除 sid -->
                  <button class="btn btn-primary" onclick="return confirm('Are you sure?')" type="submit">票選</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <!-- $books->links() -->
</div>
</div>
@endsection