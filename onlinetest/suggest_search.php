<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>How to make search input to filter through list using jQuery</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery_suggest_search.js"></script>
<script>
$( document ).ready(function() {
  $('#s').keyup(function(){
   var valThis = $(this).val().toLowerCase();
    $('.countryList>li').each(function(){
     var text = $(this).text().toLowerCase();
        (text.indexOf(valThis) == 0) ? $(this).show() : $(this).hide();            
   });
  });
});
</script>
</head>
<body>
<div style="margin-left: auto;margin-right: auto;width: 200px;">
  <input placeholder="Search..." id="s" type="search" /> 
  <br />
  <ul class="countryList">
      <li><a href="#1">India</a></li>
      <li><a href="#2">United States</a></li>
      <li><a href="#3">Pakistan</a></li>
      <li><a href="#4">Sri Lanka</a></li>
      <li><a href="#5">Bangladesh</a></li>
      <li><a href="#6">Canada</a></li>
      <li><a href="#7">United Kingdom</a></li>
      <li><a href="#8">Australia</a></li>
      <li><a href="#9">Argentina</a></li>
  </ul>
</div>
</body>
</html>