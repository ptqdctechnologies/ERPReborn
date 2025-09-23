<!DOCTYPE html>
<html lang="en" style="height: auto;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Advanced form elements</title>

    <?php
    echo \App\Helpers\ZhtHelper\UserInterface\Helper_AdminLTE::initHead_CSSAndJS();
    ?>
    <script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyQWRtaW5MVEUlMjAzJTIwJTdDJTIwQWR2YW5jZWQlMjBmb3JtJTIwZWxlbWVudHMlMjIlMkMlMjJ4JTIyJTNBMC4yMjU3NTYwMjQyMDA5MDUzNSUyQyUyMnclMjIlM0ExMzY2JTJDJTIyaCUyMiUzQTc2OCUyQyUyMmolMjIlM0E2MjklMkMlMjJlJTIyJTNBNjg5JTJDJTIybCUyMiUzQSUyMmh0dHBzJTNBJTJGJTJGYWRtaW5sdGUuaW8lMkZ0aGVtZXMlMkZ2MyUyRnBhZ2VzJTJGZm9ybXMlMkZhZHZhbmNlZC5odG1sJTIyJTJDJTIyciUyMiUzQSUyMmh0dHBzJTNBJTJGJTJGd3d3Lmdvb2dsZS5jb20lMkYlMjIlMkMlMjJrJTIyJTNBMjQlMkMlMjJuJTIyJTNBJTIyVVRGLTglMjIlMkMlMjJvJTIyJTNBLTQyMCUyQyUyMnElMjIlM0ElNUIlNUQlN0Q="></script><script nonce="0ec62b6a-a481-4baa-a2a0-6c0dc0ac7f84">(function(w,d){!function(e,f,g,h){e.zarazData=e.zarazData||{};e.zarazData.executed=[];e.zaraz={deferred:[],listeners:[]};e.zaraz.q=[];e.zaraz._f=function(i){return function(){var j=Array.prototype.slice.call(arguments);e.zaraz.q.push({m:i,a:j})}};for(const k of["track","set","debug"])e.zaraz[k]=e.zaraz._f(k);e.zaraz.init=()=>{var l=f.getElementsByTagName(h)[0],m=f.createElement(h),n=f.getElementsByTagName("title")[0];n&&(e.zarazData.t=f.getElementsByTagName("title")[0].text);e.zarazData.x=Math.random();e.zarazData.w=e.screen.width;e.zarazData.h=e.screen.height;e.zarazData.j=e.innerHeight;e.zarazData.e=e.innerWidth;e.zarazData.l=e.location.href;e.zarazData.r=f.referrer;e.zarazData.k=e.screen.colorDepth;e.zarazData.n=f.characterSet;e.zarazData.o=(new Date).getHourOfTimeZoneOffset();if(e.dataLayer)for(const r of Object.entries(Object.entries(dataLayer).reduce(((s,t)=>({...s[1],...t[1]})))))zaraz.set(r[0],r[1],{scope:"page"});e.zarazData.q=[];for(;e.zaraz.q.length;){const u=e.zaraz.q.shift();e.zarazData.q.push(u)}m.defer=!0;for(const v of[localStorage,sessionStorage])Object.keys(v||{}).filter((x=>x.startsWith("_zaraz_"))).forEach((w=>{try{e.zarazData["z_"+w.slice(7)]=JSON.parse(v.getItem(w))}catch{e.zarazData["z_"+w.slice(7)]=v.getItem(w)}}));m.referrerPolicy="origin";m.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(e.zarazData)));l.parentNode.insertBefore(m,l)};["complete","interactive"].includes(f.readyState)?zaraz.init():e.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script>
</head>
    
