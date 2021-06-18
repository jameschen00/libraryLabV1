@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">新增推薦圖書資料</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('books.store') }}"  enctype="multipart/form-data" >
          @csrf
          <!-- 刪除 sid -->
          <div class="form-group">
              <label for="title">圖書名稱:</label>
              <input type="text" class="form-control" name="title"/>
          </div>

          <div class="form-group">
              <label for="authoe">作者:</label>
              <input type="text" class="form-control" name="author"/>
          </div>
    
          <div class="form-group">
            <label for="publisher">出版社:</label>
            <input type="text" class="form-control" name="publisher"/>
          </div>
          <div class="form-group">
            <label for="ISBN">ISBN:</label>
            <input type="text" class="form-control" name="ISBN"/>
          </div>
          <div class="form-group">
            <label for="price">價格:</label>
            <input type="text" class="form-control" name="price"/>
          </div>
          <div class="form-group">
            <label for="pub_date">出版日期:</label>
            <input type="text" class="form-control" name="pub_date"/>
          </div>
          <div class="form-group">
            <input type="radio"  name="ready" value="1">公開分享<br>
            <input type="radio"  name="ready" value="0">尚未完成<br>
          </div>
          <div class="form-group">
              <label class="col-md-4 text-right">選擇圖書封面照片</label>
              <div class="col-md-8">
                <input type="file" name="photo" />
              </div>
          </div>                  
          <button type="submit" class="btn btn-primary-outline">確定新增</button>
      </form>
  </div>
</div>
</div>
@endsection