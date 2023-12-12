
    
    
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<style>
table, th, td {
  border: 2px ;
}
</style>
<p id="demo"></p>




<meta name="theme-color" content="#7952b3">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

<!--<link href="css/headers.css" rel="stylesheet"> -->
</head>
<body>


<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
      <a class="navbar-brand" href="servlet?page=acceuil" >Glovo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
           <li class="nav-item ">
            <a class="nav-link <?php if(isset($_GET['page']) && $_GET['page'] == 'add') echo 'active'; ?>" href="test.php">Accuiel</a>
          </li>
           <li class="nav-item ">
        <a class="nav-link <?php if(isset($_GET['page']) && $_GET['page'] == 'list') echo 'active'; ?>" href="list.php">user</a>
          </li>
           
          <li class="nav-item">
            <a class="nav-link disabled" href='#' tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        
        <form class="d-flex" method="get" action="search.php">
          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <span>
   
          <a href="User.php" class="nav-link text-white">
            deconnexion
          </a></span>
          
           <a href="Panier.php" class="osh-btn -plain -cart -jewel" data-js-event="non" data-js-element="#cart">
 
       <i class="osh-font-cart"></i>

       <span class="label js-store" data-js-store="fullPageCache.pageData.common.cartOverlay.itemsCount"></span> <span class="sub-label ">Panier</span>   </a></div>

      </div>
    </div>
  </nav>
</header>

<link rel="Stylesheet" href="css\bootstrap.css">
</head>
<body>
 <c:import url="Nmenu.jsp" >
    <c:param name="active" value="list" />
    </c:import>
    
    
           
     



<div class="row">
	
	<h1 class="card-title">Panier de la client</h1>
	
	<table border=2>
	<tr>
	<th>  rrRestaurant</th>
	<th>Latitite</th>
	<th>Longitude</th>
	<th>Sevice</th>
	<th>Price</th>
	
	
	</tr>
	
	<c:forEach var="mode" items="${model}" >
	<c:if test='${sessionScope.login ==mode.client.getGmail()}'>
	<tr>
	<td>
	<div class="col-md-3 col-sm-4 col-lg-2">
	<div class="card  bg-light" style="width: 12rem ; length: 15rem ; left: 20px">
          <div class="card-body">
            <img class="card-img-top" src="image.jpg" alt="Card image cap">
            
              
            
              <div class="d-flex justify-content-between align-items-center">
                
                <h6 class="card-subtitle mb-2 text-muted"> Gennaro</c:out></h6><br><br>
                <div class="btn-group" style="top: 25px; right: 70px;">
                
                </style>
                  <a href="servlet?page=updateP&id=${mode.id_panier}"
										class="btn btn-success"> update </a> 
									<a href="servlet?page=deleteP&id=${mode.id_panier}"
										class="btn btn-success"> delate </a>
             
                </div>
              </div>
            </td>
            
            
            
            <td> <h6 class="card-subtitle mb-2 text-muted"> 40.7535098 </h6>
            <td><h6 class="card-subtitle mb-2 text-muted"> -73.9884463</h6></td>
            <td> <h6 class="card-subtitle mb-2 text-muted"> 17</c:out></h6></td>
            <td> <h6 class="card-subtitle mb-2 text-muted"> 41</c:out></h6>
          
          
         </div>
        </div>
        </div>

        
       
        
        </tr>
        </c:if>
        </c:forEach>
        </table>
         <h6 class="card-subtitle mb-2 text-muted"> <c:out value="Totale est :${userCounter}"></c:out></h6>
        
      
        </div>

	    
</body>
</html>