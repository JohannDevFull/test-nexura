<template>

    <AppLayout title="Editar usuario">
	  	<main>
		    <div class="row">
          		<div class="col-12">
            
		            <div class="card">
		                
		                <div class="card-header">
		                    <h3 class="card-title">Crear Usuario</h3>

		                    <div class="card-tools" style="width: 160px">
		                        

		                        <div 
		                            class="input-group input-group-sm" 
		                            style="width: 150px;display: inline-flex;"
		                            
		                            >

		                            <button class="btn btn-default" @click="returnHistory()" > 
		                                <i class="fas fa-backspace pr-1"></i>Regresar
		                            </button>

		                        </div>

		                    </div>
		                </div>
				      	
				      	<div class="card-body " >
					      	
					      	<div class="col-12 ">

						        <h4 class="mb-3">Información usuario</h4>
						        <div class="alert alert-info" role="alert">
							        Los campos con <span class="text-danger">(*)</span> son obligatorios.
								</div>

						        <form id="form_user" class="needs-validation">

						        	<div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label">
									    	Nombres completos
									    	<span class="text-danger">(*)</span> 
									    </label>
									    <div class="col-sm-9">
									      	<input 
							              		id="name" 
							              		name="name"
							              		type="text" 
							              		class="form-control" 
							              		placeholder="Nombre completo del usuario"
							              		v-model="user.name"
							              		>
							              	<div class="invalid-feedback">
							                	Campo obligatorio.
							              	</div>
									    </div>
								  	</div>
								  
								  	<div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label">
									    	Correo electronico
									    	<span class="text-danger">(*)</span> 
									    </label>
									    <div class="col-sm-9">
									      	<input 
							              		id="email" 
							              		name="email" 
							              		type="email" 
							              		class="form-control" 
							              		placeholder="you@example.com"
							              		v-model="user.email"
							              		>
							              	<div class="invalid-feedback">
							                	Por favor ingresar un correo electronico valido.
							              	</div>
									    </div>
								  	</div>

								  	<fieldset class="form-group row">
									    <label for="sex" class="col-sm-3 col-form-label">
									    	Sexo
									    	<span class="text-danger">(*)</span> 
									    </label>
									    <div class="col-sm-9">
									      	<div class="form-check">
										        <input 
										        	class="form-check-input" 
										        	type="radio" 
										        	name="gridRadios" 
										        	id="gridRadios1" 
										        	value="M" 
										        	v-model="user.sex"
										        	required 
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
										        	v-model="user.sex"
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

								  	<div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label">
									    	Area
									    	<span class="text-danger">(*)</span> 
									    </label>
									    <div class="col-sm-9">
										  	<div class="input-group mb-3">
											  	<select 
											  		id="area"
											  		name="area" 
											  		class="form-control custom-select"
											  		v-model="user.area_id" 
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
								  	</div>

								  	<div class="form-group row">
									    <label for="inputEmail3" class="col-sm-3 col-form-label">
									    	Descripción
									    	<span class="text-danger">(*)</span> 
									    </label>
									    <div class="col-sm-9">
								  			<textarea 
								  				id="description" 
								  				name="description" 
								  				class="form-control" 
								  				v-model="user.description" 
								  				rows="3"
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
									    	<span class="text-danger">(*)</span> 
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
										        	v-model="user.subscription"
										        	checked="true" 
										        	>
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
								  


								  	<div class="form-group row">
									    <div class="col-sm-9">
									      <button type="submit" class="btn btn-warning">Actualizar usuario</button>
									    </div>
								  	</div>
								</form>
					        
					      	</div>
					      	
					    </div>
				    </div>
				</div>
			</div>
	  	</main>
    </AppLayout>
	
</template>

<style scoped>
	
</style>

<script>

import AppLayout from '@/Layouts/AppLayout.vue';
import Swal from 'sweetalert2';
import { Inertia } from '@inertiajs/inertia';

import { useUserStore } from '@/Store/user'

export default {
	props:['can','user','roles','areas'],
	setup()
	{
	    const store_user = useUserStore();
      	return { store_user }
	},
    components: {
        AppLayout,
        Swal,
        Inertia
    },
    data(){
        return {
        	Toast:'',
			placement: 'top',
			errors:[]
        }
    },
    mounted()
    {
    	// setTimeout(()=>{

	    // 	this.store_user.$state = { 
	    //     	user_data: this.user
	    //   	};

	    //   	console.log("test::",this.user)
    	// },200);

      	this.Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 4000
	    });

    	$.validator.setDefaults({
		    submitHandler:  ()=> {
		      	this.update()
		    }
		});
		  
		$('#form_user').validate({
		    rules: {
			    name: {
			        required: true
			    },
		    	sex: {
			        required: true
			    },
		      	email: {
		        	required: true,
		        	email: true,
		      	},
				area_id: {
					required: true,
				},
				description: {
					required: true,
				},
				roles_user:{
					required: true
				}
		    },
		    errorElement: 'span',
		    errorPlacement:  (error, element) => {
		    	if (this.form_user.roles_user.length == 0)
		     	{
		     		$("#rol_validate").addClass('error-j');
		     	}
		     	
		     	if (this.form_user.sex == '')
		     	{
		     		$("#error-ratios").addClass('error-j');
		     	}
		      	error.addClass('invalid-feedback');

		    },
		    highlight: function (element, errorClass, validClass) {


		      $(element).addClass('is-invalid');
		    },
		    unhighlight: function (element, errorClass, validClass) {
		      
		      $(element).addClass('valid');
		      $(element).removeClass('is-invalid');
		    }
		});

    },
    methods:{
    	async update()
    	{
    		this.errors=[];

	     	if (this.user.roles_user.length != 0)
	     	{
	            await axios.put('../users',this.user)
	            .then(response => {
	            	console.log("Update::",response.data)
	            	if (response.data.status == 'ok')
	            	{
		            	Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'Usuario actualizado correctamente.',
							showConfirmButton: false,
							timer: 1500
						})
						
	    				Inertia.visit('/users');
	            	}
	            	else
	            	{
	            		this.Toast.fire({
					        icon: 'warning',
					        title: 'Error de validación.'
					    });

					    this.errors = response.data.errors;
	            	}
	            })
	            .catch(error => {
	            	this.Toast.fire({
				        icon: 'warning',
				        title: 'Error del servidor.'
				    })
	            });
	     	}
	     	else
	     	{
	     	}
    	},

    	returnHistory()
    	{
    		Inertia.get('/users', { search: 'John' }, { replace: true })
    	}
    }
}
	
</script>