function changeView() {
    var signInBox = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    //alert (fname.value);

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("u", username.value);
    f.append("p", password.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "ලියාපදිංචිය Success";
                document.getElementById("msg1").className = "alert alert-Success";
                document.getElementById("msgDiv1").className = "d-block";

                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                username.value = "";
                password.value = "";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }
        }
    };

    request.open("POST", "signUpProcess.php", true);
    request.send(f);
}

function signIn() {
    var e = document.getElementById("e");
    var pw = document.getElementById("pw");
    var rm = document.getElementById("rm");

    //alert(un.value);

    var f = new FormData();
    f.append("e", e.value);
    f.append("p", pw.value);
    f.append("r", rm.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                window.location = "index.php";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    };

    request.open("POST", "signInProcess.php", true);
    request.send(f);
}

function adminSignIn() { 
    // alert("හරි හරී");

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");

    // alert(un.value);

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if ((request.readyState == 4) & (request.status == 200)) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "adminDashboard.php";
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    };

    request.open("POST", "adminSignInProcess.php", true);
    request.send(f);
}

function loadUser() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("tb").innerHTML = response;
        }
    }

    request.open("POST", "loadUserProcess.php", true);
    request.send();
}

function updateUserStatus() {
    var userid = document.getElementById("uid");
    // alert(userid.value);

    var f = new FormData();
    f.append("u", userid.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            if (response == "Deactive") {
                document.getElementById("msg").innerHTML = "පරිශීලක අක්‍රිය කිරීම Success";
                document.getElementById("msg").className = "alert alert-Success";
                document.getElementById("msgDiv").className = "d-block";
                userid.value = "";
                loadUser();

            } else if (response == "Active") {
                document.getElementById("msg").innerHTML = "පරිශීලක සක්‍රීය කිරීම Success";
                document.getElementById("msg").className = "alert alert-Success";
                document.getElementById("msgDiv").className = "d-block";
                userid.value = "";
                loadUser();

            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    }

    request.open("POST", "updateUserStatusProcess.php", true);
    request.send(f);

}

function reload() {
    location.reload();
}

function brandReg() {

    // alert("Success ");
    var brand = document.getElementById("brand");

    var f = new FormData();
    f.append("b", brand.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "සන්නාම ලියාපදිංචිය Success";
                document.getElementById("msg1").className = "alert alert-Success";
                document.getElementById("msgDiv1").className = "d-block";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msg1").className = "alert alert-danger";
                document.getElementById("msgDiv1").className = "d-block";
            }

        }
    }

    request.open("POST", "brandRegisterProcess.php", true);
    request.send(f);

}

function categoryReg() {
    // alert("Success");
    var category = document.getElementById("category");

    var f = new FormData();
    f.append("b", category.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            if (response == "Success") {
                document.getElementById("msg2").innerHTML = "ප්‍රවර්ග ලියාපදිංචිය Success";
                document.getElementById("msg2").className = "alert alert-Success";
                document.getElementById("msgDiv2").className = "d-block";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msg2").className = "alert alert-danger";
                document.getElementById("msgDiv2").className = "d-block";
            }

        }
    }

    request.open("POST", "categoryRegisterProcess.php", true);
    request.send(f);
}

function colorReg() {
    // alert("Success");
    var color = document.getElementById("color");

    var f = new FormData();
    f.append("b", color.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            if (response == "Success") {
                document.getElementById("msg3").innerHTML = "වර්ණයන් ලියාපදිංචි කිරීම Success";
                document.getElementById("msg3").className = "alert alert-Success";
                document.getElementById("msgDiv3").className = "d-block";
            } else {
                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msg3").className = "alert alert-danger";
                document.getElementById("msgDiv3").className = "d-block";
            }

        }
    }

    request.open("POST", "colorRegisterProcess.php", true);
    request.send(f);
}

function sizeReg() {
    // alert("Success");
    var size = document.getElementById("size");

    var f = new FormData();
    f.append("b", size.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            if (response == "Success") {
                document.getElementById("msg4").innerHTML = "ප්‍රමාණයන් ලියාපදිංචි කිරීම Success";
                document.getElementById("msg4").className = "alert alert-Success";
                document.getElementById("msgDiv4").className = "d-block";
            } else {
                document.getElementById("msg4").innerHTML = response;
                document.getElementById("msg4").className = "alert alert-danger";
                document.getElementById("msgDiv4").className = "d-block";
            }

        }
    }

    request.open("POST", "sizeRegisterProcess.php", true);
    request.send(f);
}

