<?php 
include('class/User.php');
$user = new User();
$user->loginStatus();
include('include/header.php');
?>
<title>Student Management System</title>
<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/prod_style.css">  
<?php include('include/container.php');?>
<div class="container contact">	
	<h2>Student Management System</h2>	
	<?php include 'menu.php'; ?>
	
	
<?php

    $GLOBALS['txtProductID']=$_POST['txtProductID'];
    $GLOBALS['txtProductCode']=$_POST['txtProductCode'];
    $GLOBALS['txtProductName']=$_POST['txtProductName'];
    $GLOBALS['txtProductDescription']=$_POST['txtProductDescription'];
    $GLOBALS['txtProductUnitPrice']=$_POST['txtProductUnitPrice'];
    $GLOBALS['txtProductQuantity']=$_POST['txtProductQuantity'];

	$servername = "localhost"; 
	$username = "root";
	$password = "passwd";
	$database = "demodb";

	// Create connection to database 
	$conn = mysqli_connect($servername, $username, $password, $database);
/* 
    $sql="SELECT product.ProductID, ProductNumber as Name, Name as Description, ListPrice as UnitPrice, sum(Quantity) as Quantity FROM product
    LEFT JOIN productinventory
    ON product.ProductID = productinventory.ProductID group by product.ProductID";
 */
    $sql = "SELECT * FROM product WHERE 1=1";
    if ($GLOBALS['txtProductID']<>'') $sql.=" AND productID='".$GLOBALS['txtProductID']."'";
    if ($GLOBALS['txtProductCode']<>'') $sql.=" AND productCode='".$GLOBALS['txtProductCode']."'";
    if ($GLOBALS['txtProductName']<>'') $sql.=" AND productName='".$GLOBALS['txtProductName']."'";
    if ($GLOBALS['txtProductDescription']<>'') $sql.=" AND productDescription='".$GLOBALS['txtProductDescription']."'";
    if ($GLOBALS['txtProductUnitPrice']<>'') $sql.=" AND productUnitPrice='".$GLOBALS['txtProductUnitPrice']."'";
    if ($GLOBALS['txtProductQuantity']<>'') $sql.=" AND productQuantity='".$GLOBALS['txtProductQuantity']."'";
        
    $result = mysqli_query($conn, $sql);
    
    $count= mysqli_num_rows($result);


    echo "<h3>".$count." product(s) listed</h3>";

    echo "<form id='myForm' action='prod_UPDATE.php' method='post'>";
    echo "<table>";

            echo "<tr>";
            echo "<th>Product ID</th><th>Product Code</th><th>Product Name</th><th>Product Description</th><th>Product Unit Price</th><th>Product Quantity</th>";
            echo "<td></td></tr>";

    $c=0; 
    $strAlert="";
    if($count > 0){
		while($row = mysqli_fetch_assoc($result)){
            $c=$c+1;
            echo "<tr>";
            echo "<td>".$row['productID']."</td>";
            echo "<td>".$row['productCode']."</td>";
            echo "<td>".$row['productName']."</td>";
            echo "<td>".$row['productDescription']."</td>";
            echo "<td>".$row['productUnitPrice']."</td>";
            echo "<td>".$row['productQuantity']."</td>";
            echo "<td>";
            echo "<button id='btnEdit$c' class='btn-default' onclick='clickEdit(this,\"".$row['productID']."\",\"".$row['productCode']."\",\"".$row['productName']."\",\"".$row['productDescription']."\",\"".$row['productUnitPrice']."\",";
            echo $row['productQuantity'].");'>edit</button>";
            echo "&nbsp;<button id='btnDel$c' class='btn-default' onclick='clickDelete(this,\"".$row['productID']."\");'>delete</button>";
            echo "</td>";
            echo "</tr>";
            if ((int)$row['productQuantity']<10)
                $strAlert.=$row['productCode']." (".$row['productName'].") : ".$row['productQuantity']." left<br>";
		}
    }
    
    echo "</table>";
    echo "</form>";

    mysqli_close($conn);
    	
?>

<script>
    /*
  <tr><td>Product ID:</td><td><input type="text" name="txtProductID" value="" placeholder="<Product ID>..."></td>
        <tr><td>Product Code:</td><td><input type="text" name="txtProductCode" value="" placeholder="<Product Code>..."></td>
        <tr><td>Product Name:</td><td><input type="text" name="txtProductName" value="" placeholder="<Product Name>..."></td>
        <tr><td>Product Description:</td><td><input type="text" name="txtProductDescription" value="" placeholder="<Product Description>..."></td>
        <tr><td>Product Unit Price:</td><td><input type="text" name="txtProductUnitPrice" value="" placeholder="<Product Unit Price>..."></td>
        <tr><td>Product Quantity:</td><td><input type="text" name="txtProductQuantity" value="" placeholder="<Product Quantity>..."></td>
     
    */
    document.getElementById("spanAlert").innerHTML="<?php echo $strAlert; ?>";

    var eid;
    function clickEdit(e,pID,pCode,pName,pDesc,pUnit,pQty)
    {
        eid=e.id;
        disableButtons(eid);
     
        var f=e.parentElement;
        var g=e.parentElement.parentElement;
        //alert(pID);
        //alert(eid);
        //alert(f.id);
        //alert(f.tagName);
        //alert(p.children(1));
        var s="";
        s+="<td><input type=text name=txtProductID value='"+pID+"'></td>";
        s+="<td><input type=text name=txtProductCode value='"+pCode+"'></td>";
        s+="<td><input type=text name=txtProductName value='"+pName+"'></td>";
        s+="<td><input type=text name=txtProductDescription value='"+pDesc+"'></td>";
        s+="<td><input type=text name=txtProductUnitPrice value='"+pUnit+"'></td>";
        s+="<td><input type=text name=txtProductQuantity value='"+pQty+"'></td>";
        s+="<td>";
        //s+="<input class='btn' type='submit' value='save'>";
		s+="<button class='btn-default' onclick='submit();''>save</button>&nbsp;";
        s+="<button class='btn-default' onclick='clickCancel();''>cancel</button>";
        s+="</td>";
        g.innerHTML=s;
        
    }

    function clickDelete(e,pID)
    {
        //alert(pID);
        
        var YN=confirm("Are you sure you want to Delete?");
        if (YN==true)
            window.location.href="prod_DELETE.php?txtProductID="+pID;
        else
            return false;
    }

    function clickCancel()
    {
        var YN=confirm("Are you sure you want to Cancel?");
        if (YN==true)
            window.location.href="prod_view.php";
        
        return false;
    }

    function disableButtons(d)
    {
        var n=Number("<?php echo $c ?>");
        for (var i=1; i<=n; i++)
        {
            if ("btnEdit"+i!=d)
            {
                document.getElementById("btnEdit"+i).disabled=true;
                document.getElementById("btnDel"+i).disabled=true;
            }
        }
    }

</script>