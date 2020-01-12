@extends('master')
@extends('sidebar')
@section('content')
  <br />
  <div class="container box">
   <h3 align="center">Przykładowa tabela z danymi studentów</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Przykładowe dane</div>
    <div class="panel-body">
     <div id="message"></div>
     <div class="table-responsive">
      <table class="table table-striped table-bordered">
       <tbody>
       
       </tbody>
      </table>
      {{ csrf_field() }}
     </div>
    </div>
   </div>
  </div>

 
<script>
$(document).ready(function(){
 
 fetch_data();


 function fetch_data()
 {
  $.ajax({
   url:"/livetable/fetch_data/{{$group->id_groups}}",
   dataType:"json",
  }).done(function(data)
   
   {
    var html = '';
    html += '<tr>';
    html += '<th>Imie</th>';
    html += '<th>Nazwisko</th>';
    for(var i=1; i<=15; i++){
    html += '<th>Data</th>';
    html += '<th>Nr ćwiczenia</th>'
    html += '<th>Ocena 1</th>';
    html += '<th>Ocena 2</th>';
    html += '<th>Ocena 3</th>';
    }

 
 
    for(var count=0; count < data.length; count++)
    {
    html +='<tr>';
    html +='<td contenteditable class="column_name" data-column_name="name" data-id="'+data[count].id_Student+'">'+data[count].name+'</td>';
    html += '<td contenteditable class="column_name" data-column_name="surname" data-id="'+data[count].id_Student+'">'+data[count].surname+'</td>';

    html += '<td contenteditable class="column_name" data-column_name="date_z1" data-id="'+data[count].id_Student+'">'+data[count].date_z1+'</td>';
    html += '<td contenteditable class="column_name" data-column_name="nr_cw_z1" data-id="'+data[count].id_Student+'">'+data[count].nr_cw_z1+'</td>';
    html += '<td contenteditable class="column_name" data-column_name="oc1_z1" data-id="'+data[count].id_Student+'">'+data[count].oc1_z1+'</td>';
    html += '<td contenteditable class="column_name" data-column_name="oc2_z1" data-id="'+data[count].id_Student+'">'+data[count].oc2_z1+'</td>';
    html += '<td contenteditable class="column_name" data-column_name="oc3_z1" data-id="'+data[count].id_Student+'">'+data[count].oc3_z1+'</td>';

    }
    $('tbody').html(html);
   }
);
 }
 
 var _token = $('input[name="_token"]').val();
 
 $(document).on('click', '#add', function(){
  var first_name = $('#name').text();
  var last_name = $('#surname').text();
  var ocena1 = $('#ocena1').text();
  var ocena2 = $('#ocena2').text();
  var ocena3 = $('#ocena3').text();
  if(name != '' && surname != ''  &&nr_cwiczenia != '' && ocena1 != '' && ocena2 != '' && ocena3 != '')
  {
   $.ajax({
    url:"{{ route('livetable.add_data') }}",
    method:"POST",
    data:{'name':name, 'surname':surname, 'nr_cwiczenia':nr_cwiczenia, 'ocena1':ocena1z1, 'ocena2':ocena2z1, 'ocena3':ocena3z1, _token:_token},
    success:function(data)
    {
     $('#message').html(data);
     fetch_data();
    }
   });
  }
  else
  {
   $('#message').html("<div class='alert alert-danger'>Both Fields are required</div>");
  }
 });
 
 $(document).on('blur', '.column_name', function(){
  var column_name = $(this).data("column_name");
  var column_value = $(this).text();
  var id_Student = $(this).data("id");
 
  if(column_value != '')
  {
     
   $.ajax({
    url:"{{ route('livetable.update_data') }}",
    method:"POST",
    data:{
        'column_name':column_name,
        'id_Student':id_Student,
        'column_value': column_value,
         _token:_token},
    success:function(data)
    {
     $('#message').html(data + "EK");
    },
    error: function(exc,status, error){
        $('#message').html(exc.responseText + "EK");
    }
   })
  }
  else
  {
   $('#message').html("<div class='alert alert-danger'>Enter some value</div>");
  }
 });
 
 $(document).on('click', '.delete', function(){
  var id_Student = $(this).attr("id");
  if(confirm("Are you sure you want to delete this records?"))
  {
      console.log(id_Student + " eke " + id_Student);
   $.ajax({
    url:"{{ route('livetable.delete_data') }}",
    method:"POST",
    data:{'id_Student':id_Student, _token:_token},
    success:function(data)
    {
     $('#message').html(data);
     fetch_data();
    }
   });
  }
 });
 
 
});
</script>
@endsection