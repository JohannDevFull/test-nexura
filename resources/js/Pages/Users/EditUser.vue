<template>

    <AppLayout title="Crear usuario">
	  	<main>
		    <div class="row">
          		<div class="col-12">
            
		            <div class="card">
		                
		                <div class="card-header">
		                    <h3 class="card-title">Editar usuario</h3>

		                    <div class="card-tools" style="">

		                        <div 
		                            class="input-group input-group-sm" 
		                            style="width: 150px;display: inline-flex;"
		                            >

		                            <Link class="btn btn-default" href="/users/create" > 
		                                <i class="fas fa-undo"></i> Regresar
		                            </Link>

		                        </div>

		                    </div>
		                </div>
				      	
				      	<div class="card-body " >
					      	<div class="col-12 ">
						        <h4 class="mb-3">Billing address</h4>
						        
						        <form id="form_user" class="needs-validation"  @submit.prevent="update">

						        	<div class="row g-3 mb-3">

							          	<div class="col-6">
							              	<label for="username" class="form-label">
							              		Username
							              		<span class="text-danger">(*)</span>
							              	</label>
							              	<div class="input-group has-validation">
							                	<span class="input-group-text"><i class="fas fa-user"></i></span>
							                	<input 
							                		id="user_name" 
							                		name="user_name" 
							                		type="text" 
							                		class="form-control" 
							                		placeholder="Username"
							                		v-model="store_user.$state.user_data.user_name"
							                		disabled 
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
								              		id="email" 
								              		name="email" 
								              		type="email" 
								              		class="form-control" 
								              		placeholder="you@example.com"
								              		v-model="store_user.$state.user_data.email"
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
									          	id="name"  
									          	type="text" 
									          	class="form-control was-validated" 
									          	placeholder="Nombre" 
									          	name="name"
									          	v-model="store_user.$state.user_data.name" 
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
							              		id="lastName" 
							              		name="last_name" 
							              		type="text" 
							              		class="form-control" 
							              		placeholder=""
							              		v-model="store_user.$state.user_data.last_name"  
							              		>
							              <div class="invalid-feedback">
							                Valid last name is required.
							              </div>
							            </div>

							    

							            <div class="col-6">
							              	<label for="country" class="form-label">
							              		Roles
							              		<span class="text-danger">(*)</span>
							              	</label>
							              	<VueSelect :_roles="roles" :_disabled="true">
											</VueSelect>
	  
							              	<div id="rol_validate" class="invalid-feedback">
							                	Seleccione algun rol. {{validateRolesComputed}}
							              	</div>
							            </div>

							            <div class="col-sm-6">
							              	<label for="phone" class="form-label">
							              		Telefono
							              		<span class="text-muted">(Optional)</span>
							              	</label>
							              	<input 
								              	id="phone" 
								              	name="phone" 
								              	type="text" 
								              	class="form-control" 
								              	placeholder="+57 3118523576" 
								              	v-model="store_user.$state.user_data.phone"
							              	>
							              	<div class="invalid-feedback">
							                	Valid last name is required.
							              	</div>
							            </div>

						          	</div>
						            
						            
						          	<div class="row g-3">

							            <div class="col-6">
							              	<label for="address2" class="form-label">
							              		Dirección 
							              		<span class="text-muted">(Optional)</span>
							              	</label>
							              	<input 
							              		id="address" 
							              		name="address" 
							              		type="text" 
							              		class="form-control" 
							              		placeholder="Apartment or suite"
							              		v-model="store_user.$state.user_data.address"
							              		>
							            </div>

							            <div class="col-md-6">
							              	<label for="country" class="form-label">
							              		País
							              		<span class="text-muted">(Optional)</span>
							              	</label>
							              	<select 
							              		id="country"
							              		name="country"
							              		class="form-select" 
							              		v-model="store_user.$state.user_data.country"
							              		>
							                	<option value="">Seleccione un país...</option>
							                	<option>United States</option>
							              	</select>
								            <div class="invalid-feedback">
								                Por favor seleccione un país.
								            </div>
							            </div>

							            <!-- <div class="col-md-4">
							              <label for="state" class="form-label">State</label>
							              <select class="form-select" id="state" required>
							                <option value="">Choose...</option>
							                <option>California</option>
							              </select>
							              <div class="invalid-feedback">
							                Please provide a valid state.
							              </div>
							            </div> -->

							            <!-- <div class="col-md-3">
							              <label for="zip" class="form-label">Zip</label>
							              <input type="text" class="form-control" id="zip" placeholder="" required>
							              <div class="invalid-feedback">
							                Zip code required.
							              </div>
							            </div> -->
						          	
						          	</div>

						          	<hr class="my-4">

						          	<div class="d-flex justify-content-center mb-3">
										<ul class="list-group">
											<li class="list-group-item list-group-item-danger" v-for="( item , i ) in errors" :key="i">
												{{item}}
											</li>
										</ul>
						          	</div>

						          

						          	<button class="w-100 btn btn-warning btn-lg" type="submit">Actualizar</button>
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
import Swal from 'sweetalert2'

import { useUserStore } from '@/Store/user'

export default {
	props:['can','user','roles'],
	setup()
	{
	    const store_user = useUserStore();
      	return { store_user }
	},
    components: {
        AppLayout
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
    	this.store_user.$state = { 
        	user_data: this.user
      	};

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
		    	user_name: {
			        required: true
			    },
			    name: {
			        required: true
			    },
		    	last_name: {
			        required: true
			    },
		      	email: {
		        	required: true,
		        	email: true,
		      	}		
		    },
		    errorElement: 'span',
		    errorPlacement:  (error, element) => {
		    	if (this.store_user.$state.user_data.roles_user.length == 0)
		     	{
		     		$("#rol_validate").addClass('error-j');
		     		$("#vs1__combobox").addClass('v-select-error');
		     	}
		      	error.addClass('invalid-feedback');
		      	element.closest('.form-group').append(error);
		    },
		    highlight: function (element, errorClass, validClass) {

		      $(element).addClass('is-invalid');
		    },
		    unhighlight: function (element, errorClass, validClass) {

		      $(element).removeClass('is-invalid');
		    }
		});
    },
    methods:{
    	async update()
    	{
    		this.errors=[];

	     	if (this.store_user.$state.user_data.roles_user.length == 0)
	     	{

	     		alert("error roles")
	     	}
	     	else
	     	{
	            await axios.put('../users',this.store_user.$state.user_data)
	            .then(response => {
	            	if (response.data.status == 'ok')
	            	{
		            	Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'Your work has been saved',
							showConfirmButton: false,
							timer: 1500
						})
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
    	}
    }
}
	
</script>