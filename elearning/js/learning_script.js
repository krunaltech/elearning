function addToCart(course_id) {
  var qty = parseInt($("#qty_"+course_id).val());
  if(qty == 0)
    return;
  var courses = getCookie("cart");
  //var courses = localStorage.cart;
  var msg = "Course added successfully";
  if(courses == "undefined" || courses == null || courses == "")
    courses = {};
  else
  {
    courses = JSON.parse(courses); 
  }
  if(typeof courses[course_id] != "undefined")
    msg = "Course updated successfully";
  courses[course_id] = qty;
  //localStorage.cart = JSON.stringify(courses);
  document.cookie = "cart="+JSON.stringify(courses)+"; path=/";
  $("#alert").html(msg).show(500);
  setTimeout(function(){
    $("#alert").hide(1500);
  }, 1500);
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function deleteCartItem(course_id, btn_pointer)
{
  var courses = getCookie("cart");
  if(courses == "undefined" || courses == null || courses == "")
    courses = {};
  else
    courses = JSON.parse(courses);
  delete courses[course_id];
  document.cookie = "cart="+JSON.stringify(courses)+"; path=/";
  console.log(btn_pointer)
  location.reload();
}