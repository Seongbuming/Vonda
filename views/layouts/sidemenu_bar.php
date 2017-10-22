<?php
if (!isset($_COOKIE['token'])) {
    header('location: ./admin.php?page=login');
}
?>
<ul class="sidebar-nav">
    <li class="sidebar-text">
      <p class=" text-center">ADMIN</p>
    </li>
    <li class="sidebar-brand">
        <a href="#">
            <img src="images/logo2.png" alt="logo.png" />
        </a>
    </li>
    <li class="sidebar-menu menu-stati" >
        <a href="admin.php?page=home_stati">
          <img class="menu-item-icon"src="images/icons/admin_menu/gray/statistics.png" alt="statistics.png"/>
          <span class="menu-item-text ">통계</span>
        </a>
    </li>
    <li class="sidebar-menu menu-member">
        <a href="admin.php?page=member">
          <img class="menu-item-icon"src="images/icons/admin_menu/gray/user.png" alt="user.png" />
          <span class="menu-item-text">회원관리</span>
        </a>
    </li>
    <li class="sidebar-menu menu-notice">
        <a href="admin.php?page=notice_customer">
          <img class="menu-item-icon"src="images/icons/admin_menu/gray/notice.png" alt="notice.png" />
          <span class="menu-item-text ">공지사항</span>
        </a>
    </li>
    <li class="sidebar-menu menu-product">
        <a href="admin.php?page=product_list">
          <img class="menu-item-icon"src="images/icons/admin_menu/gray/product.png" alt="product.png" />
          <span class="menu-item-text ">상품관리</span>
        </a>
    </li>
    <li class="sidebar-menu menu-sales">
        <a href="admin.php?page=sales">
          <img class="menu-item-icon"src="images/icons/admin_menu/gray/order.png" alt="order.png" />
          <span class="menu-item-text ">주문관리</span>
        </a>
    </li>
    <!--
    <li class="sidebar-menu menu-calculate">
        <a href="admin.php?page=calculate_seller">
          <img class="menu-item-icon"src="images/icons/admin_menu/gray/calculate.png" alt="calculate.png" />
          <span class="menu-item-text ">정산관리</span>
        </a>
    </li>
  -->
    <li class="sidebar-menu menu-mainpage">
        <a href="admin.php?page=mainpage">
          <img class="menu-item-icon"src="images/icons/admin_menu/gray/main.png" alt="main.png" />
          <span class="menu-item-text ">메인페이지관리</span>
        </a>
    </li>
    <li class="sidebar-btn btn-logout">
      <a href="./?page=login&type=logout">로그아웃</a>
    </li>
</ul>
