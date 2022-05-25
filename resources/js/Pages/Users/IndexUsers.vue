<template>

    <AppLayout title="Usuarios" >

        <div class="row">
          <div class="col-12">
            
            <div class="card">
                
                <div class="card-header">
                    
                    <h3 class="card-title">Usuarios</h3>

                    <div class="card-tools" style="width: 360px">
                        <div class="input-group input-group-sm mr-2" style="width: 200px; display: inline-flex;">
                            <input 
                                type="text" 
                                name="table_search" 
                                @input="getUsers(1, show, search)" 
                                class="form-control float-right" 
                                placeholder="Search"
                                v-model="search"
                                >

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                        </div>

                        <div 
                            class="input-group input-group-sm" 
                            style="width: 150px;display: inline-flex;"
                            >

                            <Link class="btn btn-default" href="/users/create" > 
                                <i class="fas fa-plus"></i> Crear usuario
                            </Link>

                        </div>

                    </div>

                </div>

                <div class="card-body table-responsive p-0" style="height: 350px;">

                    <table class="table table-head-fixed text-nowrap" style="border-radius: 16px">
                        
                        <thead>
                            
                            <tr>
                                
                                <th scope="col" style="cursor:pointer" @click="changeOrder('id')">
                                    #ID 
                                    <template v-if="field == 'id'">
                                      <i class="fas fa-angle-double-down text-primary" v-if="order == 'DESC'"></i>
                                      <i class="fas fa-angle-double-up text-primary" v-else></i>
                                    </template>
                                </th>

                                <th scope="col" style="cursor:pointer" @click="changeOrder('name')">
                                    Nombre
                                    <template v-if="field == 'name'">
                                      <i class="fas fa-angle-double-down text-primary" v-if="order == 'DESC'"></i>
                                      <i class="fas fa-angle-double-up text-primary" v-else></i>
                                    </template>
                                </th>

                                <th scope="col" style="cursor:pointer" @click="changeOrder('email')">
                                    Email
                                    <template v-if="field == 'email'">
                                      <i class="fas fa-angle-double-down text-primary" v-if="order == 'DESC'"></i>
                                      <i class="fas fa-angle-double-up text-primary" v-else></i>
                                    </template>
                                </th>

                                <th scope="col" style="cursor:pointer" @click="changeOrder('sex')">
                                    Sexo
                                    <template v-if="field == 'sex'">
                                      <i class="fas fa-angle-double-down text-primary" v-if="order == 'DESC'"></i>
                                      <i class="fas fa-angle-double-up text-primary" v-else></i>
                                    </template>
                                </th>

                                <th scope="col" style="cursor:pointer" @click="changeOrder('area_name')">
                                    Area
                                    <template v-if="field == 'area_name'">
                                      <i class="fas fa-angle-double-down text-primary" v-if="order == 'DESC'"></i>
                                      <i class="fas fa-angle-double-up text-primary" v-else></i>
                                    </template>
                                </th>
                                <th>Bolentin</th>

                                <th style="width: 182px;">Actions</th>
                            </tr>

                        </thead>
                        
                        <tbody>

                            <tr v-for="(item,i) in users_" :key="i">
                                
                                <td>{{item.id}}</td>
                                <td>{{item.name}}</td>
                                <td>{{item.email}}</td>
                                <td>
                                    <span class="tag tag-success" v-if="item.sex == 'M'" >
                                        Masculino
                                    </span>
                                    <span class="tag tag-danger" v-else>
                                        Femenino
                                    </span>
                                </td>
                                <td>{{item.area_name}}</td>
                                
                                <td>
                                    <span class="tag tag-success" v-if="item.boletin == 1 || item.boletin ==true">
                                        Si
                                    </span>
                                    <span class="tag tag-danger" v-else>
                                        No
                                    </span>

                                </td>
                              
                                <td>
                                    <button class="btn btn-primary" @click="openModal(i)">
                                        <i class="fas fa-eye"></i>
                                    </button>-
                                    <Link class="btn btn-warning" href="/users/edit" method="get" :data="{ id: item.id }">
                                        <i class="fas fa-edit"></i>
                                    </Link>-
                                    <button class="btn btn-danger" @click="deleteProduct(item.id)">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </td>

                            </tr>
                        
                        </tbody>

                    </table>
                
                </div>

                <div class="card-footer clearfix">
                    <div class="col-sm-12 col-md-7">
                <div
                  class="dataTables_paginate paging_simple_numbers"
                  id="example1_paginate"
                >
                  <ul class="pagination flex-wrap"  >
                    <li
                      v-if="pagination.current_page > 1"
                      class="paginate_button page-item previous"
                      id="example1_previous"
                    >
                      <a
                        href="#"
                        @click.prevent="
                          changePage(pagination.current_page - 1)
                        "
                        aria-controls="example1"
                        data-dt-idx="0"
                        tabindex="0"
                        class="page-link"
                        >Atras</a
                      >
                    </li>
                    <li
                      class="paginate_button page-item"
                      v-for="page in pagesNumber"
                      :key="page"
                      v-bind:class="[page == isActived ? 'active' : '']"
                    >
                      <a
                        href="#"
                        @click.prevent="changePage(page)"
                        aria-controls="example1"
                        data-dt-idx="1"
                        tabindex="0"
                        class="page-link"
                        >{{ page }}</a
                      >
                    </li>

                    <li
                      v-if="pagination.current_page < pagination.last_page"
                      class="paginate_button page-item next"
                      id="example1_next"
                    >
                      <a
                        href="#"
                        @click.prevent="
                          changePage(pagination.current_page + 1)
                        "
                        aria-controls="example1"
                        data-dt-idx="7"
                        tabindex="0"
                        class="page-link"
                        >Siguiente</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
                </div>

            </div>

          </div>
        </div>

        <ShowUserModal :_id="'user_modal'" :_data_user="data_modal" />



    </AppLayout>
	
