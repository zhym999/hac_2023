
    
    
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="Stylesheet" href="css/bootstrap.css">
<title>Insert title here</title>
</head>
<body>
 <c:import url="Nmenu.jsp" >
    <c:param name="active" value="list" />
    </c:import>
    
    <div class="row">
           <h1 class="card-title">product modification </h1>
     
     <div class="card-body">  
      
            <form  method="Post">
            
Libelle:<input type="text" name="lib" placeholder="Libelle" class="form-control"><br>
Description:<input type="text" name="desc" placeholder="Description" class="form-control"><br>
Prix:<input type="text" name="prix" placeholder="Prix" class="form-control"><br>
Quantité:<input type="number" name="quant" placeholder="Quantité" class="form-control"><br>
<input type="hidden" name ="admin" value=admin>
<input type="hidden" name ="action" value="upd">
                     <input type="submit"  value="envoyer" class="btn btn-warning" >

</form>
</div>
</div>

</body>
</html>