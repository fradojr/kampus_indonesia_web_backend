
@extends('admin.template.layout')

@section('title','edit')

@section('content')


<div class="container-fluid">
    <form method="post" action="{{route('news.update',[$berita->id])}}" enctype="multipart/form-data">
        @CSRF
        @method('put')
        <div class="form-group">
            <label>title</label>
            <input type="hidden" name="is_published" class="form-control" value="{{$berita->is_published}}">
        </div>

           <div class="form-group">
               <label>title</label>
               <input type="text" name="title" class="form-control" value="{{$berita->title}}">
           </div>

           <div class="form-group">
               <label>Picture (link)</label>
               <input type="text" name="picture" class="form-control" value="{{$berita->picture}}" >
           </div>

           <div class="form-group">
               <label>content</label>
               <input type="text" name="content" class="form-control" value="{{$berita->content}}">
           </div>      
                                            
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
       </form>
</div>a



@endsection



