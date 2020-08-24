<?php $title = "السلة"; ?>
<?php include('includes/header.php'); ?>
<div class="wrapper">
  <div class="warn mb-30">
    سلة المشتريات فارغة
  </div>
  <div class="shopping-cart-container">
    <table class="t">
      <tr>
        <td><div class="product-image"></div></td>
        <td>هذا النص للتجربة</td>
        <td>
          الكمية
        </td>
        <td><div class="price">100 ر.س</div></td>
        <td><div class="remove"></div></td>
      </tr>

    </table>
    <table>
      <tr>
        <td></td>
          <td></td>
          <td></td>
          <td> <div class="price">إجمالي السعر:</div></td>
        <td></td>
      </tr>
      <tr>
        <td><div class="button add">إنهاء عملية الدفع</td>
          <td></td>
          <td></td>
          <td> <div class="price">100 ر.س</div></td>
        <td><div class="button">أكمل تصفح المنتجات</td>
      </tr>
    </table>
    <div class="flex" style="justify-content:space-between;">

    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php include('includes/footer.php'); ?>
