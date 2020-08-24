<?php $title = "عرض المنتج" ?>
<?php include('includes/header.php'); ?>
    <div class="wrapper">
        <div class="container">
            <div class="full-product" >
                <div class="product-images" style="position:relative; overflow:hidden;height:500px;">
                  <div class="slider">
                    <div class="main-img slide">
                        <img src="layout/jpeg/pexels-tuur-tisseghem-812264.jpg">
                    </div>
                    <div class="main-img slide">
                        <img src="layout/jpeg/pexels-tuur-tisseghem-812264.jpg">
                    </div>
                  </div>

                    <div class="sec-img" style="position:absolute;bottom:0;">
                        <img src="layout/jpeg/pexels-tuur-tisseghem-812264.jpg" >
                        <img src="layout/jpeg/pexels-tuur-tisseghem-812264.jpg" >
                        <img src="layout/jpeg/pexels-tuur-tisseghem-812264.jpg" >
                        <img src="layout/jpeg/pexels-tuur-tisseghem-812264.jpg">
                    </div>
                    <div class="slide-button left">
                      <i class="fas fa-arrow-left"></i>
                    </div>
                    <div class="slide-button right">
                      <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
                <div class="product-description">
                    <h1>ريزر لوحة مفاتيح ريزر بلاك ويدو تي إي كروما الإصدار الثاني</h1>
                    <p class="pro-price mb-10">ر س 2,399.00</p>
                    <p class="availability mb-10">متوفر</p>
                    <p class="delev mb-10">يتم التوصيل في خلال 4 - 8 ايام عمل</p>
                    <ul class="mb-10">
                        <li><p>نوع الماركة : HP</p></li>
                        <li>SSD:256GB</li>
                        <li>RAM:8GB</li>
                        <li>Graphics:AMD Radeon</li>
                        <li>Processor:R5-3500U</li>
                        <li>OS: Windows 10</li>
                    </ul>
                    <hr class="mb-30">
                    <div class="item-counter mb-10">
                        <button><i class="fas fa-plus"></i></button>
                        <input type="number" class="counter-input" value="1">
                        <button><i class="fas fa-minus"></i></button>
                    </div>
                    <input type="button" class="addpr mb-30" name="" id="" value="اضف للسلة">
                    <div class="extra-desc">
                        <button id="btnn1" onclick="showDesc()">الوصف و المميزات</button>
                        <button id="btnn2" onclick="showPrice()">الدفع و التوصيل</button>
                        <p id="descDesc">Pace by Jaguar is a Aromatic Fougere fragrance for men. Pace was launched in 2016. Pace was created by Alexandra Monet and Philippe Romano. Top notes are black pepper, green apple and rosemary. middle notes are cashmere wood, lavender and iris flower. base notes are amberwood, patchouli and moss.</p>
                        <p id="descPrice"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showDesc()
        {
            document.getElementById("btnn1").style.color = "#6381a8";
            document.getElementById("btnn2").style.color = "black";

            document.getElementById("btnn1").style.borderBottom = "1.5px solid #6381a8";
            document.getElementById("btnn2").style.border = "none";

            document.getElementById("descDesc").innerHTML = "Pace by Jaguar is a Aromatic Fougere fragrance for men. Pace was launched in 2016. Pace was created by Alexandra Monet and Philippe Romano. Top notes are black pepper, green apple and rosemary. middle notes are cashmere wood, lavender and iris flower. base notes are amberwood, patchouli and moss.";
        }

        function showPrice()
        {
            document.getElementById("btnn2").style.color = "#6381a8";
            document.getElementById("btnn1").style.color = "black";

            document.getElementById("btnn2").style.borderBottom = "1.5px solid #6381a8";
            document.getElementById("btnn1").style.border = "none";

            document.getElementById("descDesc").innerHTML = "Payment method Accepted. OnlinePayment. You can pay by using Master Visa and Amex Credit Card*Only GCC card Accepted*Corporate Cards Not accepted.";
        }
    </script>
    <script type="text/javascript" src="layout/js/all.js">

    </script>
<?php include('includes/footer.php'); ?>
