<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- FontAwesome Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>E-Learning</title>
    <link rel="icon" href="../../assets/images/logo.png" type="image/x-icon">
    <title>Courses</title>
    <style>
        .addBtn {
            position: fixed;
            right: 20px;
            bottom: 20px;
            background: white;
            height: 50px;
            width: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }

        .form-control.isInvalid,
        .form-control-file.isInvalid {
            color: red !important;
            border-color: red !important;
        }

        .form-control.isInvalid+span,
        .form-control-file.isInvalid+span {
            display: block !important;
            color: red !important;
            font-size: 12px !important;
        }

        button:disabled {
            cursor: not-allowed;
        }

        .data-table {
            overflow: hidden;
            position: relative;
            overflow-y: auto;
            height: 70% !important;
        }

        .sticky-top {
            position: sticky;
            top: 0 !important;
        }

        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
        }

        /*Loader*/
        #dots5 {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            height: 50px;
            width: 50px;
            margin: -25px 0 0 -25px;
        }

        #dots5 span {
            position: absolute;
            width: 10px;
            height: 10px;
            background: rgba(0, 0, 0, 0.25);
            border-radius: 50%;
            -webkit-animation: dots5 1s infinite ease-in-out;
            animation: dots5 1s infinite ease-in-out;
        }

        #dots5 span:nth-child(1) {
            left: 0px;
            -webkit-animation-delay: 0.2s;
            animation-delay: 0.2s;
        }

        #dots5 span:nth-child(2) {
            left: 15px;
            -webkit-animation-delay: 0.3s;
            animation-delay: 0.3s;
        }

        #dots5 span:nth-child(3) {
            left: 30px;
            -webkit-animation-delay: 0.4s;
            animation-delay: 0.4s;
        }

        #dots5 span:nth-child(4) {
            left: 45px;
            -webkit-animation-delay: 0.5s;
            animation-delay: 0.5s;
        }

        @keyframes dots5 {
            0% {
                -webkit-transform: translateY(0px);
                transform: translateY(0px);
                -webkit-transform: translateY(0px);
                transform: translateY(0px);
                background: #d62d20;
            }

            25% {
                -webkit-transform: translateY(10px);
                transform: translateY(10px);
                -webkit-transform: translateY(10px);
                transform: translateY(10px);
                background: #ffa700;
            }

            50% {
                -webkit-transform: translateY(10px);
                transform: translateY(10px);
                -webkit-transform: translateY(10px);
                transform: translateY(10px);
                background: #008744;
            }

            100% {
                -webkit-transform: translateY(0px);
                transform: translateY(0px);
                -webkit-transform: translateY(0px);
                transform: translateY(0px);
                background: #0057e7;
            }
        }

        @-webkit-keyframes dots5 {
            0% {
                -webkit-transform: translateY(0px);
                transform: translateY(0px);
                background: #d62d20;
            }

            25% {
                -webkit-transform: translateY(10px);
                transform: translateY(10px);
                background: #ffa700;
            }

            50% {
                -webkit-transform: translateY(10px);
                transform: translateY(10px);
                background: #008744;
            }

            100% {
                -webkit-transform: translateY(0px);
                transform: translateY(0px);
                background: #0057e7;
            }
        }
    </style>
</head>