function regProduct() {

    // alert("Success");

    var pname = document.getElementById("pname");
    var brand = document.getElementById("brand");
    var cat = document.getElementById("cat");
    var color = document.getElementById("color");
    var size = document.getElementById("size");
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");

    var form = new FormData();
    form.append("pname", pname.value);
    form.append("brand", brand.value);
    form.append("cat", cat.value);
    form.append("color", color.value);
    form.append("size", size.value);
    form.append("desc", desc.value);
    form.append("image", file.files[0]);


    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            alert(resp);
        }
    }
    req.open("POST", "productRegProcess.php", true);
    req.send(form);

}

function updateStock() {

    var pname = document.getElementById("selectProduct");
    var qty = document.getElementById("qty");
    var price = document.getElementById("uprice");

    // alert(pname.value)

    var f = new FormData();
    f.append("p", pname.value);
    f.append("q", qty.value);
    f.append("up", price.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            alert(response);
            location.reload();
        }
    }

    request.open("POST", "updateStockProcess.php", true);
    request.send(f);

}

function loadProduct(x) {
    var page = x;
    // alert(x);

    var f = new FormData();
    f.append("p", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    }

    request.open("POST", "loadProductProcess.php", true);
    request.send(f);

}

function searchProduct(x) {

    var page = x;
    var product = document.getElementById("product");

    // alert(page);
    // alert(product.value);

    var f = new FormData();
    f.append("p", product.value);
    f.append("pg", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    }
    request.open("POST", "searchProductProcess.php", true);
    request.send(f);
}

function viewFilter() {

    var filterElement = document.getElementById("filterId");
    var currentClass = filterElement.className;

    if (currentClass.includes("d-block")) {
        filterElement.className = "d-none";
    } else {
        filterElement.className = "d-block";
    }

}

// advance search 
function advSearchProduct(x) {
    // alert("ok");
    var page = x;
    var color = document.getElementById("color");
    var cat = document.getElementById("cat");
    var brand = document.getElementById("brand");
    var size = document.getElementById("size");
    var min = document.getElementById("min");
    var max = document.getElementById("max");

    var f = new FormData();
    f.append("pg", page);
    f.append("co", color.value);
    f.append("cat", cat.value);
    f.append("b", brand.value);
    f.append("s", size.value);
    f.append("min", min.value);
    f.append("max", max.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 & r.status == 200) { 
            var response = r.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response; 

            color.value = "0";
            cat.value = "0";
            brand.value = "0";
            size.value = "0";
            min.value = "";
            max.value = "";
        }
    };

    r.open("POST", "advSearchProductProcess.php", true);
    r.send(f);
}
// advance search 


function uploadImg() {
    var img = document.getElementById("imgUploader");

    var f = new FormData();
    f.append("i", img.files[0]);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if ((request.readyState == 4) & (request.status == 200)) {
            var response = request.responseText;
            if (response == "හිස්ව ඇත ") {
                alert("කරුණාකර ඔබගේ පැතිකඩ රූපය තෝරන්න");
            } else if (response !== "Success") {
                reload();
            } else {
                document.getElementById("i").src = response;
                img.value = "";
            }
        }
    };

    request.open("POST", "profileImgUploadProcess.php", true);
    request.send(f);
}

function updateData() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var pw = document.getElementById("pw");
    var no = document.getElementById("no");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("p", pw.value);
    f.append("n", no.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            alert(response);
        }
    }

    request.open("POST", "updateDataProcess.php", true);
    request.send(f);
}

function signOut() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            alert(response);
            reload();
        }
    }

    request.open("POST", "signOutProcess.php");
    request.send();

}

function addtoCart(x) {

    // alert(x);

    var stockId = x;
    var qty = document.getElementById("qty");

    if (qty.value != "") { //not = empty
        //alert("Success");

        var f = new FormData();
        f.append("s", stockId);
        f.append("q", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                alert(response);
                qty.value = "";
            }
        }

        request.open("POST", "addtoCartProcess.php", true);
        request.send(f);

    } else {
        alert("කරුණාකර ඔබේ ප්‍රමාණය ඇතුළත් කරන්න");
    }



}

function loadCart() {
    //alert("OK");

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            document.getElementById("cartBody").innerHTML = response;
        }
    }

    request.open("POST", "loadCartProcess.php", true);
    request.send();
}

function incrementCartQty(x) {

    //alert(x);

    var cardId = x;
    var qty = document.getElementById("qty" + x);
    //alert(qty.value);

    var newQty = parseInt(qty.value) + 1; //integer
    //alert(newQty);

    var f = new FormData();
    f.append("c", cardId);
    f.append("q", newQty);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);

            if (response == "Success") {
                qty.value = parseInt(qty.value) + 1;
                loadCart();
            } else {
                alert(response);
            }
        }
    }

    request.open("POST", "updateCartQtyProcess.php", true);
    request.send(f);


}