<body class="sidebar-mini sidebar-closed sidebar-collapse" style="height: auto;">
    <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
    <a href="../../index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
    <a href="#" class="nav-link">Contact</a>
    </li>
    </ul>

    <ul class="navbar-nav ml-auto">

    <li class="nav-item">
    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
    <i class="fas fa-search"></i>
    </a>
    <div class="navbar-search-block">
    <form class="form-inline">
    <div class="input-group input-group-sm">
    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
    <button class="btn btn-navbar" type="submit">
    <i class="fas fa-search"></i>
    </button>
    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
    <i class="fas fa-times"></i>
    </button>
    </div>
    </div>
    </form>
    </div>
    </li>

    <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
    <i class="far fa-comments"></i>
    <span class="badge badge-danger navbar-badge">3</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    <a href="#" class="dropdown-item">

    <div class="media">
    <img src="{{ asset('AdminLTE-master/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
    <div class="media-body">
    <h3 class="dropdown-item-title">
    Brad Diesel
    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
    </h3>
    <p class="text-sm">Call me whenever you can...</p>
    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
    </div>
    </div>

    </a>
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item">

    <div class="media">
    <img src="{{ asset('AdminLTE-master/dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
    <div class="media-body">
    <h3 class="dropdown-item-title">
    John Pierce
    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
    </h3>
    <p class="text-sm">I got your message bro</p>
    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
    </div>
    </div>

    </a>
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item">

    <div class="media">
    <img src="{{ asset('AdminLTE-master/dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
    <div class="media-body">
    <h3 class="dropdown-item-title">
    Nora Silvester
    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
    </h3>
    <p class="text-sm">The subject goes here</p>
    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
    </div>
    </div>

    </a>
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
    </div>
    </li>

    <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
    <i class="far fa-bell"></i>
    <span class="badge badge-warning navbar-badge">15</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    <span class="dropdown-item dropdown-header">15 Notifications</span>
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item">
    <i class="fas fa-envelope mr-2"></i> 4 new messages
    <span class="float-right text-muted text-sm">3 mins</span>
    </a>
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item">
    <i class="fas fa-users mr-2"></i> 8 friend requests
    <span class="float-right text-muted text-sm">12 hours</span>
    </a>
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item">
    <i class="fas fa-file mr-2"></i> 3 new reports
    <span class="float-right text-muted text-sm">2 days</span>
    </a>
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
    <i class="fas fa-expand-arrows-alt"></i>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
    <i class="fas fa-th-large"></i>
    </a>
    </li>
    </ul>
    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ asset('AdminLTE-master/index3.html') }}" class="brand-link">
    <img src="{{ asset('AdminLTE-master/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
    <img src="{{ asset('AdminLTE-master/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
    <a href="#" class="d-block">Alexander Pierce</a>
    </div>
    </div>

    <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
    <button class="btn btn-sidebar">
    <i class="fas fa-search fa-fw"></i>
    </button>
    </div>
    </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item"><div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div><div class="search-path"></div></a></div></div>
    </div>

    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
    Dashboard
    <i class="right fas fa-angle-left"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="../../index.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Dashboard v1</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../../index2.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Dashboard v2</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../../index3.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Dashboard v3</p>
    </a>
    </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="../widgets.html" class="nav-link">
    <i class="nav-icon fas fa-th"></i>
    <p>
    Widgets
    <span class="right badge badge-danger">New</span>
    </p>
    </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="nav-icon fas fa-copy"></i>
    <p>
    Layout Options
    <i class="fas fa-angle-left right"></i>
    <span class="badge badge-info right">6</span>
    </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="../layout/top-nav.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Top Navigation</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../layout/top-nav-sidebar.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Top Navigation + Sidebar</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../layout/boxed.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Boxed</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../layout/fixed-sidebar.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Fixed Sidebar</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../layout/fixed-sidebar-custom.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Fixed Sidebar <small>+ Custom Area</small></p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../layout/fixed-topnav.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
     <p>Fixed Navbar</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../layout/fixed-footer.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Fixed Footer</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../layout/collapsed-sidebar.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Collapsed Sidebar</p>
    </a>
    </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="nav-icon fas fa-chart-pie"></i>
    <p>
    Charts
    <i class="right fas fa-angle-left"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="../charts/chartjs.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>ChartJS</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../charts/flot.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Flot</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../charts/inline.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Inline</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../charts/uplot.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>uPlot</p>
    </a>
    </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="nav-icon fas fa-tree"></i>
    <p>
    UI Elements
    <i class="fas fa-angle-left right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="../UI/general.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>General</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../UI/icons.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Icons</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../UI/buttons.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Buttons</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../UI/sliders.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Sliders</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../UI/modals.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Modals &amp; Alerts</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../UI/navbar.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Navbar &amp; Tabs</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../UI/timeline.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Timeline</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../UI/ribbons.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Ribbons</p>
    </a>
    </li>
    </ul>
    </li>
    <li class="nav-item menu-open">
     <a href="#" class="nav-link active">
    <i class="nav-icon fas fa-edit"></i>
    <p>
    Forms
    <i class="fas fa-angle-left right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="../forms/general.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>General Elements</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../forms/advanced.html" class="nav-link active">
    <i class="far fa-circle nav-icon"></i>
    <p>Advanced Elements</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../forms/editors.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Editors</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../forms/validation.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Validation</p>
    </a>
    </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="nav-icon fas fa-table"></i>
    <p>
    Tables
    <i class="fas fa-angle-left right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="../tables/simple.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Simple Tables</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../tables/data.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>DataTables</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../tables/jsgrid.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>jsGrid</p>
    </a>
    </li>
    </ul>
    </li>
    <li class="nav-header">EXAMPLES</li>
    <li class="nav-item">
    <a href="../calendar.html" class="nav-link">
    <i class="nav-icon far fa-calendar-alt"></i>
    <p>
    Calendar
    <span class="badge badge-info right">2</span>
    </p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../gallery.html" class="nav-link">
    <i class="nav-icon far fa-image"></i>
    <p>
    Gallery
    </p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../kanban.html" class="nav-link">
    <i class="nav-icon fas fa-columns"></i>
    <p>
    Kanban Board
    </p>
    </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="nav-icon far fa-envelope"></i>
    <p>
    Mailbox
    <i class="fas fa-angle-left right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="../mailbox/mailbox.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Inbox</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../mailbox/compose.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Compose</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../mailbox/read-mail.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Read</p>
    </a>
    </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="nav-icon fas fa-book"></i>
    <p>
    Pages
    <i class="fas fa-angle-left right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="../examples/invoice.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Invoice</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/profile.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Profile</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/e-commerce.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>E-commerce</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/projects.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Projects</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/project-add.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Project Add</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/project-edit.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Project Edit</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/project-detail.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Project Detail</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/contacts.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Contacts</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/faq.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>FAQ</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/contact-us.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Contact us</p>
    </a>
    </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="nav-icon far fa-plus-square"></i>
    <p>
    Extras
    <i class="fas fa-angle-left right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>
    Login &amp; Register v1
    <i class="fas fa-angle-left right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="../examples/login.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Login v1</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/register.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Register v1</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/forgot-password.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Forgot Password v1</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/recover-password.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Recover Password v1</p>
    </a>
    </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>
    Login &amp; Register v2
    <i class="fas fa-angle-left right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="../examples/login-v2.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Login v2</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/register-v2.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Register v2</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/forgot-password-v2.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Forgot Password v2</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/recover-password-v2.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Recover Password v2</p>
    </a>
    </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="../examples/lockscreen.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Lockscreen</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/legacy-user-menu.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Legacy User Menu</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/language-menu.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Language Menu</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/404.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Error 404</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/500.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Error 500</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/pace.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Pace</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../examples/blank.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Blank Page</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../../starter.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Starter Page</p>
    </a>
    </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="nav-icon fas fa-search"></i>
    <p>
     Search
    <i class="fas fa-angle-left right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="../search/simple.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Simple Search</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="../search/enhanced.html" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Enhanced</p>
    </a>
    </li>
    </ul>
    </li>
    <li class="nav-header">MISCELLANEOUS</li>
    <li class="nav-item">
    <a href="../../iframe.html" class="nav-link">
    <i class="nav-icon fas fa-ellipsis-h"></i>
    <p>Tabbed IFrame Plugin</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="https://adminlte.io/docs/3.1/" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>Documentation</p>
    </a>
    </li>
    <li class="nav-header">MULTI LEVEL EXAMPLE</li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="fas fa-circle nav-icon"></i>
    <p>Level 1</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="nav-icon fas fa-circle"></i>
    <p>
    Level 1
    <i class="right fas fa-angle-left"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Level 2</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>
    Level 2
    <i class="right fas fa-angle-left"></i>
    </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="far fa-dot-circle nav-icon"></i>
    <p>Level 3</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="far fa-dot-circle nav-icon"></i>
    <p>Level 3</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="far fa-dot-circle nav-icon"></i>
    <p>Level 3</p>
    </a>
    </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Level 2</p>
    </a>
    </li>
    </ul>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="fas fa-circle nav-icon"></i>
    <p>Level 1</p>
    </a>
    </li>
    <li class="nav-header">LABELS</li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="nav-icon far fa-circle text-danger"></i>
    <p class="text">Important</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="nav-icon far fa-circle text-warning"></i>
    <p>Warning</p>
    </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="nav-icon far fa-circle text-info"></i>
    <p>Informational</p>
    </a>
    </li>
    </ul>
    </nav>

    </div>

    </aside>

    <div class="content-wrapper" style="min-height: 2171.31px;">

    <section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
    <h1>Advanced Form</h1>
    </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Advanced Form</li>
    </ol>
    </div>
    </div>
    </div>
    </section>

    <section class="content">
    <div class="container-fluid">

    <div class="card card-default">
    <div class="card-header">
    <h3 class="card-title">Select2 (Default Theme)</h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>
    <button type="button" class="btn btn-tool" data-card-widget="remove">
    <i class="fas fa-times"></i>
    </button>
    </div>
    </div>

    <div class="card-body">
    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
    <label>Minimal</label>
    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
    <option selected="selected" data-select2-id="3">Alabama</option>
    <option>Alaska</option>
    <option>California</option>
    <option>Delaware</option>
    <option>Tennessee</option>
    <option>Texas</option>
    <option>Washington</option>
    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-0i64-container"><span class="select2-selection__rendered" id="select2-0i64-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
    </div>

    <div class="form-group">
    <label>Disabled</label>
    <select class="form-control select2 select2-hidden-accessible" disabled="" style="width: 100%;" data-select2-id="4" tabindex="-1" aria-hidden="true">
    <option selected="selected" data-select2-id="6">Alabama</option>
    <option>Alaska</option>
    <option>California</option>
    <option>Delaware</option>
    <option>Tennessee</option>
    <option>Texas</option>
    <option>Washington</option>
    </select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="5" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="true" aria-labelledby="select2-4oqb-container"><span class="select2-selection__rendered" id="select2-4oqb-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
    </div>

    </div>

    <div class="col-md-6">
        

    <?php
    echo \App\Helpers\ZhtHelper\UserInterface\Helper_AdminLTE::setObject_Select('UserSession', 'MyID');
    ?>

        
        
    <div class="form-group">
    <label>Multiple</label>
    <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
    <option>Alabama</option>
    <option>Alaska</option>
    <option>California</option>
    <option>Delaware</option>
    <option>Tennessee</option>
    <option>Texas</option>
    <option>Washington</option>
    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="8" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="Select a State" style="width: 589px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
    </div>

    <div class="form-group">
    <label>Disabled Result</label>
    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
    <option selected="selected" data-select2-id="11">Alabama</option>
    <option>Alaska</option>
    <option disabled="disabled">California (disabled)</option>
    <option>Delaware</option>
    <option>Tennessee</option>
    <option>Texas</option>
    <option>Washington</option>
    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="10" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-0dd9-container"><span class="select2-selection__rendered" id="select2-0dd9-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
    </div>

    </div>

    </div>

    <h5>Custom Color Variants</h5>
    <div class="row">
    <div class="col-12 col-sm-6">
    <div class="form-group">
    <label>Minimal (.select2-danger)</label>
    <select class="form-control select2 select2-danger select2-hidden-accessible" data-dropdown-css-class="select2-danger" style="width: 100%;" data-select2-id="12" tabindex="-1" aria-hidden="true">
    <option selected="selected" data-select2-id="14">Alabama</option>
    <option>Alaska</option>
    <option>California</option>
    <option>Delaware</option>
    <option>Tennessee</option>
    <option>Texas</option>
    <option>Washington</option>
    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="13" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-a4gy-container"><span class="select2-selection__rendered" id="select2-a4gy-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
    </div>

    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group">
    <label>Multiple (.select2-purple)</label>
    <div class="select2-purple">
    <select class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
    <option>Alabama</option>
    <option>Alaska</option>
    <option>California</option>
    <option>Delaware</option>
    <option>Tennessee</option>
    <option>Texas</option>
    <option>Washington</option>
    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="16" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="Select a State" style="width: 280px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
    </div>
    </div>

    </div>

    </div>

    </div>

    <div class="card-footer">
    Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
    the plugin.
    </div>
    </div>


    <div class="card card-default">
    <div class="card-header">
    <h3 class="card-title">Select2 (Bootstrap4 Theme)</h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>
    <button type="button" class="btn btn-tool" data-card-widget="remove">
    <i class="fas fa-times"></i>
    </button>
    </div>
    </div>

    <div class="card-body">
    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
    <label>Minimal</label>
    <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
    <option selected="selected" data-select2-id="19">Alabama</option>
    <option>Alaska</option>
    <option>California</option>
    <option>Delaware</option>
    <option>Tennessee</option>
    <option>Texas</option>
    <option>Washington</option>
    </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="18" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-pks3-container"><span class="select2-selection__rendered" id="select2-pks3-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
    </div>

    <div class="form-group">
    <label>Disabled</label>
    <select class="form-control select2bs4 select2-hidden-accessible" disabled="" style="width: 100%;" data-select2-id="20" tabindex="-1" aria-hidden="true">
    <option selected="selected" data-select2-id="22">Alabama</option>
    <option>Alaska</option>
     <option>California</option>
    <option>Delaware</option>
    <option>Tennessee</option>
    <option>Texas</option>
    <option>Washington</option>
    </select><span class="select2 select2-container select2-container--bootstrap4 select2-container--disabled" dir="ltr" data-select2-id="21" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="true" aria-labelledby="select2-so25-container"><span class="select2-selection__rendered" id="select2-so25-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
    </div>

    </div>

    <div class="col-md-6">
    <div class="form-group">
    <label>Multiple</label>
    <select class="select2bs4 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="23" tabindex="-1" aria-hidden="true">
    <option>Alabama</option>
    <option>Alaska</option>
    <option>California</option>
    <option>Delaware</option>
    <option>Tennessee</option>
    <option>Texas</option>
    <option>Washington</option>
    </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="24" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="Select a State" style="width: 589px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
    </div>

    <div class="form-group">
    <label>Disabled Result</label>
    <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="25" tabindex="-1" aria-hidden="true">
    <option selected="selected" data-select2-id="27">Alabama</option>
    <option>Alaska</option>
    <option disabled="disabled">California (disabled)</option>
    <option>Delaware</option>
    <option>Tennessee</option>
    <option>Texas</option>
    <option>Washington</option>
    </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="26" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-sxc1-container"><span class="select2-selection__rendered" id="select2-sxc1-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
    </div>

    </div>

    </div>

    </div>

    <div class="card-footer">
    Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
    the plugin.
    </div>
    </div>

    <div class="card card-default">
    <div class="card-header">
    <h3 class="card-title">Bootstrap Duallistbox</h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>
    <button type="button" class="btn btn-tool" data-card-widget="remove">
    <i class="fas fa-times"></i>
    </button>
    </div>
    </div>

    <div class="card-body">
    <div class="row">
    <div class="col-12">
    <div class="form-group">
    <label>Multiple</label>
    <div class="bootstrap-duallistbox-container row moveonselect moveondoubleclick"> <div class="box1 col-md-6">   <label for="bootstrap-duallistbox-nonselected-list_" style="display: none;"></label>   <span class="info-container">     <span class="info">Showing all 6</span>     <button type="button" class="btn btn-sm clear1" style="float:right!important;">show all</button>   </span>   <input class="form-control filter" type="text" placeholder="Filter">   <div class="btn-group buttons">     <button type="button" class="btn moveall btn-outline-secondary" title="Move all">&gt;&gt;</button>        </div>   <select multiple="multiple" id="bootstrap-duallistbox-nonselected-list_" name="_helper1" style="height: 102px;"><option>Alaska</option><option>California</option><option>Delaware</option><option>Tennessee</option><option>Texas</option><option>Washington</option></select> </div> <div class="box2 col-md-6">   <label for="bootstrap-duallistbox-selected-list_" style="display: none;"></label>   <span class="info-container">     <span class="info">Showing all 1</span>     <button type="button" class="btn btn-sm clear2" style="float:right!important;">show all</button>   </span>   <input class="form-control filter" type="text" placeholder="Filter">   <div class="btn-group buttons">          <button type="button" class="btn removeall btn-outline-secondary" title="Remove all">&lt;&lt;</button>   </div>   <select multiple="multiple" id="bootstrap-duallistbox-selected-list_" name="_helper2" style="height: 102px;"><option selected="">Alabama</option></select> </div></div><select class="duallistbox" multiple="multiple" style="display: none;">
    <option selected="">Alabama</option>
    <option>Alaska</option>
    <option>California</option>
    <option>Delaware</option>
    <option>Tennessee</option>
    <option>Texas</option>
    <option>Washington</option>
    </select>
    </div>

    </div>

    </div>

    </div>

    <div class="card-footer">
    Visit <a href="https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox#readme">Bootstrap Duallistbox</a> for more examples and information about
    the plugin.
    </div>
    </div>

    <div class="row">
    <div class="col-md-6">
    <div class="card card-danger">
    <div class="card-header">
    <h3 class="card-title">Input masks</h3>
    </div>
    <div class="card-body">

    <div class="form-group">
    <label>Date masks:</label>
     <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
    </div>
    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
    </div>

    </div>


    <div class="form-group">
    <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
    </div>
    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" data-mask="" inputmode="numeric">
    </div>

    </div>


    <div class="form-group">
    <label>US phone mask:</label>
    <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text"><i class="fas fa-phone"></i></span>
    </div>
    <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" inputmode="text">
    </div>

    </div>


    <div class="form-group">
    <label>Intl US phone mask:</label>
    <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text"><i class="fas fa-phone"></i></span>
    </div>
    <input type="text" class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask="" inputmode="text">
    </div>

    </div>


    <div class="form-group">
    <label>IP mask:</label>
    <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text"><i class="fas fa-laptop"></i></span>
    </div>
    <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask="" inputmode="decimal">
    </div>

    </div>

    </div>

    </div>

    <div class="card card-info">
    <div class="card-header">
    <h3 class="card-title">Color &amp; Time Picker</h3>
    </div>
    <div class="card-body">

    <div class="form-group">
    <label>Color picker:</label>
    <input type="text" class="form-control my-colorpicker1 colorpicker-element" data-colorpicker-id="1" data-original-title="" title="">
    </div>


    <div class="form-group">
    <label>Color picker with addon:</label>
    <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
    <input type="text" class="form-control" data-original-title="" title="">
    <div class="input-group-append">
    <span class="input-group-text"><i class="fas fa-square"></i></span>
    </div>
    </div>

    </div>


    <div class="bootstrap-timepicker">
    <div class="form-group">
    <label>Time picker:</label>
    <div class="input-group date" id="timepicker" data-target-input="nearest">
    <input type="text" class="form-control datetimepicker-input" data-target="#timepicker">
    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
    <div class="input-group-text"><i class="far fa-clock"></i></div>
    </div>
    </div>

    </div>

    </div>
    </div>

    </div>

    </div>

    <div class="col-md-6">
    <div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Date picker</h3>
    </div>
    <div class="card-body">

    <div class="form-group">
    <label>Date:</label>
    <div class="input-group date" id="reservationdate" data-target-input="nearest">
    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate">
    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
    </div>
    </div>
    </div>

    <div class="form-group">
    <label>Date and time:</label>
    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime">
    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
    </div>
    </div>
    </div>


    <div class="form-group">
    <label>Date range:</label>
    <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text">
    <i class="far fa-calendar-alt"></i>
    </span>
    </div>
    <input type="text" class="form-control float-right" id="reservation">
    </div>

    </div>


    <div class="form-group">
    <label>Date and time range:</label>
    <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text"><i class="far fa-clock"></i></span>
    </div>
    <input type="text" class="form-control float-right" id="reservationtime">
    </div>

    </div>


    <div class="form-group">
    <label>Date range button:</label>
    <div class="input-group">
    <button type="button" class="btn btn-default float-right" id="daterange-btn">
    <i class="far fa-calendar-alt"></i> Date range picker
    <i class="fas fa-caret-down"></i>
    </button>
    </div>
    </div>

    </div>
     <div class="card-footer">
    Visit <a href="https://getdatepicker.com/5-4/">tempusdominus </a> for more examples and information about
    the plugin.
    </div>

    </div>


    <div class="card card-success">
    <div class="card-header">
    <h3 class="card-title">iCheck Bootstrap - Checkbox &amp; Radio Inputs</h3>
    </div>
    <div class="card-body">

    <div class="row">
    <div class="col-sm-6">

    <div class="form-group clearfix">
    <div class="icheck-primary d-inline">
    <input type="checkbox" id="checkboxPrimary1" checked="">
    <label for="checkboxPrimary1">
    </label>
    </div>
    <div class="icheck-primary d-inline">
    <input type="checkbox" id="checkboxPrimary2">
    <label for="checkboxPrimary2">
    </label>
    </div>
    <div class="icheck-primary d-inline">
    <input type="checkbox" id="checkboxPrimary3" disabled="">
    <label for="checkboxPrimary3">
    Primary checkbox
    </label>
    </div>
    </div>
    </div>
    <div class="col-sm-6">

    <div class="form-group clearfix">
    <div class="icheck-primary d-inline">
    <input type="radio" id="radioPrimary1" name="r1" checked="">
    <label for="radioPrimary1">
    </label>
    </div>
    <div class="icheck-primary d-inline">
    <input type="radio" id="radioPrimary2" name="r1">
    <label for="radioPrimary2">
    </label>
    </div>
    <div class="icheck-primary d-inline">
    <input type="radio" id="radioPrimary3" name="r1" disabled="">
    <label for="radioPrimary3">
    Primary radio
    </label>
    </div>
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-6">

    <div class="form-group clearfix">
    <div class="icheck-danger d-inline">
    <input type="checkbox" checked="" id="checkboxDanger1">
    <label for="checkboxDanger1">
    </label>
    </div>
    <div class="icheck-danger d-inline">
    <input type="checkbox" id="checkboxDanger2">
    <label for="checkboxDanger2">
    </label>
    </div>
    <div class="icheck-danger d-inline">
    <input type="checkbox" disabled="" id="checkboxDanger3">
    <label for="checkboxDanger3">
    Danger checkbox
    </label>
    </div>
    </div>
    </div>
    <div class="col-sm-6">

    <div class="form-group clearfix">
    <div class="icheck-danger d-inline">
    <input type="radio" name="r2" checked="" id="radioDanger1">
    <label for="radioDanger1">
    </label>
    </div>
    <div class="icheck-danger d-inline">
    <input type="radio" name="r2" id="radioDanger2">
    <label for="radioDanger2">
    </label>
    </div>
    <div class="icheck-danger d-inline">
    <input type="radio" name="r2" disabled="" id="radioDanger3">
    <label for="radioDanger3">
    Danger radio
    </label>
    </div>
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-6">

    <div class="form-group clearfix">
    <div class="icheck-success d-inline">
    <input type="checkbox" checked="" id="checkboxSuccess1">
    <label for="checkboxSuccess1">
    </label>
    </div>
    <div class="icheck-success d-inline">
    <input type="checkbox" id="checkboxSuccess2">
    <label for="checkboxSuccess2">
    </label>
    </div>
    <div class="icheck-success d-inline">
    <input type="checkbox" disabled="" id="checkboxSuccess3">
    <label for="checkboxSuccess3">
    Success checkbox
    </label>
    </div>
    </div>
    </div>
    <div class="col-sm-6">

    <div class="form-group clearfix">
    <div class="icheck-success d-inline">
    <input type="radio" name="r3" checked="" id="radioSuccess1">
    <label for="radioSuccess1">
    </label>
    </div>
    <div class="icheck-success d-inline">
    <input type="radio" name="r3" id="radioSuccess2">
    <label for="radioSuccess2">
    </label>
    </div>
    <div class="icheck-success d-inline">
    <input type="radio" name="r3" disabled="" id="radioSuccess3">
    <label for="radioSuccess3">
    Success radio
    </label>
    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="card-footer">
    Many more skins available. <a href="https://bantikyan.github.io/icheck-bootstrap/">Documentation</a>
    </div>
    </div>


    <div class="card card-secondary">
    <div class="card-header">
    <h3 class="card-title">Bootstrap Switch</h3>
    </div>
    <div class="card-body">
    <div class="bootstrap-switch-on bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate" style="width: 86px;"><div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 42px;">ON</span><span class="bootstrap-switch-label" style="width: 42px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 42px;">OFF</span><input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch=""></div></div>
    <div class="bootstrap-switch-on bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate" style="width: 86px;"><div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-success" style="width: 42px;">ON</span><span class="bootstrap-switch-label" style="width: 42px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-danger" style="width: 42px;">OFF</span><input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch="" data-off-color="danger" data-on-color="success"></div></div>
    </div>
    </div>

    </div>

    </div>

    <div class="row">
    <div class="col-md-12">
    <div class="card card-default">
    <div class="card-header">
    <h3 class="card-title">bs-stepper</h3>
    </div>
    <div class="card-body p-0">
    <div class="bs-stepper linear">
    <div class="bs-stepper-header" role="tablist">

    <div class="step active" data-target="#logins-part">
    <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger" aria-selected="true">
    <span class="bs-stepper-circle">1</span>
    <span class="bs-stepper-label">Logins</span>
    </button>
    </div>
    <div class="line"></div>
    <div class="step" data-target="#information-part">
    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger" aria-selected="false" disabled="disabled">
    <span class="bs-stepper-circle">2</span>
    <span class="bs-stepper-label">Various information</span>
    </button>
    </div>
    </div>
    <div class="bs-stepper-content">

    <div id="logins-part" class="content active dstepper-block" role="tabpanel" aria-labelledby="logins-part-trigger">
    <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button class="btn btn-primary" onclick="stepper.next()">Next</button>
    </div>
    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
    <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <div class="input-group">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="exampleInputFile">
    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
    </div>
    <div class="input-group-append">
    <span class="input-group-text">Upload</span>
    </div>
    </div>
    </div>
    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    </div>
    </div>

    <div class="card-footer">
    Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
    </div>
    </div>

    </div>
    </div>

    <div class="row">
    <div class="col-md-12">
    <div class="card card-default">
    <div class="card-header">
    <h3 class="card-title">Dropzone.js <small><em>jQuery File Upload</em> like look</small></h3>
    </div>
    <div class="card-body">
    <div id="actions" class="row">
    <div class="col-lg-6">
    <div class="btn-group w-100">
    <span class="btn btn-success col fileinput-button dz-clickable">
    <i class="fas fa-plus"></i>
    <span>Add files</span>
    </span>
    <button type="submit" class="btn btn-primary col start">
    <i class="fas fa-upload"></i>
    <span>Start upload</span>
    </button>
    <button type="reset" class="btn btn-warning col cancel">
    <i class="fas fa-times-circle"></i>
     <span>Cancel upload</span>
    </button>
    </div>
    </div>
    <div class="col-lg-6 d-flex align-items-center">
    <div class="fileupload-process w-100">
    <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress=""></div>
    </div>
    </div>
    </div>
    </div>
    <div class="table table-striped files" id="previews">

    </div>
    </div>

    <div class="card-footer">
    Visit <a href="https://www.dropzonejs.com">dropzone.js documentation</a> for more examples and information about the plugin.
    </div>
    </div>

    </div>
    </div>

    </div>

    </section>

    </div>

    <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.2.0
    </div>
    <strong>Copyright © 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <aside class="control-sidebar control-sidebar-dark" style="display: none;">

    <div class="p-3 control-sidebar-content" style=""><h5>Customize AdminLTE</h5><hr class="mb-2"><div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Dark Mode</span></div><h6>Header Options</h6><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Fixed</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Dropdown Legacy Offset</span></div><div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>No border</span></div><h6>Sidebar Options</h6><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Collapsed</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Fixed</span></div><div class="mb-1"><input type="checkbox" value="1" checked="checked" class="mr-1"><span>Sidebar Mini</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Mini MD</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Mini XS</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Flat Style</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Legacy Style</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Compact</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Child Indent</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav Child Hide on Collapse</span></div><div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Disable Hover/Focus Auto-Expand</span></div><h6>Footer Options</h6><div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Fixed</span></div><h6>Small Text Options</h6><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Body</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Navbar</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Brand</span></div><div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar Nav</span></div><div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Footer</span></div><h6>Navbar Variants</h6><div class="d-flex"><select class="custom-select mb-3 text-light border-0 bg-white"><option class="bg-primary">Primary</option><option class="bg-secondary">Secondary</option><option class="bg-info">Info</option><option class="bg-success">Success</option><option class="bg-danger">Danger</option><option class="bg-indigo">Indigo</option><option class="bg-purple">Purple</option><option class="bg-pink">Pink</option><option class="bg-navy">Navy</option><option class="bg-lightblue">Lightblue</option><option class="bg-teal">Teal</option><option class="bg-cyan">Cyan</option><option class="bg-dark">Dark</option><option class="bg-gray-dark">Gray dark</option><option class="bg-gray">Gray</option><option class="bg-light">Light</option><option class="bg-warning">Warning</option><option class="bg-white">White</option><option class="bg-orange">Orange</option></select></div><h6>Accent Color Variants</h6><div class="d-flex"></div><select class="custom-select mb-3 border-0"><option>None Selected</option><option class="bg-primary">Primary</option><option class="bg-warning">Warning</option><option class="bg-info">Info</option><option class="bg-danger">Danger</option><option class="bg-success">Success</option><option class="bg-indigo">Indigo</option><option class="bg-lightblue">Lightblue</option><option class="bg-navy">Navy</option><option class="bg-purple">Purple</option><option class="bg-fuchsia">Fuchsia</option><option class="bg-pink">Pink</option><option class="bg-maroon">Maroon</option><option class="bg-orange">Orange</option><option class="bg-lime">Lime</option><option class="bg-teal">Teal</option><option class="bg-olive">Olive</option></select><h6>Dark Sidebar Variants</h6><div class="d-flex"></div><select class="custom-select mb-3 text-light border-0 bg-primary"><option>None Selected</option><option class="bg-primary">Primary</option><option class="bg-warning">Warning</option><option class="bg-info">Info</option><option class="bg-danger">Danger</option><option class="bg-success">Success</option><option class="bg-indigo">Indigo</option><option class="bg-lightblue">Lightblue</option><option class="bg-navy">Navy</option><option class="bg-purple">Purple</option><option class="bg-fuchsia">Fuchsia</option><option class="bg-pink">Pink</option><option class="bg-maroon">Maroon</option><option class="bg-orange">Orange</option><option class="bg-lime">Lime</option><option class="bg-teal">Teal</option><option class="bg-olive">Olive</option></select><h6>Light Sidebar Variants</h6><div class="d-flex"></div><select class="custom-select mb-3 border-0"><option>None Selected</option><option class="bg-primary">Primary</option><option class="bg-warning">Warning</option><option class="bg-info">Info</option><option class="bg-danger">Danger</option><option class="bg-success">Success</option><option class="bg-indigo">Indigo</option><option class="bg-lightblue">Lightblue</option><option class="bg-navy">Navy</option><option class="bg-purple">Purple</option><option class="bg-fuchsia">Fuchsia</option><option class="bg-pink">Pink</option><option class="bg-maroon">Maroon</option><option class="bg-orange">Orange</option><option class="bg-lime">Lime</option><option class="bg-teal">Teal</option><option class="bg-olive">Olive</option></select><h6>Brand Logo Variants</h6><div class="d-flex"></div><select class="custom-select mb-3 border-0"><option>None Selected</option><option class="bg-primary">Primary</option><option class="bg-secondary">Secondary</option><option class="bg-info">Info</option><option class="bg-success">Success</option><option class="bg-danger">Danger</option><option class="bg-indigo">Indigo</option><option class="bg-purple">Purple</option><option class="bg-pink">Pink</option><option class="bg-navy">Navy</option><option class="bg-lightblue">Lightblue</option><option class="bg-teal">Teal</option><option class="bg-cyan">Cyan</option><option class="bg-dark">Dark</option><option class="bg-gray-dark">Gray dark</option><option class="bg-gray">Gray</option><option class="bg-light">Light</option><option class="bg-warning">Warning</option><option class="bg-white">White</option><option class="bg-orange">Orange</option><a href="#">clear</a></select></div></aside>

    <div id="sidebar-overlay"></div></div>

    <?php
    echo \App\Helpers\ZhtHelper\UserInterface\Helper_AdminLTE::initBody_CSSAndJS();
    ?>
    
    <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          locale: {
            format: 'MM/DD/YYYY hh:mm A'
          }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
          {
            ranges   : {
              'Today'       : [moment(), moment()],
              'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month'  : [moment().startOf('month'), moment().endOf('month')],
              'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate  : moment()
          },
          function (start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
          }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
          format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
          $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function(){
          $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

      })
      // BS-Stepper Init
      document.addEventListener('DOMContentLoaded', function () {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
      })

      // DropzoneJS Demo Code Start
      Dropzone.autoDiscover = false

      // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
      var previewNode = document.querySelector("#template")
      previewNode.id = ""
      var previewTemplate = previewNode.parentNode.innerHTML
      previewNode.parentNode.removeChild(previewNode)

      var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
      })

      myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
      })

      // Update the total progress bar
      myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
      })

      myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
      })

      // Hide the total progress bar when nothing's uploading anymore
      myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
      })

      // Setup the buttons for all transfers
      // The "add files" button doesn't need to be setup because the config
      // `clickable` has already been specified.
      document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
      }
      document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
      }
      // DropzoneJS Demo Code End
    </script><input type="file" multiple="multiple" class="dz-hidden-input" tabindex="-1" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">


    <div class="daterangepicker ltr show-calendar opensright"><div class="ranges"></div><div class="drp-calendar left"><div class="calendar-table"></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-calendar right"><div class="calendar-table"></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div></div><div class="daterangepicker ltr show-calendar opensright"><div class="ranges"></div><div class="drp-calendar left"><div class="calendar-table"></div><div class="calendar-time"></div></div><div class="drp-calendar right"><div class="calendar-table"></div><div class="calendar-time"></div></div><div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div></div><div class="daterangepicker ltr show-ranges opensright"><div class="ranges"><ul><li data-range-key="Today">Today</li><li data-range-key="Yesterday">Yesterday</li><li data-range-key="Last 7 Days">Last 7 Days</li><li data-range-key="Last 30 Days">Last 30 Days</li><li data-range-key="This Month">This Month</li><li data-range-key="Last Month">Last Month</li><li data-range-key="Custom Range">Custom Range</li></ul></div><div class="drp-calendar left"><div class="calendar-table"></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-calendar right"><div class="calendar-table"></div><div class="calendar-time" style="display: none;"></div></div><div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div></div>

    </body>    
</html>