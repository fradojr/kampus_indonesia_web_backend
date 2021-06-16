@extends('admin.template.layout')

@section('title','News')


@section('content')
<div class="container-fluid">
	
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus mr-2"></i>Tambah Berita</button>

    <table class="table mt-2">  
 <tr>
   <h1>
     <?php 
       
      ?>
   </h1>
   <th>No.</th>
   <th>Title</th> 
   <th>Picture</th>
   <th>Content</th>
   <th>Published</th>
   <th>Dibuat pada</th>      
   <th>Aksi</th>
 </tr>
 <tr>

    @foreach ($berita as $n)
    <th>1</th>
   
    <th>{{$n->title}}</th>     
    <th><a href="{{$n->picture}}"> lihat gambar</a></th>
    <th>{{$n->content}}</th>
    <th>
        <?php if ($n->is_published==0) { ?> 
            <span class="badge badge-danger">Not Published</span>
        <?php }else{ ?>
            <span class="badge badge-primary">Published</span>
        <?php }?>
    </th>        
    <th></th>   
    <th><a href="{{"hapus/news/".$n->id}}">
      <div class="btn btn-danger btn-sm"><i class="fa fa-trash "></i></div>
    </a></th>
    <th>
     <a href="{{"edit/news/".$n->id}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>     
    <th>
       
    </th>
    <th onClick="javacript : return confirm('hapus?')" >
     
    </th>
    <th>
      
    </th>
    
  </tr>
    @endforeach
  

</table>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
         <form method="post" action="{{route('news.store')}}" enctype="multipart/form-data">
            @CSRF       
            <?php $publish=1 ?>     
            <div class="form-group">                 
                <input type="hidden" name="is_published" class="form-control"  value="<?= $publish ?>">
            </div>

             <div class="form-group">
                 <label>Title</label>
                 <input type="text" name="title" class="form-control">
             </div>
             <div class="form-group">
                 <label>picture (link)</label>
                 <input type="text" name="picture" class="form-control">
             </div>
            
             <div class="form-group">
                 <label>content</label>                 
                 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
             </div>            

              <button type="reset" class="btn btn-danger" data-dismiss="modal"  onclick="publis()">Publish</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
         </form>
         
         <?php 
            function publis(){
               $publish = 1;
            }
         ?>
     </div>
   </div>
 </div>

</div>

</div>

@endsection



