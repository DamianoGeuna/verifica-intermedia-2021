<?php

require "./user/user.php";
require "./lib/JSONReader.php";

$UserList = JSONReader("./dataset/users-management-system.json");
$UserListDisplay = [];

foreach ($UserList as $user) {
    $UserObj=new User();
    $UserObj->setId($user['id']);
    $UserObj->setFirstName($user['firstName']);
    $UserObj->setLastName($user['lastName']);
    $UserObj->setEmail($user['email']);
    $UserObj->setBirthday($user['birthday']);
    $UserListDisplay[]=$UserObj;

}

if(isset($_GET['search_nome'])){
    $searchTextName=trim()
    $UserListDisplay = array_filter($UserListDisplay,searchUserName($_GET['search_nome']));
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        input.form-control {
            padding: 2px;
            line-height: 100%;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <header class="container-fluid bg-secondary text-light p-2">
        <div class="container">
            <h1 class="display-3 mb-0">
                User management system
            </h1>
            <h2 class="display-6">user list</h2>
        </div>
    </header>
    <div class="container">
        <table class="table">
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>cognome</th>
                <th>email</th>
                <th cellspan="2">età</th>
            </tr>
            <form action="./index.php">
            <tr>
                <th>
                    <input class="form-control" type="text" id="search_id">
                </th>

                <th>
                    <input class="form-control" type="text" id="search_nome">
                </th>

                <th>
                    <input class="form-control" type="text" id="search_lastname">
                </th>

                <th>
                    <input class="form-control" type="text" id="search_email">
                </th>

                <th>
                    <input class="form-control" type="text" id="search_birthday">
                </th>
                <th>
                    <button class="btn btn-primary" type="submit">cerca</button>
                </th>
            </tr>



            

            <?php

            foreach ($UserListDisplay as $row) {
                $id = $row->getId();
                $nome = $row->getFirstName();
                $cognome = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($row->getLastName())))); ;
                $email = $row->getEmail();
                $compleanno = $row->getAge();
                ?>
            <tr>
                <td><?= $id?> </td>
                <td><?= $nome?> </td>
                <td><?= $cognome?> </td>
                <td><?= $email?> </td>
                <td><?= $eta?> </td>

            </tr>  

            <?php
        }
        ?>





            </tr>
            





            </form>
        </table>
    </div>
</body>

</html>