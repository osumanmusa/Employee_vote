<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

<style>
  .header{
    font-weight: 900;
    color: #ffffff;
    background: #2980b9;
    margin-bottom: 5px;
  }
  body{
  font-family: 'Helvetica Neue', Helvetica, Arial;
  font-size: 14px;
  line-height: 20px;
  font-weight: 400;
  color: #3b3b3b;
  -webkit-font-smoothing: antialiased;
  font-smoothing: antialiased;
 
    }
.table{
    margin: 0 0 40px 0;
  width:auto;
 /*box-shadow: 0 1px 3px rgba(0,0,0,0.2);*/
  display: table;
  padding: 10px;

}
    .cell{
      padding: 6px 12px;
  display: table-cell;
    }
    .data-cell{
      background-color: #eeeeee;
    }
td{
  text-align: center;
}
th{
  padding: 10px;
}
   </style>

</head>
<body>
  <div style="text-align:center;">
    <h3></h3>
    <h3></h3>
  </div>
  <div class="">
  <table class="table">
  	<thead>
	<tr class="header">
   

            <th>#</th>
            <th>Name</th>    
            <th>Gender</th>   
            <th>Company</th>
            <th>Role</th>    
            <th>Email</th>   
            <th>Mobile</th>
            <th>Whatsapp</th>    
            <th>Date commencing</th>
          

</tr>
</thead>
	<tbody>
		
   @foreach($pdfprint as $pdfprint)
    
<tr style="height40px;" class="{{($loop->iteration % 2 ==0)?'data-cell':'' }}" >
     
     <td class="cell">{{$pdfprint->name}}</td>
     <td class="cell">{{$pdfprint->gender}}</td>
     <td class="cell">{{$pdfprint->company}}</td>
     <td class="cell">{{$pdfprint->role}}</td>
     <td class="cell">{{$pdfprint->email}}</td>
     <td class="cell">{{$pdfprint->mobile}}</td>
     <td class="cell">{{$pdfprint->whatsapp}}</td>
     <td class="cell">{{$pdfprint->date_commencing}}</td>
     </tr>
    @endforeach
		
	</tbody>
</table>
</div>
</body>
</html>