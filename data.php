<!DOCTYPE html>
<?php
           
include 'db_connection.php';
$mysqli = OpenCon();
//        var_dump($_POST);
//    die();
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
        $uniqueid = $_POST['uid'];
    $qu = "SELECT * FROM datashort_sheet1 WHERE `Customer ID`='".$uniqueid."'";
//    var_dump($qu);
//die();
    $result = $mysqli->query($qu);
if (!$result) {
    echo "Error";
    die();
}
if ($result->num_rows == 0) {
    echo "Error";
    die();
}
$row = $result->fetch_assoc();

//    var_dump($row);
//    die();
    $score=0;

$activeloans = 1;
$loanpaid = 0;
    ($row["loanstatus"]==1) ? $row["loanstatus"]=$activeloans : $row["loanstatus"]=$loanpaid;    
$yearlyincome = $row['yearlyincome'];
for($i=1; $i<=$activeloans; $i++)
{
	$score+=80;	
}


for($i=1; $i<=$loanpaid; $i++)
{
	$score+=100;
}

//        $yearlyincome = $mysqli->query("SELECT ".$row["yearlyincome"]." FROM datashort_sheet1 WHERE  `Customer ID`='".$uniqueid."'");
//        $year
for($i=50000; $i<=$yearlyincome; $i+=50000)
{
	$score+=13.5;
}

        $defaultmonth = $row['defaultmonth'];

{

	if($defaultmonth<=3)
	{
		$score-=20;
	}
	
	else if($defaultmonth<=12 && $defaultmonth>3)
	{
		$score-=15;
	}
	else if($defaultmonth>12)
	{
		$score-=5;
	}
	else if($defaultmonth==0)
	{
		$score+=60;
	}
}

        $maxopencredit = $row['maxopencredit'];
        
for($i=50000; $i<=$maxopencredit; $i+=50000)
{
	$score+=6.5;
}

        $creditbalance = $row['creditbalance'];
        
{
	if($creditbalance<=50000)
	{
		$score+=30;
	}
	if($creditbalance<=100000 && $creditbalance>50000)
	{
		$score+=40;
	}
	if($creditbalance<=200000 && $creditbalance>100000)
	{
		$score+=30;
	}
	if($creditbalance>200000)
	{	$score +=20;
		for($i=$creditbalance; $i>=200000; $i-=100000)
		{
			$score-=5;
		}
	}
}
//        echo $score;
    
?>
        
        
        

<html>
    <head>
        <style>
            html {
                background: url(plain2.jpg) no-repeat center center fixed;
                background-size: cover;
                height: 100%;
                overflow: hidden;
            } 
            
            body {
                overflow: scroll;
                height: 1000px;
                scroll-behavior: smooth;
            }
			#Main_header {
				display: flex;
                align-content: stretch;
				height: 90px;
				color: lightsalmon;
				font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
				font-size:55px;
				background-image: url(plain3.jpg);
                padding-top: 10px;
			}
            
            .container{
                display: flex;
                justify-content: center;
                padding-top: 10px;
                font-size: 45px;
                font-family: "Lucida Console", Monaco, monospace;
            }
            
            #text{
                color: aliceblue;
                font-size: 50px;
                font-family: "Trebuchet MS", Helvetica, sans-serif;
            }
            
            #text1{
                color: aliceblue;
                font-size: 40px;
                font-family: "Trebuchet MS", Helvetica, sans-serif;
            }
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Result</title>
    </head>
    <body>
        <h1 id="Main_header">Your Credit Score:</h1>
        <h2 class="container" ><?php echo $score; ?></h2>
        <div id="text">Here is how you can analyze your Credit Score:</div>
        <ul id="text1">
            <li>
                If your Score is greater than 800, then it is an excellent score!<br><br>
            </li>
            <li>
                If your Score lies between 700 and 800, then you can get most of the loans available.<br><br>
            </li>
            <li>
                If your Score lies between 650 and 700, then it is difficult to get a loan. However you can try improving your score.<br><br>
            </li>
            <li>
                If your score is below 650, then it is a bad score. You have to consider improving your Credit Score.<br><br>
            </li>
        </ul>
        
        <div id="text">Below are the links given that of Prominent Banks which offer Luring interest rates:
        </div>
        <ul id="text1">
            <li>
                <a href="#" style="color: lightseagreen">State Bank of India(SBI)</a>
            </li>
            <li>
                <a href="#" style="color: lightseagreen">HDFC Bank</a>
            </li>
            <li>
                <a href="#" style="color: lightseagreen">ICICI Bank</a>
            </li>
            <li>
                <a href="#" style="color: lightseagreen">LIC Bank</a>
            </li>
            <li>
                <a href="#" style="color: lightseagreen">IDBI Bank</a>
            </li>
            <li>
                <a href="#" style="color: lightseagreen">Punjab National Bank(PNB)</a>
            </li>
        </ul>
    </body>
</html>
    