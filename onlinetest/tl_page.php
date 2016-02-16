
<html> 
<head>

<style type="text/css">
body{background-image: url("http://www.sashipublications.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/c/o/code_-_spparaomt.jpg");
             
             background-repeat: no-repeat;
              background-size:cover;
           }
 
.clearfix:after {
    display:block;
    clear:both;
}
 
/*----- Menu Outline -----*/
.menu-wrap {
    width:100%;
    box-shadow:0px 1px 3px rgba(0,0,0,0.2);
    background:#fff;
}
 
.menu {
    width:1000px;
    margin:0px auto;
}
 
.menu li {
    margin:0px;
    list-style:none;
    font-family:'Ek Mukta';
}
 
.menu a {
    transition:all linear 0.15s;
    color:blue;
}
.sub-menu li a {
    transition:all linear 0.15s;
    color:white;
}
 
.menu li:hover > a, .menu .current-item > a {
    text-decoration:none;
    color:green;
}
 
.menu .arrow {
    font-size:11px;
    line-height:0%;
}
 
/*----- Top Level -----*/
.menu > ul > li {
    float:left;
    display:inline-block;
    position:relative;
    font-size:19px;
}
 
.menu > ul > li > a {
    padding:10px 40px;
    display:inline-block;
    text-shadow:0px 1px 0px rgba(0,0,0,0.4);
}
 
.menu > ul > li:hover > a, .menu > ul > .current-item > a {
    background:#2e2728;
}
 
/*----- Bottom Level -----*/
.menu li:hover .sub-menu {
    z-index:1;
    opacity:1;
}
 
.sub-menu {
    width:160%;
    padding:5px 0px;
    position:absolute;
    top:100%;
    left:0px;
    z-index:-1;
    opacity:0;
    transition:opacity linear 0.15s;
    box-shadow:0px 2px 3px rgba(0,0,0,0.2);
    background:#2e2728;
}
 
.sub-menu li {
    display:block;
    font-size:16px;
}
 
.sub-menu li a {
    padding:10px 30px;
    display:block;
}
 
.sub-menu li a:hover, .sub-menu .current-item a {
    background:#3e3436;
}


</style>
</head> 
<body bgcolor="#fff">
    <table width="100%">
         <tr><td><div style="background-color:white; ">
          <img src="http://st1.ipublish.india.com/images/post_images/9d43b9de9d3b3bb2bedbde123773e0f8.jpg" alt="test" height="80" width="190" style="position: relative; left: 47px;"/>
</div></td></tr>
<tr><td><table bgcolor="#99ff33" width="100%"><tr valign="top"><td>

    <nav class="menu">
        <ul class="clearfix">
            
                
                       <li><a href="page.php">Home</a></li>
            <li style="padding-left:70px;">
                <a href="#">HR <span class="arrow">&#9660;</span></a>
                 <ul class="sub-menu">
                    <li><a href="office_user_login.php">HR Login</a></li>
                    
                </ul>
            </li>
            <li style="padding-left:70px;">
                <a href="#">Team Lead <span class="arrow">&#9660;</span></a>
                 <ul class="sub-menu">
                    <li><a href="paper_subject.php">Paper Subject</a></li>
                    <li><a href="question_master_list.php">Question Master</a></li>
                    <li><a href="question_bank.php">Question Bank</a></li>
                    <li><a href="test_result.php">Test Results</a></li>
                </ul>
            </li>
            <li style="padding-left:70px;">
                <a href="#">Candidate <span class="arrow">&#9660;</span></a>
                 <ul class="sub-menu">
                    <li><a href="candidate_login.php">Online Test</a></li>
                    
                </ul>
            </li>

           
        </ul>
    </nav>
</td></tr></table></td></tr></table>
 <button type="submit" name="logout" style="float:right;"><a href="tl_logout.php">Log Out </a></button>
 
</body></html>