function decrementCartQty(x) {
    //alert(x);

    var cardId = x;
    var qty = document.getElementById("qty" + x);

    var newQty = parseInt(qty.value) - 1; //integer
    //alert(newQty);

    var f = new FormData();
    f.append("c", cardId);
    f.append("q", newQty);

    if (newQty > 0) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                //alert(response);

                if (response == "Success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadCart();
                } else {
                    alert(response);
                }
            }
        }

        request.open("POST", "updateCartQtyProcess.php", true);
        request.send(f);
    }


}

function removeCart(x) {
    //alert(x);

    if (confirm("මෙම අයිතමය මකන්න ඔබට විශ්වාසද?")) {

        var f = new FormData();
        f.append("c", x);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                alert(response);
                reload();
            }
        }


        request.open("POST", "removeCartProcess.php", true);
        request.send(f);

    }

}

function checkOut() {
    // alert("ok");

    var f = new FormData();
    f.append("cart", true);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            // alert(responce);
            var payment = JSON.parse(responce);
            doCheckout(payment, "checkoutProcess.php");
        }
    }

    request.open("POST", "paymentProcess.php", true);
    request.send(f);
}

function doCheckout(payment, path) { 

    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var responce = request.responseText;
                var order = JSON.parse(responce);
                // alert(responce);
                if (order.resp == "Success") {
                    // reload();
                    window.location.href = "invoice.php?orderId=" + order.order_id; 
                } else {
                    alert(responce);
                }
            }
        }

        request.open("POST", path, true);
        request.send(f);
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
    payhere.startPayment(payment);
    // };
}

function buyNow(stockId) {
    // alert(stockId);
    var qty = document.getElementById("qty");

    if (qty.value > 0) {

        var f = new FormData();
        f.append("cart", false);
        f.append("stockId", stockId);
        f.append("qty", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var responce = request.responseText;
                // alert(responce);
                var payment = JSON.parse(responce);
                payment.stock_id = stockId;
                payment.qty = qty.value;
                doCheckout(payment, "buynowProcess.php");
            }
        }

        request.open("POST", "paymentProcess.php", true);
        request.send(f);

    } else {
        alert("Please enter valid quantity");
    }
} 


function forgotPassword() {

    var email = document.getElementById("e").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            if (response == "success") {
                Swal.fire({
                    title: "Email Sent SuccessFully!",
                    text: response,
                    icon: "success",
                });
            } else {
                Swal.fire({
                    title: "Email Sent Fail Failed!",
                    text: response,
                    icon: "error",
                });
            }
        }
    }

    request.open("GET", "forgotPasswordProcess.php?e=" + email, true);
    request.send();

}

function showPassword() {

    var textfield = document.getElementById("np");
    var button = document.getElementById("npb");

    if (textfield.type == "password") {
        textfield.type = "text";
        button.innerHTML = "Hide";
    } else {
        textfield.type = "password";
        button.innerHTML = "Show";
    }

}

function showPassword2() {

    var textfield = document.getElementById("rnp");
    var button = document.getElementById("rnpb");

    if (textfield.type == "password") {
        textfield.type = "text";
        button.innerHTML = "Hide";
    } else {
        textfield.type = "password";
        button.innerHTML = "Show";
    }

}

function resetPassword() {
    var vcode = document.getElementById("vcode");
    var np = document.getElementById("np1");
    var np2 = document.getElementById("np2");
  
    var f = new FormData();
    f.append("vcode", vcode.value);
    f.append("np", np.value);
    f.append("np2", np2.value);
  
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var responce = request.responseText;
        // alert(responce);
        if (responce == "Success") {
          window.location = "signIn.php";
        } else {
          document.getElementById("msg2").innerHTML = responce;
          document.getElementById("msgDiv2").className = "alert alert-danger";
          document.getElementById("msgDiv2").className = "d-block";
        }
      }
    };
  
    request.open("POST", "resetPasswordProcess.php", true);
    request.send(f);
  }
  
  function loadChart() {
    var ctx = document.getElementById("myChart");
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            var data = JSON.parse(response);
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                  labels: data.labels,
                  datasets: [{
                    label: '# of Votes',
                    data: data.data,
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true 
                    }
                  }
                }
              });
        }
    }

    request.open("POST","loadChartProcess.php",true);
    request.send();
}

function printDiv() {
    // alert("okk");
    var fullcontent = document.body.innerHTML;
    var printarea = document.getElementById("printArea").innerHTML;
  
    document.body.innerHTML = printarea;
    window.print();
  
    document.body.innerHTML = fullcontent;
  }  