</template>

<style scoped>
	
</style>

<script>

import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Swal from 'sweetalert2'

import ShowUserModal from './Components/ShowUserModal.vue';

export default {
    props:['can','users'],
    components: {
        AppLayout,
        ShowUserModal,
        Link,
        Swal
    },
    data() {
        return {

            data_modal:[],

            show: 5,
            field: 'name',
            order: 'DESC',
            search: '',
            users_: [],
            pagination: {
                total: 0,
                current_page: 0,
                per_page: 0,
                last_page: 0,
                from: 0,
                to: 0,
            },
            offset: 3,
            setTimeoutBuscador: '',

        }
    },
    mounted(){
        this.users_ = this.users.data;
        this.getUsers();
    },
    computed: {
        count(){
          var counted = 0;
          counted = this.pagination.from + parseInt(this.show) - 1;
          if (counted > this.pagination.total) {
            counted = this.pagination.total;
          }
          return counted;
        },
        isActived(){

          return this.pagination.current_page;
        },
        pagesNumber() {
          if (!this.pagination.to) {
            return [];
          }
          var from = this.pagination.current_page - this.offset;
          if (from < 1) {
            from = 1;
          }
          var to = from + this.offset * 2;
          if (to >= this.pagination.last_page) {
            to = this.pagination.last_page;
          }
          var pagesArray = [];
          while (from <= to) {
            pagesArray.push(from);
            from++;
          }
          return pagesArray;
        },
        validateRolesComputed()
        {
            let x = this.form_user.roles_user.length;
            if ( x == 0)
            {

            }
            else
            {
                $("#rol_validate").removeClass('error-j');
                $("#vs1__combobox").removeClass('v-select-error');
            }

            return x;
        }
    },
    methods:{
        openModal(i)
        {
            this.data_modal = this.users.data[i];
            $('#user_modal').modal('show');
        },

        getUsers(page)
        {
            var payload = {
                show:this.show,
                field:this.field,
                order:this.order,
                search:this.search
            };

            this.loading = true;

            axios.post("/users-pagination?page=" +
                page +
                "&show=" +
                this.show +
                "&search=" +
                this.search
            , payload)
            .then(response => {
              this.pagination = response.data.pagination;
              this.users_     = response.data.users.data;
              console.log("pagination::",response.data.users.data)
            })
            .catch(error => {
                // var data = error.response.data;
            });

            this.loading = false;
        },
        deleteProduct(id)
        {
            Swal.fire({
                title: 'Quieres eliminar este usuario?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                denyButtonText: `NO`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed)
                {
                    axios.delete("./users/"+id)
                    .then(response => {
                        Swal.fire('Producto eliminado!', '', 'success')
                        this.getUsers();
                    })
                    .catch(error => {
                      var data = error.data;
                    });

                }
                else if (result.isDenied)
                {
                    Swal.fire('Ten mas cuidado a la proxima', '', 'info')
                }
            });
        },

        // Metodos paginación
        changePage(page) 
        {
          this.pagination.current_page = page;
          this.getUsers(page);
        },
        changeOrder(val)
        {
          if(this.field == val)
          {
            if(this.order == 'DESC')
            {
              this.order='ASC'
            }else{
              this.order='DESC'
            }
          }else{
            this.field=val;
          }

          this.getUsers();
        },
        searchProduct(){
          
          clearTimeout( this.setTimeoutBuscador );

          this.setTimeoutBuscador=setTimeout( this.getUsers , 200);
        },

    }
}
	
</script>