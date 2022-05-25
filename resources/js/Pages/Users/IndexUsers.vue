<template>

    <AppLayout title="Usuarios" >

        <div class="row">
          <div class="col-12">
            
            <div class="card">
                
                <div class="card-header">
                    
                    <h3 class="card-title">Usuarios</h3>

                    <div class="card-tools" style="width: 360px">
                        <div class="input-group input-group-sm mr-2" style="width: 200px; display: inline-flex;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
                              <th>ID</th>
                              <th>Username</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Date</th>
                              <th style="width: 182px;">Actions</th>
                            </tr>

                        </thead>
                        
                        <tbody>

                            <tr v-for="(item,i) in users" :key="i">
                                
                                <td>{{item.id}}</td>
                                <td>{{item.user_name}}</td>
                                <td>{{item.full_name}}</td>
                                <td>{{item.email}}</td>
                                
                                <td>
                                    <span class="tag tag-success">{{item.create_at}}</span>
                                </td>
                              
                                <td>
                                    <button class="btn btn-primary" @click="openModal(i)">
                                        <i class="fas fa-eye"></i>
                                    </button>-
                                    <Link class="btn btn-warning" href="/users/edit" method="get" :data="{ id: item.id }">
                                        <i class="fas fa-edit"></i>
                                    </Link>-
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </td>

                            </tr>
                        
                        </tbody>

                    </table>
                
                </div>

                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
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

import ShowUserModal from './Components/ShowUserModal.vue';

export default {
    props:['can','users'],
    components: {
        AppLayout,
        ShowUserModal,
        Link
    },
    data() {
        return {
            count: 0,
            data_modal:[]
        }
    },
    methods:{
        openModal(i)
        {
            this.data_modal = this.users[i];
            $('#user_modal').modal('show');
        }
    }
}
	
</script>