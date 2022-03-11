<!DOCTYPE html>
<html lang="en">
<head>
	
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>



<style type="text/css">
 .denrobe{
    font-family:  Montserrat,  Arial, sans-serif;
   font-size: 2.5vw;
   font-weight: 600;
   color: #55C0A9;
 }
 .summ{
    font-family:  Montserrat,  Arial, sans-serif;
   font-size: 1.2vw;
   font-weight: 600;color: #55C0A9;
 }
 .summ2{
    font-family:  Montserrat,  Arial, sans-serif;
   font-size: 1vw;
   font-weight: 600;
   color: #55C0A9;
 }
 .span{
    color: #000000;
 }
 .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
.btn{
    color: #ffffff;
    background-color:#55C0A9;
   padding: 1.5% 10%;
}
</style>


<title></title>

</head>
<body >


<div class="container mt-3 " >
 <div class="card">
    <div class="card-body text-center">
      
<img src="https://drive.google.com/file/d/1Tqzyiv8vephsuswM3AUPy2k4pIkDnhtJ/view?usp=sharing" width="30%" class="mt-3">
 <p class="denrobe text-center mt-3" >Your Order is On Its Way</p>
 <img src="'https://drive.google.com/file/d/1smtLfy5Lb_fcINGgWY24ZLbORvlsrI_j/view?usp=sharing" width="50%"><br>
  <a href="{{url('user_dashborad')}}"><button class="btn">Track Your Order</button></a>
  <p>Please 24 Hours To Track Your Order</p>

<hr>
<div class="text-left ml-3 mt-4">
    <div class="row">
      <div class="col-md-6">
         <p class="summ text=left">SUMMARY</p>
         <p class="summ2">Order #: <span class="ml-4 span">{{$order->id}}</span></p> 
         <p class="summ2">Order Date: <span class="ml-4 span">{{$order->created_at}}</span></p> 
         <p class="summ2">Order Payment: <span class="ml-4 span">{{$order->payment}}</span></p> 
         <p class="summ2">Order Total: <span class="ml-4 span">{{$detail['total']}}</span></p> 
      </div>
      <div class="col-md-6">
       <p class="summ ">SHIPPING ADDRESS :</p> 
       <p class="span summ2">{{$order->address}}</p> 
         
      </div>
    </div>

    <table class="styled-table">
    <thead>
        <tr>
            <th>image</th>
            <th>Name</th>
            <th>Detail</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
       
        <tr>
            <td><img src="{{asset('uploads/img/' .$detail['image'])}}"></td>
            <td>{{$detail['product']}}</td>
            <td>{{$detail['detail']}}</td>
            <td>{{$detail['price']}}</td>
        </tr>
     
       
    </tbody>
</table>
 
</div>


    </div>
</div>

</div>

 
 <script src="https://code.jquery.com/jquery-3.4.0.min.js" 
  integrity="sha384-JUMjoW8OzDJw4oFpWIB2Bu/c6768ObEthBMVSiIx4ruBIEdyNSUQAjJNFqT5pnJ6" 
  crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
