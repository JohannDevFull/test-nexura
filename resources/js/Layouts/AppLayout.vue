<template>
    <div>
        <Head :title="title" />

        <JetBanner />

        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                  
                  <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                  </li>

                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">

                  <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                      <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#" role="button" @click="logout()">
                      <i class="fas fa-power-off text-danger"></i>
                    </a>
                  </li>

                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                  <img src="http://127.0.0.1:8000/assets/admin-lte-v3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                  <span class="brand-text font-weight-light">AdminLTE 3</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                  <!-- Sidebar user panel (optional) -->
                  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                      <img src="http://127.0.0.1:8000/assets/admin-lte-v3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                      <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                  </div>

                  <!-- SidebarSearch Form -->
                  <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                      <div class="input-group-append">
                        <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- Sidebar Menu -->
                  <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      


                      <li class="nav-item">
                          <Link :class="isUrl('dashboard') ? 'nav-link active' : 'nav-link'" href="/dashboard" > 
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                              Dashboard
                              <span class="right badge badge-danger">New</span>
                            </p>
                          </Link>
                      </li>

                      <li class="nav-item" >
                          <Link :class="isUrl('users') ? 'nav-link active' : 'nav-link'" href="/users" > 
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                              Usuarios
                            </p>
                          </Link>
                      </li>
                      
                    </ul>
                  </nav>
                  <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                  <div class="container-fluid">
                    <div class="row mb-2">
                      <div class="col-sm-6">
                        <h1 class="m-0">Starter Page</h1>
                      </div><!-- /.col -->
                      <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                      </div><!-- /.col -->
                    </div><!-- /.row -->
                  </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                  <div class="container-fluid">
                    <slot/>
                  </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
                <div class="p-3">
                  <h5>Title</h5>
                  <p>Sidebar content</p>
                </div>
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                  Anything you want
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </footer>
        </div>
    </div>
</template>

<script >

import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';


export default {
    props:[ 'title' , 'breadcrumb'],
    components:{
        Head,
        Link
    },
    mounted(){

      setTimeout(()=>{
        if ($("#body").hasClass("login-page"))
        {
            $("#body").removeClass("login-page");
            // location.reload();
        }

      },200);

      setTimeout(()=>{
          if ($("#body").hasClass("sidebar-open"))
          {
              $("#body").removeClass("sidebar-open");
          }
          else
          {
              console.log("Cambio de pagina - NOOOOO")

          }
        },200);
    },
    data() {
        return {
          count: 0
        }
    },
    methods:{
      logout()
      {
          Inertia.post(route('logout'));
      },
      switchToTeam (team){
          Inertia.put(route('current-team.update'), {
              team_id: team.id,
          }, {
              preserveState: false,
          });
      },

      isUrl(...urls)
      {
        let currentUrl = this.$inertia.page.url.substr(1); 
        if (urls[0] === '') 
        {
          return currentUrl === ''
        }
        return urls.filter(url => currentUrl.startsWith(url)).length
      }

    }
}
</script>
