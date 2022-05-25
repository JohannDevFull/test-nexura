<template>

    <ModalComponent :_id="_id" :_data="data_modal" _title="Usuario Información">

        <div class="card-body " >
            
            <div class="col-12 ">
                <h4 class="mb-3">Información usuario</h4>
                
                <form id="form_user" class="needs-validation">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">
                            Nombres completos
                             
                        </label>
                        <div class="col-sm-9">
                            <input 
                                id="name" 
                                name="name"
                                type="text" 
                                class="form-control" 
                                placeholder="Nombre completo del usuario"
                                v-model="_data_user.name"
                                disabled 
                                >
                            <div class="invalid-feedback">
                                Campo obligatorio.
                            </div>
                        </div>
                    </div>
                  
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">
                            Correo electronico
                             
                        </label>
                        <div class="col-sm-9">
                            <input 
                                id="email" 
                                name="email" 
                                type="email" 
                                class="form-control" 
                                placeholder="you@example.com"
                                v-model="_data_user.email"
                                disabled 
                                >
                            <div class="invalid-feedback">
                                Por favor ingresar un correo electronico valido.
                            </div>
                        </div>
                    </div>

                    <fieldset class="form-group row">
                        <label for="sex" class="col-sm-3 col-form-label">
                            Sexo
                             
                        </label>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="radio" 
                                    name="gridRadios" 
                                    id="gridRadios1" 
                                    value="M" 
                                    v-model="_data_user.sex"
                                    required 
                                    disabled 
                                    >
                                <label id="sex" class="form-check-label" for="gridRadios1">
                                  Masculino
                                </label>
                            </div>
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="radio" 
                                    name="gridRadios" 
                                    id="gridRadios2" 
                                    value="F"
                                    v-model="_data_user.sex"
                                    required 
                                    >
                                <label id="sex" class="form-check-label" for="gridRadios2">
                                  Famenino
                                </label>
                            </div>
                            <div class="invalid-feedback" id="error-ratios">
                                Campo obligatorio. {{validateSexComputed}}
                            </div>
                        </div>
                    </fieldset>

                    <!-- <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">
                            Area
                             
                        </label>
                        <div class="col-sm-9">
                            <div class="input-group mb-3">
                                <select 
                                    id="area"
                                    name="area" 
                                    class="form-control custom-select"
                                    v-model="_data_user.area_id" 
                                    required
                                    >
                                    <option disabled>Selecione un area</option>
                                    <option :value="item.id" v-for="(item,i) in areas">
                                        {{item.name}}
                                    </option>
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">
                                        Opciones
                                    </label>
                                </div>
                                <div class="invalid-feedback">
                                    Campo obligatorio.
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">
                            Descripción
                             
                        </label>
                        <div class="col-sm-9">
                            <textarea 
                                id="description" 
                                name="description" 
                                class="form-control" 
                                v-model="_data_user.description" 
                                rows="3"
                                disabled 
                                >
                                
                            </textarea>
                            <div class="invalid-feedback">
                                Campo obligatorio.
                            </div>
                        </div>
                    </div>

                    <fieldset class="form-group row">
                        <label for="sex" class="col-sm-3 col-form-label">
                            Roles
                             
                        </label>
                        <div class="col-sm-9">
                            <div class="form-check" v-for="(rol , i) in roles" :key="i">
                                <input 
                                    :id="'rol_'+i" 
                                    name="roles" 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    :value="rol" 
                                    v-model="user.roles_user"
                                    disabled
                                    >
                                <label class="form-check-label" :for="'rol_'+i">
                                  {{rol}}
                                </label>
                            </div>
                            <div id="rol_validate" class="invalid-feedback">
                                Seleccione algun rol. 
                                <span class="d-hide">
                                    {{validateRolesComputed}}
                                </span>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        
                        <label for="password_confirmation" class="col-sm-3 col-form-label">
                            Recibir boletín infomativo
                        </label>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input 
                                    id="subscription"
                                    name="subscription"
                                    class="form-check-input" 
                                    type="checkbox" 
                                    v-model="_data_user.subscription"
                                    checked="true" 
                                    disabled
                                    >
                            </div>
                        </div>
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