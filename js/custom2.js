function job_post()
{
  alert("hello");
}

function register()
{
    var name = $("#name").val();
	var city = $("#city").val();
	var mobile_number = $("#mobile_number").val();
	var password =$("#password").val();
	var r_password =$("#r_password").val();
	
     var formData= new FormData();
    formData.append('name',name);
    formData.append("city",city);
    formData.append("mobile_number",mobile_number);
    formData.append("password",password);
    formData.append("r_password",r_password);
    formData.append("registration","registration");
   
    $.ajax({
      processData: false,
      contentType: false,
      url:"backend/register.php",
      type:"POST",
      data:formData,
      success:function(data,status){

        alert("Success");
        

      },

    });


    
}


function post_gig()
{
    var gig_title = $("#gig_title").val();
	var gig_category = $("#gig_category").val();
	var gig_description = $("#gig_description").val();
	var base_price =$("#base_price").val();
	
     var formData= new FormData();
    formData.append('gig_title',gig_title);
    formData.append("gig_category",gig_category);
    formData.append("gig_description",gig_description);
    formData.append("base_price",base_price);
      formData.append("gig_post","gig_post");
   
   
    $.ajax({
      processData: false,
      contentType: false,
      url:"backend/register.php",
      type:"POST",
      data:formData,
      success:function(data,status){

        alert("Success");
        

      },

    });
}