<body class="d-flex flex-column" style="height: 100vh;overflow: hidden;">
    <?php include("../header.php") ?>
    <button onclick="javascript:location.replace('addStudent.php')" class="btn btn-outline-warning rounded-circle addBtn"><i class="fa fa-plus" style="font-size: 30px;"></i></button>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class>
                        <div class="form-group">
                            <label class="col-form-label">Student Name</label>
                            <input required onkeyup="isValid(event)" class="form-control" id="user_name" name="user_name">
                            <span class="d-none">Enter Valid User Name</span>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input readonly type="email" required onkeyup="isValid(event)" class="form-control" id="email" name="email">
                            <!-- <span class="d-none">Enter Valid Email Address</span> -->
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Mobile Number</label>
                            <input onkeyup="isValid(event)" required class="form-control" id="mobile_number" name="mobile_number">
                            <span class="d-none">Enter Valid Mobile Number</span>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-form-label">Student Password</label>
                            <input type="password" onkeyup="isValid(event)" required class="form-control" id="password" name="password">
                            <span class="d-none">Enter Valid Password</span>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Confirm Password</label>
                            <input type="password" onkeyup="isValid(event)" required class="form-control" id="confirmation_password" name="confirmation_password">
                            <span class="d-none">Password not match</span>
                        </div> -->
                        <!-- <div class="form-group">
                            <label class="col-form-label">Featured Image</label>
                            <input onchange="isValid(event)" required placeholder="Upload Image" type="file" accept=".jpg,.png,.jpeg" class="form-control-file" id="course_img" name="course_img">
                            <span class="d-none">Please Select Feature Image</span>
                        </div> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning btn-sm" onclick="editHandler()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mx-0" style="height: inherit;">

        <?php include("../sidebar.php") ?>
        <div class="col-9 p-3 ">
            <h3 class="my-2 py-2 text-center shadow-sm border bg-light">Students Details</h3>
            <div class="data-table">
                <div id="backdrop" class="bg-light" style="opacity:0.6;top:0;left:0">
                </div>
                <div id="loader"></div>
                <table style="width:100%" class="p-2 shadow-lg table table-responsive-md table-hover table-striped">
                    <thead class="sticky-top">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="students">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    const loader = () => {
        let backdrop = document.getElementById("backdrop");
        backdrop.classList.add("h-100")
        backdrop.classList.add("w-100")
        let load = document.getElementById("loader");
        load.innerHTML = `<div id="dots5">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                `;
    }
    const closeLoader = () => {
        let backdrop = document.getElementById("backdrop");
        backdrop.classList.remove("h-100")
        backdrop.classList.remove("w-100")
        let load = document.getElementById('loader');
        load.innerHTML = "";
    }
    let formData = {
        "user_name": "",
        "email": "",
        "mobile_number": "",
        // "password": "",
        // "confirmation_password": "",
        "id": ""
        // "course_img": ""
    }
    const isValid = (event = false) => {
        let name, value;
        if (event) {
            name = event.target.name;
            value = event.target.value
        }
        formData[name] = value;
        let isCorrect = true;
        const {
            user_name,
            email,
            mobile_number,
            password,
            confirmation_password,
        } = formData;
        if (user_name.trim().length >= 3) {
            isCorrect = isCorrect && true;
            document.getElementById("user_name").classList.remove("isInvalid")
        } else {
            isCorrect = isCorrect && false
            document.getElementById("user_name").classList.add("isInvalid")
        }
        // if (email.trim().length >= 3) {
        //     isCorrect = isCorrect && true;
        //     document.getElementById("email").classList.remove("isInvalid")
        // } else {
        //     isCorrect = isCorrect && false
        //     document.getElementById("email").classList.add("isInvalid")
        // }
        if (mobile_number.trim().length === 10) {
            isCorrect = isCorrect && true;
            document.getElementById("mobile_number").classList.remove("isInvalid")
        } else {
            isCorrect = isCorrect && false
            document.getElementById("mobile_number").classList.add("isInvalid")
        }
        // if (password.trim().length > 8) {
        //     isCorrect = isCorrect && true;
        //     document.getElementById("password").classList.remove("isInvalid")
        // } else {
        //     isCorrect = isCorrect && false
        //     document.getElementById("password").classList.add("isInvalid")
        // }
        // if (confirmation_password.trim() === password) {
        //     isCorrect = isCorrect && true;
        //     document.getElementById("confirmation_password").classList.remove("isInvalid")
        // } else {
        //     isCorrect = isCorrect && false
        //     document.getElementById("confirmation_password").classList.add("isInvalid")
        // }

        return isCorrect
    }

    let data = '';
    const requestToServer = new XMLHttpRequest();
    requestToServer.open("GET", "getStudents.php", true)
    requestToServer.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    loader();
    requestToServer.onreadystatechange = function() {
        data = JSON.parse(this.responseText);
        let table = document.getElementById("students");
        let row = '';
        data.map((cur, index) => {
            for (key in cur) {
                    if (key === "id")
                        row += `<td>${index+1}</td>`;
                    else
                        row += `<td>${cur[key]}</td>`;
            }
            row +=
                `<td><button class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#editModal" onclick="editModalOpener(${cur.id})"><i class="fa fa-edit"></i></button></td>`
            row +=
                `<td><button class="btn btn-sm btn-outline-danger" onclick="deleteHandler(${cur.id})"><i class="fa fa-trash"></i></button></td>`
            row += "</tr>";
            closeLoader();
        });
        table.innerHTML = row;
    };
    const editModalOpener = (id) => {
        console.log(id, data)
        const selectedRow = data.find(cur => +cur.id === id);
        for (key in formData) {
            if (key !== "id")
                document.getElementById(key).value = selectedRow[key];
            formData[key] = selectedRow[key];
        }
        console.log(selectedRow)
    }

    function closeAllModals() {

        // get modals
        const modals = document.getElementsByClassName('modal');

        // on every modal change state like in hidden modal
        for (let i = 0; i < modals.length; i++) {
            modals[i].classList.remove('show');
            modals[i].setAttribute('aria-hidden', 'true');
            modals[i].setAttribute('style', 'display: none');
        }

        // get modal backdrops
        const modalsBackdrops = document.getElementsByClassName('modal-backdrop');

        // remove every modal backdrop
        for (let i = 0; i < modalsBackdrops.length; i++) {
            document.body.removeChild(modalsBackdrops[i]);
        }
    }
    const editHandler = () => {
        if (isValid()) {
            let ed = []
            for (key in formData) {
                ed.push(key + '=' + formData[key]);
            }
            ed = ed.join('&');
            loader();
            const req = new XMLHttpRequest();
            req.open("POST", "editStudent.php", true)
            requestToServer.open("GET", "getStudents.php", true)
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            req.onreadystatechange = function() {
                const res = JSON.parse(this.response);
                if (res.status) {
                    requestToServer.send();
                    closeAllModals()
                }
            };
            console.log(formData, data)
            req.send(ed);
        }
    }
    const deleteHandler = (id) => {
        loader();
        const result = fetch("deleteStudent.php", {
            method: "POST",
            body: id
        }).then(res => {
            return res.json();
        });
        result.then(res => {
            requestToServer.open("GET", "getStudents.php", true)
            requestToServer.send();
        }).catch(er => {
            console.log(er)
        })
    }
    if (!data)
        requestToServer.send();
</script>
<script src="../../js/jquery.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/all.min.js"></script>

</html>