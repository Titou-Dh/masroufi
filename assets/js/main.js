function adds_ajout() {
    var id_user = 1;
    var name_adds = document.getElementById("name_add").value;
    var prix = document.getElementById("prix_add").value;

    var xhr = new XMLHttpRequest();
    var url = "api/ajout.php";
    var params = "id_user=" + id_user + "&name=" + name_adds + "&prix=" + prix;

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: "Success!",
                text: "adds added successfully!",
                icon: "success",
                confirmButtonText: "Cool",
            }).then(function () {
                window.location = "home.html";
            });
        }
    };

    xhr.send(params);
}
function add_dependents() {
    var id_user = 1;
    var name = document.getElementById("name_dependent").value;
    var price = document.getElementById("price_dependent").value;

    var xhr = new XMLHttpRequest();
    var url = "api/add_dependents.php";
    var params = "id_user=" + id_user + "&name=" + name + "&price=" + price;

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: "Success!",
                text: "dependent added successfully!",
                icon: "success",
                confirmButtonText: "Cool",
            }).then(function () {
                window.location = "home.html";
            });
        }
    };

    xhr.send(params);
}
function adds_epargne() {
    var id_user = 1;
    var amount = document.getElementById("amount_add").value;

    var xhr = new XMLHttpRequest();
    var url = "api/add_epargne.php";
    var params = "id_user=" + id_user + "&amount=" + amount;

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: "Success!",
                text: "epargne added successfully!",
                icon: "success",
                confirmButtonText: "Cool",
            }).then(function () {
                window.location = "home.html";
            });
        }
    };

    xhr.send(params);
}
function add_monthly_expense() {
    var id_user = 1;
    var subject = document.getElementById("subject_add").value;
    var amount = document.getElementById("monthly_amount_add").value;

    var xhr = new XMLHttpRequest();
    var url = "api/add_trans_mens.php";
    var params = "id_user=" + id_user + "&subject=" + subject +"&amount=" + amount;

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: "Success!",
                text: "Expense added successfully!",
                icon: "success",
                confirmButtonText: "Cool",
            }).then(function () {
                window.location = "home.html";
            });
        }
    };

    xhr.send(params);
}

function add_payement() {
    var id_user = 1;
    var name_payement = document.getElementById("name_payement").value;
    var prix_payement = document.getElementById("prix_payement").value;

    var xhr = new XMLHttpRequest();
    var url = "api/add_payement.php";
    var params =
        "id_user=" + id_user + "&name=" + name_payement + "&prix=" + prix_payement;

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: "Success!",
                text: "adds added successfully!",
                icon: "success",
                confirmButtonText: "Cool",
            }).then(function () {
                window.location = "home.html";
            });
        }
    };

    xhr.send(params);
}


function getTransactions() {

    var sortOrder = document.getElementById("sort_order").value;

    var url = "api/read_transactions.php?sort_order=" + sortOrder;

    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById("transactions").innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}




function loadUserInfo() {

    var url = "api/read_user_info.php";
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById("user_info").innerHTML = data;
        })
        .catch(error => console.error('Error:', error));

}
function getMail() {

    var url = "api/get_mail.php";
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById("mail").innerHTML = data;
        })
        .catch(error => console.error('Error:', error));

}
function getEpargne() {

    var url = "api/get_epargne.php";
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById("savings").innerHTML = data;
        })
        .catch(error => console.error('Error:', error));

}


function fillUserInfo() {
    var url = "api/profile_fill.php";
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById("info-perso").innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}


function getSavings() {
    var url = "api/read_epargne.php";
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById("saving").innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}
function getMonthlyExpenses() {
    var url = "api/read_trans_mens.php";
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById("monthly_expense").innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}



function readModifProfil(){
    var url = "api/read_modif_profil.php";
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById("inputs").innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}


function deleteExpense(expenseId) {
    if(confirm("Are you sure you want to delete this expense?")) {
        var xhr = new XMLHttpRequest();
        var url = "api/delete_trans_mens.php";
        var params = "expense_id=" + expenseId;

        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if(response.success) {
                    Swal.fire({
                        title: "Success!",
                        text: "Expense deleted successfully!",
                        icon: "success",
                        confirmButtonText: "Cool",
                    }).then(function () {
                        window.location = "home.html";
                    });
                } else {
                    alert("Failed to delete expense: " + response.error);
                }
            }
        };

        xhr.send(params);
    }
}

















function modifUserInfo() {
    var id_user = 1;
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var email = document.getElementById("email").value;

    var xhr = new XMLHttpRequest();
    var url = "api/modif_user_info.php";
    var params = "id_user=" + id_user + "&nom=" + nom + "&prenom=" + prenom + "&email=" + email;

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: "Success!",
                text: "User info updated successfully!",
                icon: "success",
                confirmButtonText: "Cool",
            }).then(function () {
                window.location = "home.html";
            });
        }
    };

    xhr.send(params);
}