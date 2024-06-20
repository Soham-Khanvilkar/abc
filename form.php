<html>
<head>
    <title>Register From</title>
</head>
<body>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Name :</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <td>Gender :</td>
                <td>
                    <input type="radio" name="gender" required>Male
                    <input type="radio" name="gender" required>Female
                </td>
            </tr>
            <td>Email :</td>
            <td><input type="email" name="email" required></td>
        </tr>
        </tr>
            <td>Phone no :</td>
            <td>
                <select name="phoneCode" required>
                    <option>+91</option>
                    <option selected hidden value="">Select Code</option>
                    <option value="+81">+81</option>
                    <option value="+41">+41</option>
                    <option value="+61">+61</option>
                    <option value="+1">+1</option>
                </select>
                <input type="phone" name="phone" required>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit"></td>
        </tr>
        </table>
    </form>
    
</body>
</html>       

<?php
$username=$_POST['username'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phoneCode=$_POST['phoneCode'];
$phone=$_POST['phone'];

if(!empty($username) || !empty($password) || !empty($gender) || !empty($email) || !empty($phoneCode) || !empty($phone)){
    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="register";
    //create connection
    $conn= new mysqli($host,$dbUsername,$dbPassword,$dbname);

    if(sqli_connect_error()){
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else{
        $_SELECT = "SELECT email From register Where email = ? Limit 1";
        $INSERT = "INSERT Into register (username,password,gender,email,phoneCode,phone) values(?,?,?,?,?,?)"

        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();                                                                                                                                          
        $rnum= $stmt->num_rows;

        if($rnum==0){
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssssii", $username,$password,$gender,$email,$phoneCode,$phone);
            $stmt->execute();
            echo "New record inserted sucessfully";
        } else{
            echo "Someone already register using this email";
        }
        $stmt->colse();
        $conn->close();
    }
}else{
    echo "All field are required";
    die();
}
?>