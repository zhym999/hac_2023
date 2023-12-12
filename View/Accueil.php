<%@taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>

<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
  pageEncoding="ISO-8859-1"%>
    
    
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
	<h1 class="card-title">All product </h1>
	<c:forEach var="mode" items="${model}" > 
	
	<c:if test='${sessionScope.login ==mode.client.getGmail()}'>
	<div class="col-md-3 col-sm-4 col-lg-2">
	<div class="card  bg-light" style="width: 12rem">
          <div class="card-body">
            <img class="card-img-top" src="image/${mode.produit.libelle}.jpg" alt="Card image cap">
            
              
              <h2 class="card-title"> ${mode.produit.libelle}</h2>
              <h3 class="card-subtitle mb-2 text-muted"> <c:out value="${mode.produit.categorie}"></c:out></h3>
             <h4 class="card-subtitle mb-2 text-muted"> <c:out value="${mode.produit.quantite}"></c:out></h4>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <form method="get" action="servlet">
                 
                 <input type="hidden" name ="action" value="update">
                  <input type="submit"  class="btn btn-sm btn-outline-secondary" value="Update">
                  <input type="hidden" name ="action" value="delete">
                  <input type="submit"  class="btn btn-sm btn-outline-secondary" value="Delete">
                  <input type="hidden" name ="admin" value="${product.id}">
             
                  <small class="text-muted">${mode.produit.prix}DH</small>
                  
                   <input class="form-control me-2" type="number" name="quant" placeholder="quantite" >
     
             </form>
                </div>
               
              </div>
              
            <a href="servlet?page=pan&id=${product.id}&email1=${email}" class="btn btn-success"> Commander </a>
   
          </div>
        </div>
        </div>
        </c:if>
</c:forEach>
	    
</div>
</body>
</html>
