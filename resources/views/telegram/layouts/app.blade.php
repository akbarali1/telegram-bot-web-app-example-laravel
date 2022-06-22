<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://telegram.org/js/telegram-web-app.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        #nav-tab {
            background-color: #85FFBD;
            background-image: linear-gradient(45deg, #85FFBD 0%, #FFFB7D 100%);
        }

        div.tab-pane {
            padding-top: 10px;
        }

        .col-4.product > img {
            height: 120px;
            display: block;
            margin: 0 auto 10px;
            max-width: inherit;
        }

        .col-4.product {
            text-align: center;
            margin-bottom: 20px;
        }

        .fa-heart {
            color: red;
        }

        span.price-badge {
            position: absolute;
            bottom: 4px;
        }

        span.badge.rounded-pill.bg-danger.cart-sum,
        .checkout-sum {
            font-size: xx-small;
        }

        .tab-pane > h2 {
            margin: 20px auto 30px;
        }

        div#staticBackdrop {
            background: #000000cf;
            transition-duration: 1s;
        }
    </style>
</head>
<body>
<div id="app">
    <main class="container">
        @yield('content')
    </main>
    <div class="modal hide" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title <span
                            class="badge rounded-pill bg-danger price-badge">0.00 sum.</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">...</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal hide" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Haridni tasdiqlash</h5>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">Harid summasi</li>
                        <li class="list-group-item bg-success text-white bg-opacity-25 pay-sum">0.00 sum</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pay-cancel">Haridga qaytish</button>
                    <button type="button" class="btn btn-primary" id="pay-confirm">Tasdiqlash</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const telegram     = window.Telegram.WebApp
        const telegramData = telegram.initDataUnsafe
        if (Object.keys(telegramData).length === 0 || typeof telegramData.user === 'undefined') {
            document.querySelector("body").innerText =
                "Xatolik, Green Market faqat @im_green_market_bot ichida xizmat ko'rsatadi !";
            // window.location.href = "https://mproweb.uz/";
        } else {
            telegram.expand()
            document.querySelector("#logbox").innerText = JSON.stringify(telegram, null, 4)
        }
        const themeParams = telegram.themeParams
        const mainButton  = telegram.MainButton
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v6.1.1/js/all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let isTab          = false
        const showInfo     = (product) => {
            document.querySelector("#exampleModalLabel").innerHTML = product.title +
                ` <span class="badge rounded-pill bg-danger">${product.price} sum.</span>`
            document.querySelector(".modal-body").innerText        = product.info
        }
        const saveProduct  = (product) => {
            console.log("saqlaymiz");
        }
        const totalSum     = (products) => {
            let cartSum = 0
            if (products.length > 0) {
                products.forEach(product => {
                    cartSum += product.price
                })
            }
            document.querySelector(".cart-sum").innerText = cartSum
            return cartSum
        }
        const getCardList  = (products) => {
            const cardList = document.querySelector(".cart-list")
            if (products.length > 0) {
                // renderMainBtn({
                //     'newText': totalSum(products)
                // })
                mainButton.show();
                mainButton.setParams({
                    'text'      : `To'lov ${totalSum(products)} sum.`,
                    'color'     : "#2ECC71",
                    'text_color': "#F7F9F9"
                })
                cardList.innerHTML = ""
                let animClass      = ''
                products.forEach((product, index) => {
                    animClass = (index % 2) ? "animate__fadeInRight" : "animate__fadeInLeft"
                    cardList.innerHTML += `<li class="list-group-item d-flex justify-content-between align-items-start animate__animated ${animClass}">
                                <div class="ms-2">
                                    <img src="img/${product.photo}" alt="${product.title}" class="card-thumps">
                                </div>
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">${product.title}</div>
                                    <span>${product.price} sum.</span>
                                </div>
                                <span class="badge bg-danger rounded-pill remove-product" data-productindex="${index}"><i class="fa-regular fa-trash-can"></i></span>
                            </li>`
                })
            } else {
                // mainButton.hide()
                if (isTab) {
                    mainButton.setParams({
                        'text'      : `Tanlanmagan !!!`,
                        'color'     : "#7D3C98",
                        'text_color': "#F2F3F4"
                    })
                }
                cardList.innerHTML = "Mahsulotlar topilmadi !"
            }
        }
        const getCart      = (newCart = false) => {
            if (newCart) localStorage.setItem("cart", JSON.stringify(newCart));
            return localStorage.getItem("cart") ? JSON.parse(localStorage.getItem("cart")) : []
        }
        const addToCart    = (product) => {
            cart.push(product)
            getCart(cart)
            isTab = true
            getCardList(cart)
            reConfigBtns()
        }
        const reConfigBtns = () => {
            document.querySelectorAll(".remove-product").forEach(btn => {
                btn.addEventListener("click", () => {
                    cart.splice(+btn.dataset.productindex, 1);
                    getCart(cart)
                    totalSum(cart)
                    getCardList(cart)
                    reConfigBtns()
                })
            })
        }
        const log          = (obj) => {
            document.querySelector("#logbox").innerText = JSON.stringify(obj, null, 4);
        }
        let cart           = getCart()
        totalSum(cart)
        getCardList(cart)
        reConfigBtns()
        document.addEventListener("DOMContentLoaded", () => {
            const store = document.querySelectorAll(".btn-outline-info")
            store.forEach(el => {
                el.addEventListener("click", () => {
                    switch (el.dataset.rol) {
                        case "info":
                            showInfo(JSON.parse(el.parentElement.dataset.product))
                            break
                        case "save":
                            saveProduct(JSON.parse(el.parentElement.dataset.product))
                            break
                        case "buy":
                            addToCart(JSON.parse(el.parentElement.dataset.product))
                            break
                        default:
                            break
                    }
                })
            })
            document.querySelector(".checkout-clear").addEventListener("click", () => {
                cart  = getCart([])
                isTab = true
                totalSum(cart)
                getCardList(cart)
            })
            mainButton.onClick(() => {
                log(cart)
                if (totalSum(cart) > 1) {
                    // Serverga post uslubida so'rov yuborish
                    axios.post('api.php', {
                        user      : telegramData.user,
                        orderData : cart,
                        orderPrice: totalSum(cart),
                        currence  : "UZS"
                    })
                        // So'rov muvaffaqiyatli yakunlanganda
                        .then(function (response) {
                            // console.log(response);
                            log(response)
                            if (response.data.result) telegram.close()
                        })
                        // So'rov xatolar bilan yakunlanganda
                        .catch(function (error) {
                            // console.log(error);
                            log(error)
                        });
                } else {
                    mainButton.setParams({
                        'text'      : `Mahsulot tanlang !!!`,
                        'color'     : "#F4D03F",
                        'text_color': "#6C3483",
                    })
                    // mainButton.hide();
                }
            })
        });
    </script>
</div>
</body>
</html>
