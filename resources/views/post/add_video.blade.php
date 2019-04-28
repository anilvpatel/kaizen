<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kaizen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
</head>
<body>
<div class="container">
<br><br><br><br><br>
<table id="post_table" class="table table-bordered">
  <thead>
    <tr class="bg-primary">
        <th>id</th>
        <th>Post</th>
        <th>Video</th>
    </tr>
  </thead>
  <tbody>
    @foreach($job_post as $key => $value)
        <tr>
            <td class="postId">{{$value->id}}</td>
            <td>
              <a href="/jobs/{{$value->post_name}}">
              {{$value->post_title}}
            </a>
            </td>
            <td>
           {!! $value->video=='NA' ?
           '<button data-id="'.$value->id.'" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#urlModal">Add</button>':
           '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#urlModal">Edit</button>' !!}
            </td>
         </tr>
    @endforeach
  </tbody>
</table>
<pre>
copy
Paste
post id to modal
save the data, then refresh
</pre>
 <!-- Modal -->
 <div class="modal fade" id="urlModal" role="dialog">
   <div class="modal-dialog">
     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Add Video</h4>
       </div>
       <div class="modal-body">
          <input id="url" type="text" name="url" value="">
       </div>
       <div class="modal-footer">
         <button id="save" class="btn btn-width bkgrnd-cyan save-details" type="button" name="save-details">Save</button>
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
 </div>
</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">

var table=$("#post_table").DataTable({
  'paging':true,
  'searching':true,
  'ordering':true,
  'info':true
});

$('#urlModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id')
    var modal = $(this)
  modal.find('#save').data('id',id);

})

  $('body').on('click','#save',function() {
    var id= $(this).data('id');
    var url=$(this).data('url');
    $.ajax({
        type:'POST',
        url: '/jobpost/video/save',
        data:{
          'id':id,
          'url':url,
          "_token":"{{csrf_token()}}",
        },
        success: function(data){
          alert(data);
      },
        error:function(error){
          console.log(error.responseText);
        }
      });
    $('#urlModal').modal('hide');
  });

</script>
</body>
</html>
