<template>

    <ModalComponent :_id="_id" :_data="data_modal" _title="Usuario Información">

        <div class="card-body " >
            
            <div class="col-12 ">
                <h4 class="mb-3">Información usuario</h4>
                
                <form id="form_user" class="needs-validation" >
                  
                    <div class="row g-3 mb-3">

                        <div class="col-6">
                            <label for="username" class="form-label">
                                Username
                                <span class="text-danger">(*)</span>
                            </label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input 
                                    disabled 
                                    id="user_name" 
                                    name="user_name" 
                                    type="text" 
                                    class="form-control" 
                                    placeholder="Username"
                                    v-model="_data_user.user_name"
                                    >
                                <div class="invalid-feedback">
                                  El campo "Username" es obligatorio.
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="email" class="form-label">
                                Email
                                <span class="text-danger">(*)</span>
                            </label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">@</span>
                                <input 
                                    disabled
                                    id="email" 
                                    name="email" 
                                    type="email" 
                                    class="form-control" 
                                    placeholder="you@example.com"
                                    v-model="_data_user.email"
                                    >
                                <div class="invalid-feedback">
                                    Por favor ingresar un correo electronico valido.
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">
                                Nombres
                                <span class="text-danger">(*)</span>
                            </label>
                            <input 
                                disabled
                                id="name"  
                                type="text" 
                                class="form-control was-validated" 
                                placeholder="Nombre" 
                                name="name"
                                v-model="_data_user.name" 
                                required
                                >
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">
                                Apellidos
                                <span class="text-danger">(*)</span>
                            </label>
                            <input 
                                disabled
                                id="lastName" 
                                name="last_name" 
                                type="text" 
                                class="form-control" 
                                placeholder=""
                                v-model="_data_user.last_name"  
                                >
                          <div class="invalid-feedback">
                            Valid last name is required.
                          </div>
                        </div>

                        <!-- <div class="col-6">
                            <label for="country" class="form-label">
                                Roles
                                <span class="text-danger">(*)</span>
                            </label>
                            <v-select 
                                multiple 
                                v-model="_data_user.roles_user" 
                                :options="roles" 
                                label="name" 
                                append-to-body
                                :calculate-position="withPopper"
                                >
                                <label for="position" style="display: block; margin: 1rem 0; background: purple">
                                  <input
                                    id="position"
                                    v-model="_data_user.placement"
                                    type="checkbox"
                                    true-value="top"
                                    false-value="bottom"
                                  />
                                  Position dropdown above
                                </label>
                            </v-select>

                            <div id="rol_validate" class="invalid-feedback">
                                Seleccione algun rol. {{validateRolesComputed}}
                            </div>
                        </div> -->

                        <div class="col-sm-6">
                            <label for="phone" class="form-label">
                                Telefono
                                <span class="text-muted">(Optional)</span>
                            </label>
                            <input 
                                disabled
                                id="phone" 
                                name="phone" 
                                type="text" 
                                class="form-control" 
                                placeholder="+57 3118523576" 
                            >
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>

                    </div>

                    <div class="d-flex justify-content-center mb-3">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-danger" v-for="( item , i ) in errors" :key="i">
                                {{item}}
                            </li>
                        </ul>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button class="m-auto btn btn-primary btn-lg" type="submit">Crear</button>
                    </div>
                        

                </form>
            
            </div>
            
        </div>

    </ModalComponent>
    


</template>

<style>
	
</style>

<script>

import ModalComponent from '@/Jetstream/ModalComponent.vue';

export default {
    props:['_id','_data_user'],
    components: {
        ModalComponent
    },
    data() {
        return {

            Toast:'',
            count: 0,
            form_user:{
                user_name: '',
                name: '',
                last_name: '',
                password: '',
                password_confirmation: '',
                email: '',
                phone:'',
                roles_user: []
            },
            placement: 'top',

            errors:[]
            
        }
    },
}
	
</script>