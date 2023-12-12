
    
    
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
           <h1 class="card-title">S'inscrire</h1>
     
     
     <div class="card-body">  
      
            
    <div class="col-md-7 col-lg-8">
        <form class="needs-validation" novalidate="" method="post">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" name="nom" id="firstName" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" name="prenom" id="lastName" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            
              </div>
            </div>

            <div class="col-8">
              <label for="email" class="form-label">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
              <input type="email" class="form-control"   name="gmail" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-8">
              <label for="address" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="address" placeholder="***********" required="" >
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-8">
              <label for="address2" class="form-label">Address <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country" required="">
                <option value="">Marrocain</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-5">
              <label for="state" class="form-label">State</label>
              <select class="form-select" id="state" required="">
                <option value="">fes</option>
                <option>casa</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
<input type="hidden" name ="action" value="INSCRIRE">
                     <input type="submit"  value="envoyer" class="btn btn-warning" >
        
           </form>
            </div>
            
          </div>

          
         
    </div>
    
</body>
</html>